<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament as Tournament;
use App\Models\Game as Game;
use App\Models\User as User;

class TournamentController extends Controller
{
    public function index()
    {
      $tournaments = Tournament::all()->sortByDesc('created_at');

      return view('home',
        ['tournaments' => $tournaments]);
    }

    public function detail($id)
    {
      $tournament = Tournament::findOrFail($id);
      $games = Game::all()->where('tournament_id', $id)->sortByDesc('created_at');
      $user = auth()->user();

      return view('tournament_detail',
        [
          'tournament' => $tournament,
          'games' => $games,
          'user' => $user,
        ]);
    }

    public function create()
    {
        return view('tournament_create');
    }

    public function add()
    {
        $user = auth()->user();
        request()->validate([
          'type' => 'required',
        ]);

        $tournament = Tournament::create([
          'admin_id' => $user->id,
          'type'   => request('type'),
          'name'  => request('name'),
          'game_version' => request('game_version'),
          'halftime_time' => request('halftime_time'),
        ]);
        $tournament->save();

        return redirect('/home');
    }

    public function user_statistics($id)
    {
        $user = User::findOrFail($id);
        $user_games_count = $user->statistics->count();
        $user_goals_count = 0;
        $user_shot_count = 0;
        $user_shot_on_target_count = 0;
        $user_tackles_count = 0;
        $user_fouls_count = 0;
        $user_offsides_count = 0;
        $user_corners_count = 0;
        $user_yellow_cards = 0;
        $user_red_cards = 0;

        foreach ($user->statistics as $data)
        {
            $user_goals_count += $data->goals;
            $user_shot_count += $data->shots;
            $user_shot_on_target_count += $data->shots_on_target;
            $user_tackles_count += $data->tackles;
            $user_fouls_count += $data->fouls;
            $user_offsides_count += $data->offsides;
            $user_corners_count += $data->corners;
            $user_yellow_cards += $data->yellow_cards;
            $user_red_cards += $data->red_cards;
        }

        return view('user_statistics')
          ->with('user_games_count', $user_games_count)
          ->with('user_goals_count', $user_goals_count)
          ->with('user_shot_count', $user_shot_count)
          ->with('user_shot_on_target_count', $user_shot_on_target_count)
          ->with('user_tackles_count', $user_tackles_count)
          ->with('user_fouls_count', $user_fouls_count)
          ->with('user_offsides_count', $user_offsides_count)
          ->with('user_corners_count', $user_corners_count)
          ->with('user_yellow_cards', $user_yellow_cards)
          ->with('user_red_cards', $user_red_cards);
    }
}
