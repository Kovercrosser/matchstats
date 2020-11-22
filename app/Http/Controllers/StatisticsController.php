<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament as Tournament;
use App\Models\Game as Game;
use App\Models\User as User;
use \DateTime;
use \DateInterval;

class StatisticsController extends Controller
{
    public function get_user_statistics($date, $timespan, $id)
    {
      $sinceDate = new DateTime($date); // For today/now, don't pass an arg.
      $toDate = new DateTime($date);
      date_sub($sinceDate, new DateInterval("P".$timespan."D"));
      date_add($toDate, new DateInterval("P1D"));
      $sinceDate->format("Y-m-d");
      $toDate->format("Y-m-d");

      $user = User::findOrFail($id);
      // Alltime
      $result = array(
        "user_goals_count" => 0,
        "user_shotout_count" => 0,
        "user_shot_count" => 0,
        "user_shot_on_target_count" => 0,
        "user_tackles_count" => 0,
        "user_fouls_count" => 0,
        "user_offsides_count" => 0,
        "user_corners_count" => 0,
        "user_yellow_cards_count" => 0,
        "user_red_cards_count" => 0,
        "user_games_won" => 0,
        "user_games_lost" => 0,
      );

      foreach ($user->statistics->where('created_at', '>=', $sinceDate)->where('created_at', '<', $toDate) as $data)
      {
          $result["user_goals_count"] += $data->goals;
          $result["user_shot_count"] += $data->shots;
          $result["user_shot_on_target_count"] += $data->shots_on_target;
          $result["user_tackles_count"] += $data->tackles;
          $result["user_fouls_count"] += $data->fouls;
          $result["user_offsides_count"] += $data->offsides;
          $result["user_corners_count"] += $data->corners;
          $result["user_yellow_cards_count"] += $data->yellow_cards;
          $result["user_red_cards_count"] += $data->red_cards;

          // Get all Shotout Goals

          if ($data->game->statistics_player_a[0]->user_id != $user->id)
          {
              $result["user_shotout_count"] += $data->game->statistics_player_a[0]->goals;

              if ($data->game->statistics_player_a[0]->goals > $data->game->statistics_player_b[0]->goals)
              {
                  $result["user_games_lost"] += 1;
              }
              elseif ($data->game->statistics_player_a[0]->goals != $data->game->statistics_player_b[0]->goals)
              {
                  $result["user_games_won"] += 1;
              }
          }

          if ($data->game->statistics_player_b[0]->user_id != $user->id) {
              $result["user_shotout_count"] += $data->game->statistics_player_b[0]->goals;

              if ($data->game->statistics_player_b[0]->goals > $data->game->statistics_player_a[0]->goals)
              {
                  $result["user_games_lost"] += 1;
              }
              elseif ($data->game->statistics_player_b[0]->goals != $data->game->statistics_player_a[0]->goals)
              {
                  $result["user_games_won"] += 1;
              }
          }
      }

      if ($result["user_games_won"] + $result["user_games_lost"] > 0 &&  $result["user_goals_count"] + $result["user_shotout_count"] > 0){
        $result["user_assesment"] =
        (((((($result["user_games_won"] - $result["user_games_lost"]) / ($result["user_games_won"] + $result["user_games_lost"])) / 2) +
        ((($result["user_goals_count"] - $result["user_shotout_count"]) / ($result["user_goals_count"] + $result["user_shotout_count"])) / 2))
        * 100) + 100 ) / 2;
      }
      else {
        $result["user_assesment"] = 0;
      }

      return $result;
    }

    public function index(Request $request)
    {
      $days = 30;
      $user1 = array();
      $timespan = 0;

      for ($i = 0; $i < $days; $i++){
        $sinceDate = new DateTime(); // For today/now, don't pass an arg.
        $timespan = $days - $i - 1;
        date_sub($sinceDate, new DateInterval("P".$timespan."D"));
        $stringDate = $sinceDate->format("Y-m-d");

        if ($request->input('user1'))
          $user1[$i] = $this->get_user_statistics($stringDate, 90, $request->input('user1'));
        if ($request->input('user2'))
          $user2[$i] = $this->get_user_statistics($stringDate, 90, $request->input('user2'));
        if ($request->input('user3'))
          $user3[$i] = $this->get_user_statistics($stringDate, 90, $request->input('user3'));
        if ($request->input('user4'))
          $user4[$i] = $this->get_user_statistics($stringDate, 90, $request->input('user4'));
        if ($request->input('user5'))
          $user5[$i] = $this->get_user_statistics($stringDate, 90, $request->input('user5'));
      }

      return view('user_statistics_compare')
        ->with('user1', $user1)
        ->with('user2', $user2);
    }
}
