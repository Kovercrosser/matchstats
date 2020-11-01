@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $tournament->name }}</div>
                <div class="card-body">
                  <p>
                    Spieltyp: {{ $tournament->turnamentType($tournament->type) }}<br>
                    Spielversion: {{ $tournament->game_version }}<br>
                    Admin: {{ $tournament->admin->name }}
                  </p>
                  @if ($user->id == $tournament->admin->id)
                  <a href="/home/{{ $tournament->id }}/create"
                    class="btn btn-primary">add Game</a>
                  @endif
                </div>
            </div>

            @foreach ($games as $game)
            <div class="card my-2">
                <div class="card-body">
                  <p class="float-left">
                    {{ $game->statistics_player_a[0]->user->name }} :
                    {{ $game->statistics_player_b[0]->user->name }}
                    <br>
                    {{ $game->statistics_player_a[0]->goals }} :
                    {{ $game->statistics_player_b[0]->goals }}
                  </p>
                  <a href="/game/{{ $game->id }}"
                    class="btn btn-primary float-right mt-3">more...</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
