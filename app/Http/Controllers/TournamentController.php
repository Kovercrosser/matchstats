<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament as Tournament;
use App\Models\Game as Game;

class TournamentController extends Controller
{
    public function index()
    {
      $tournaments = Tournament::all();

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
}
