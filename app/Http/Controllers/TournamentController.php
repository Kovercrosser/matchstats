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
      $games = Game::all();

      return view('tournament_detail',
        [
          'tournament' => $tournament,
          'games' => $games,
        ]);
    }
}
