<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament as Tournament;
use App\Models\Game as Game;
use App\Models\User as User;
use App\Models\Statistic as Statistic;
use \DateTime;
use \DateInterval;

class StatisticsController extends Controller
{
    public function GetTimespanStatistic($timespan, $days, $id)
    {
        $sinceDate = new DateTime();
        $toDate = new DateTime();
        $forDate = new Datetime();
        $timespan = $days + $timespan;
        date_sub($sinceDate, new DateInterval("P".$timespan."D"));
        date_sub($forDate, new DateInterval("P".$days."D"));
        $sinceDate->format("Y-m-d");
        $fromDate = $sinceDate;

        $user_result = array();
        $all_statistics = \DB::table("games")->select(
                                "s1.user_id as a_user_id",
                                "s1.goals as a_user_goals",
                                "s2.user_id as b_user_id",
                                "s2.goals as b_user_goals",
                                "games.created_at")
                              ->leftJoin("statistics as s1", "games.player_a_id", "s1.user_id")
                              ->leftJoin("statistics as s2", "games.player_b_id", "s2.user_id")
                              ->where("games.created_at", ">=", $sinceDate)
                              ->where("games.created_at", "<", $toDate)
                              ->get();

        for ($i = 0; $i <= $days; $i++){
            $result = array(
                "user_goals_count" => 0,
                "user_shotout_count" => 0,
                "user_games_won" => 0,
                "user_games_lost" => 0,
              );
              date_add($forDate, new DateInterval("P1D"));
              date_add($fromDate, new DateInterval("P1D"));
              $fromDate->format("Y-m-d");
              $forDate->format("Y-m-d");

            foreach ($all_statistics as $data)
            {
                if ($data->created_at >= $forDate && $data->created_at < $toDate)
                {
                    if ($data->a_user_id == $id)
                    {
                        $result["user_goals_count"] += $data->a_user_goals;
                        $result["user_shotout_count"] += $data->b_user_goals;
                        if ($data->a_user_goals > $data->b_user_goals)
                        {
                            $result["user_games_won"] += 1;
                        }
                        elseif ($data->a_user_goals < $data->b_user_goals)
                        {
                            $result["user_games_lost"] += 1;
                        }
                    }
                    elseif ($data->b_user_id == $id)
                    {
                        $result["user_goals_count"] += $data->b_user_goals;
                        $result["user_shotout_count"] += $data->a_user_goals;
                        if ($data->a_user_goals > $data->b_user_goals)
                        {
                            $result["user_games_lost"] += 1;
                        }
                        elseif ($data->a_user_goals < $data->b_user_goals)
                        {
                            $result["user_games_won"] += 1;
                        }
                    }
                    else
                    {
                        // Not a game with current user
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

            $user_result[$i]["value"] = $result["user_assesment"];
        }

        return $user_result;
    }

    public function index(Request $request)
    {
      $users = User::all();
      $days = 30;
      $user1 = array();
      $timespan = 0;

      if ($request->has('user1') && $request->input('user1') != "0")
        $user1 = $this->GetTimespanStatistic(90, $days, $request->input('user1'));
      if ($request->has('user2') && $request->input('user2') != "0")
        $user2 = $this->GetTimespanStatistic(90, 30, $request->input('user2'));
      if ($request->has('user3') && $request->input('user3') != "0")
        $user3 = $this->GetTimespanStatistic(90, 30, $request->input('user3'));
      if ($request->has('user4') && $request->input('user4') != "0")
        $user4 = $this->GetTimespanStatistic(90, 30, $request->input('user4'));
      if ($request->has('user5') && $request->input('user5') != "0")
        $user5 = $this->GetTimespanStatistic(90, 30, $request->input('user5'));
      if ($request->has('user6') && $request->input('user6') != "0")
        $user6 = $this->GetTimespanStatistic(90, 30, $request->input('user6'));


      if ($request->has('user1') && $request->input('user1') != "0")
        $user1["name"] = User::find($request->input('user1'))->name;
      else
        $user1 = array();

      if ($request->has('user2') && $request->input('user2') != "0")
        $user2["name"] = User::find($request->input('user2'))->name;
      else
        $user2 = array();

      if ($request->has('user3') && $request->input('user3') != 0)
        $user3["name"] = User::find($request->input('user3'))->name;
      else
        $user3 = array();

      if ($request->has('user4') && $request->input('user4') != "0")
        $user4["name"] = User::find($request->input('user4'))->name;
      else
        $user4 = array();

      if ($request->has('user5') && $request->input('user5') != "0")
        $user5["name"] = User::find($request->input('user5'))->name;
      else
        $user5 = array();

      if ($request->has('user6') && $request->input('user6') != "0")
        $user6["name"] = User::find($request->input('user6'))->name;
      else
        $user6 = array();

        dd($user1);

      return view('user_statistics_compare')
        ->with('user1', $user1)
        ->with('user2', $user2)
        ->with('user3', $user3)
        ->with('user4', $user4)
        ->with('user5', $user5)
        ->with('user6', $user6)
        ->with('users', $users);
    }
}
