<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;
use App\Models\Statistic as Statistic;
use App\Models\Tournament as Tournament;
use App\Models\Game as Game;

class GameController extends Controller
{
    public function create($id)
    {
        $users = User::all();
        $tournament = Tournament::findOrFail($id);

        return view('game_create')
          ->with('users', $users)
          ->with('tournament', $tournament);
    }

    public function detail($id)
    {
        $game = Game::findOrFail($id);

        return view('game_detail')
          ->with('game', $game);
    }

    public function add($id)
    {
        $statistic_a = Statistic::create([
          'user_id' => request('user_id_a'),
          'team' => request('team_a'),
          'goals' => request('goals_a'),
          'shots' => request('shots_a'),
          'shots_on_target' => request('shots_on_target_a'),
          'possession' => request('possession_a'),
          'tackles' => request('tackles_a'),
          'fouls' => request('fouls_a'),
          'offsides' => request('offsides_a'),
          'corners' => request('corners_a'),
          'yellow_cards' => request('yellow_cards_a'),
          'red_cards' => request('red_cards_a'),
          'game_end' => request('game_end'),
          'pass_accuracy' => request('pass_accuracy_a'),
          'shot_accuracy' => request('shot_accuracy_a'),
        ]);
        $statistic_a->save();

        $statistic_b = Statistic::create([
          'user_id' => request('user_id_b'),
          'team' => request('team_b'),
          'goals' => request('goals_b'),
          'shots' => request('shots_b'),
          'shots_on_target' => request('shots_on_target_b'),
          'possession' => request('possession_b'),
          'tackles' => request('tackles_b'),
          'fouls' => request('fouls_b'),
          'offsides' => request('offsides_b'),
          'corners' => request('corners_b'),
          'yellow_cards' => request('yellow_cards_b'),
          'red_cards' => request('red_cards_b'),
          'game_end' => request('game_end'),
          'pass_accuracy' => request('pass_accuracy_b'),
          'shot_accuracy' => request('shot_accuracy_b'),
        ]);
        $statistic_b->save();

        $game = Game::create([
          'player_a_id' => $statistic_a->id,
          'player_b_id' => $statistic_b->id,
          'tournament_id' => $id,
        ]);
        $game->save();

        $statistic_a->game_id = $game->id;
        $statistic_b->game_id = $game->id;
        $statistic_a->save();
        $statistic_b->save();

        return redirect('/home/'.$id);
    }
}
