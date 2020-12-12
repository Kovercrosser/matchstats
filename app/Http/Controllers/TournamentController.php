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
        // Alltime
        $user_games_count = $user->statistics->count();
        $user_goals_count = 0;
        $user_shotout_count = 0;
        $user_shot_count = 0;
        $user_shot_on_target_count = 0;
        $user_tackles_count = 0;
        $user_fouls_count = 0;
        $user_offsides_count = 0;
        $user_corners_count = 0;
        $user_yellow_cards_count = 0;
        $user_red_cards_count = 0;
        $user_games_won = 0;
        $user_games_lost = 0;
        // Alltime High
        $user_goals_high = 0;
        $user_shots_high = 0;
        $user_shot_on_target_high = 0;
        $user_tackles_high = 0;
        $user_fouls_high = 0;
        $user_offsides_high = 0;
        $user_corners_high = 0;
        $user_yellow_cards_high = 0;
        $user_red_cards_high = 0;
        //Alltime High Game_ID
        $user_goals_high_game_id = 0;
        $user_shots_high_game_id = 0;
        $user_shot_on_target_high_game_id = 0;
        $user_tackles_high_game_id = 0;
        $user_fouls_high_game_id = 0;
        $user_offsides_high_game_id = 0;
        $user_corners_high_game_id = 0;
        $user_yellow_cards_high_game_id = 0;
        $user_red_cards_high_game_id = 0;

        foreach ($user->statistics as $data)
        {
          // Alltime
            $user_goals_count += $data->goals;
            $user_shot_count += $data->shots;
            $user_shot_on_target_count += $data->shots_on_target;
            $user_tackles_count += $data->tackles;
            $user_fouls_count += $data->fouls;
            $user_offsides_count += $data->offsides;
            $user_corners_count += $data->corners;
            $user_yellow_cards_count += $data->yellow_cards;
            $user_red_cards_count += $data->red_cards;


          //Alltime High
          If ($data->goals > $user_goals_high ) {
            $user_goals_high = $data->goals;
            $user_goals_high_game_id = $data->game_id;
          }
          If ($data->shots > $user_shots_high ) {
            $user_shots_high = $data->shots;
            $user_shots_high_game_id = $data->game_id;
          }
          If ($data->shots_on_target > $user_shot_on_target_high ) {
            $user_shot_on_target_high = $data->shots_on_target;
            $user_shot_on_target_high_game_id = $data->game_id;
          }
          If ($data->tackles > $user_tackles_high ) {
            $user_tackles_high = $data->tackles;
            $user_tackles_high_game_id = $data->game_id;
          }
          If ($data->fouls > $user_fouls_high ) {
            $user_fouls_high = $data->fouls;
            $user_fouls_high_game_id = $data->game_id;
          }
          If ($data->offsides > $user_offsides_high ) {
            $user_offsides_high = $data->offsides;
            $user_offsides_high_game_id = $data->game_id;
          }
          If ($data->corners > $user_corners_high ) {
            $user_corners_high = $data->corners;
            $user_corners_high_game_id = $data->game_id;
          }
          If ($data->yellow_cards > $user_yellow_cards_high ) {
            $user_yellow_cards_high = $data->yellow_cards;
            $user_yellow_cards_high_game_id = $data->game_id;
          }
          If ($data->red_cards > $user_red_cards_high ) {
            $user_red_cards_high = $data->red_cards;
            $user_red_cards_high_game_id = $data->game_id;
          }

            
            // Get all Shotout Goals


            if ($data->game->statistics_player_a[0]->user_id != $user->id)
            {
                $user_shotout_count += $data->game->statistics_player_a[0]->goals;

                if ($data->game->statistics_player_a[0]->goals > $data->game->statistics_player_b[0]->goals)
                {
                    $user_games_lost += 1;
                }
                elseif ($data->game->statistics_player_a[0]->goals != $data->game->statistics_player_b[0]->goals)
                {
                    $user_games_won += 1;
                }
            }

            if ($data->game->statistics_player_b[0]->user_id != $user->id) {
                $user_shotout_count += $data->game->statistics_player_b[0]->goals;

                if ($data->game->statistics_player_b[0]->goals > $data->game->statistics_player_a[0]->goals)
                {
                    $user_games_lost += 1;
                }
                elseif ($data->game->statistics_player_b[0]->goals != $data->game->statistics_player_a[0]->goals)
                {
                    $user_games_won += 1;
                }
            }
        }

        if ($user_games_won + $user_games_lost > 0 &&  $user_goals_count + $user_shotout_count > 0){
          $user_assesment =
          (((((($user_games_won - $user_games_lost) / ($user_games_won + $user_games_lost)) / 2) +
          ((($user_goals_count - $user_shotout_count) / ($user_goals_count + $user_shotout_count)) / 2))
          * 100) + 100 ) / 2;
        } else {
          $user_assesment = 0;
        }

        // Averrage
        if ($user_games_count > 0){
          $user_goals_av = $user_goals_count / $user_games_count;
          $user_shotout_av = $user_shotout_count / $user_games_count;
          $user_shot_av = $user_shot_count / $user_games_count;
          $user_shot_on_target_av = $user_shot_on_target_count / $user_games_count;
          $user_tackles_av = $user_tackles_count / $user_games_count;
          $user_fouls_av = $user_fouls_count / $user_games_count;
          $user_offsides_av = $user_offsides_count / $user_games_count;
          $user_corners_av = $user_corners_count / $user_games_count;
          $user_yellow_cards_av = $user_yellow_cards_count / $user_games_count;
          $user_red_cards_av = $user_red_cards_count / $user_games_count;
        } else {
          $user_goals_av = 0;
          $user_shot_av = 0;
          $user_shot_on_target_av = 0;
          $user_tackles_av = 0;
          $user_fouls_av = 0;
          $user_offsides_av = 0;
          $user_corners_av = 0;
          $user_yellow_cards_av = 0;
          $user_red_cards_av = 0;
        }

        //Make Links for Alltime High
        if ($user_goals_high_game_id == 0) {
          $user_goals_high_link = "";
         } else {
          $user_goals_high_link = " <a href=" . chr( 34 ) . "/game" . "/" . strval($user_goals_high_game_id) . chr( 34 ) . ">Zum Spiel</a>";
        }
        if ($user_shots_high_game_id == 0) {
          $user_shots_high_link = "";
         } else {
          $user_shots_high_link = " <a href=" . "/game" . "/" . strval($user_shots_high_game_id) . ">Zum Spiel</a>";
        }
        if ($user_shot_on_target_high_game_id == 0) {
          $user_shot_on_target_high_link = "";
         } else {
          $user_shot_on_target_high_link = " <a href=" . "/game" . "/" . strval($user_shot_on_target_high_game_id) . ">Zum Spiel</a>";
        }
        if ($user_tackles_high_game_id == 0) {
          $user_tackles_high_link = "";
         } else {
          $user_tackles_high_link = " <a href=" . "/game" . "/" . strval($user_tackles_high_game_id) . ">Zum Spiel</a>";
        }
        if ($user_fouls_high_game_id == 0) {
          $user_fouls_high_link = "";
         } else {
          $user_fouls_high_link = " <a href=" . "/game" . "/" . strval($user_fouls_high_game_id) . ">Zum Spiel</a>";
        }
        if ($user_offsides_high_game_id == 0) {
          $user_offsides_high_link = "";
         } else {
          $user_offsides_high_link = " <a href=" . "/game" . "/" . strval($user_offsides_high_game_id) . ">Zum Spiel</a>";
        }
        if ($user_corners_high_game_id == 0) {
          $user_corners_high_link = "";
         } else {
          $user_corners_high_link = " <a href=" . "/game" . "/" . strval($user_corners_high_game_id) . ">Zum Spiel</a>";
        }
        if ($user_yellow_cards_high_game_id == 0) {
          $user_yellow_cards_high_link = "";
         } else {
          $user_yellow_cards_high_link = " <a href=" . "/game" . "/" . strval($user_yellow_cards_high_game_id) . ">Zum Spiel</a>";
        }
        if ($user_red_cards_high_game_id == 0) {
          $user_red_cards_high_link = "";
         } else {
          $user_red_cards_high_link = " <a href=" . "/game" . "/" . strval($user_red_cards_high_game_id) . ">Zum Spiel</a>";
        }
      
        


     

        return view('user_statistics')
          ->with('user', $user)
          ->with('user_assesment', $user_assesment)
          ->with('user_games_count', $user_games_count)
          ->with('user_games_won', $user_games_won)
          ->with('user_games_lost', $user_games_lost)
          ->with('user_goals_count', $user_goals_count)
          ->with('user_shotout_count', $user_shotout_count)
          ->with('user_shot_count', $user_shot_count)
          ->with('user_shot_on_target_count', $user_shot_on_target_count)
          ->with('user_tackles_count', $user_tackles_count)
          ->with('user_fouls_count', $user_fouls_count)
          ->with('user_offsides_count', $user_offsides_count)
          ->with('user_corners_count', $user_corners_count)
          ->with('user_yellow_cards_count', $user_yellow_cards_count)
          ->with('user_red_cards_count', $user_red_cards_count)
          //average
          ->with('user_goals_av', $user_goals_av)
          ->with('user_shotout_av', $user_shotout_av)
          ->with('user_shot_av', $user_shot_av)
          ->with('user_shot_on_target_av', $user_shot_on_target_av)
          ->with('user_tackles_av', $user_tackles_av)
          ->with('user_fouls_av', $user_fouls_av)
          ->with('user_offsides_av', $user_offsides_av)
          ->with('user_corners_av', $user_corners_av)
          ->with('user_yellow_cards_av', $user_yellow_cards_av)
          ->with('user_red_cards_av', $user_red_cards_av)
          //alltime High
          ->with('user_goals_high', $user_goals_high)
          ->with('user_shots_high', $user_shots_high)
          ->with('user_shot_on_target_high', $user_shot_on_target_high)
          ->with('user_tackles_high', $user_tackles_high)
          ->with('user_fouls_high', $user_fouls_high)
          ->with('user_offsides_high', $user_offsides_high)
          ->with('user_corners_high', $user_corners_high)
          ->with('user_yellow_cards_high', $user_yellow_cards_high)
          ->with('user_red_cards_high', $user_red_cards_high)
          //alltime High Links
          ->with('user_goals_high_link', $user_goals_high_link)
          ->with('user_shots_high_link',$user_shots_high_link)
          ->with('user_shot_on_target_high_link',$user_shot_on_target_high_link)
          ->with('user_tackles_high_link',$user_tackles_high_link)
          ->with('user_fouls_high_link',$user_fouls_high_link)
          ->with('user_offsides_high_link',$user_offsides_high_link)
          ->with('user_corners_high_link',$user_corners_high_link)
          ->with('user_yellow_cards_high_link',$user_yellow_cards_high_link)
          ->with('user_red_cards_high_link',$user_red_cards_high_link);
    }

    public function api_user_statistics($id)
    {
        $user = User::findOrFail($id);
        // Alltime
        $user_games_count = $user->statistics->count();
        $user_goals_count = 0;
        $user_shotout_count = 0;
        $user_shot_count = 0;
        $user_shot_on_target_count = 0;
        $user_tackles_count = 0;
        $user_fouls_count = 0;
        $user_offsides_count = 0;
        $user_corners_count = 0;
        $user_yellow_cards_count = 0;
        $user_red_cards_count = 0;
        $user_games_won = 0;
        $user_games_lost = 0;

        foreach ($user->statistics as $data)
        {
            $user_goals_count += $data->goals;
            $user_shot_count += $data->shots;
            $user_shot_on_target_count += $data->shots_on_target;
            $user_tackles_count += $data->tackles;
            $user_fouls_count += $data->fouls;
            $user_offsides_count += $data->offsides;
            $user_corners_count += $data->corners;
            $user_yellow_cards_count += $data->yellow_cards;
            $user_red_cards_count += $data->red_cards;

            // Get all Shotout Goals


            if ($data->game->statistics_player_a[0]->user_id != $user->id)
            {
                $user_shotout_count += $data->game->statistics_player_a[0]->goals;

                if ($data->game->statistics_player_a[0]->goals > $data->game->statistics_player_b[0]->goals)
                {
                    $user_games_lost += 1;
                }
                elseif ($data->game->statistics_player_a[0]->goals != $data->game->statistics_player_b[0]->goals)
                {
                    $user_games_won += 1;
                }
            }

            if ($data->game->statistics_player_b[0]->user_id != $user->id) {
                $user_shotout_count += $data->game->statistics_player_b[0]->goals;

                if ($data->game->statistics_player_b[0]->goals > $data->game->statistics_player_a[0]->goals)
                {
                    $user_games_lost += 1;
                }
                elseif ($data->game->statistics_player_b[0]->goals != $data->game->statistics_player_a[0]->goals)
                {
                    $user_games_won += 1;
                }
            }
        }

        if ($user_games_won + $user_games_lost > 0 &&  $user_goals_count + $user_shotout_count > 0){
          $user_assesment =
          (((((($user_games_won - $user_games_lost) / ($user_games_won + $user_games_lost)) / 2) +
          ((($user_goals_count - $user_shotout_count) / ($user_goals_count + $user_shotout_count)) / 2))
          * 100) + 100 ) / 2;
        } else {
          $user_assesment = 0;
        }

        // Averrage
        if ($user_games_count > 0){
          $user_goals_av = $user_goals_count / $user_games_count;
          $user_shotout_av = $user_shotout_count / $user_games_count;
          $user_shot_av = $user_shot_count / $user_games_count;
          $user_shot_on_target_av = $user_shot_on_target_count / $user_games_count;
          $user_tackles_av = $user_tackles_count / $user_games_count;
          $user_fouls_av = $user_fouls_count / $user_games_count;
          $user_offsides_av = $user_offsides_count / $user_games_count;
          $user_corners_av = $user_corners_count / $user_games_count;
          $user_yellow_cards_av = $user_yellow_cards_count / $user_games_count;
          $user_red_cards_av = $user_red_cards_count / $user_games_count;
        } else {
          $user_goals_av = 0;
          $user_shot_av = 0;
          $user_shot_on_target_av = 0;
          $user_tackles_av = 0;
          $user_fouls_av = 0;
          $user_offsides_av = 0;
          $user_corners_av = 0;
          $user_yellow_cards_av = 0;
          $user_red_cards_av = 0;
        }

        $data = array();
        $data["user_assesment"] = $user_assesment;
        $data["user_goals_av"] = $user_goals_av;
        $data["user_shotout_av"] = $user_shotout_av;
        $data["user_shot_av"] = $user_shot_av;
        $data["user_shot_on_target_av"] = $user_shot_on_target_av;
        $data["user_tackles_av"] = $user_tackles_av;
        $data["user_fouls_av"] = $user_fouls_av;
        $data["user_offsides_av"] = $user_offsides_av;
        $data["user_corners_av"] = $user_corners_av;
        $data["user_yellow_cards_av"] = $user_yellow_cards_av;
        $data["user_red_cards_av"] = $user_red_cards_av;
        $data["user_name"] = $user->name;

        return response()->json([
          'data' => $data,
         ], 200);
        }
}
