@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $tournament->name }}</div>

                <div class="card-body">
                  <p>
                    Spieltyp: {{ $tournament->type }}<br>
                    Spielversion: {{ $tournament->game_version }}<br>
                    Admin: {{ $tournament->admin->name }}
                  </p>
                    <div class="alert alert-success" role="alert">
                        Hier werden die Spiele aufgelistet
                    </div>
                </div>
            </div>

            @foreach ($games as $game)
            <div class="card my-2">
                <div class="card-body">
                  <p>
                    {{ $game->statistics_player_a[0]->user->name }} :
                    {{ $game->statistics_player_b[0]->user->name }}
                    <br>
                    {{ $game->statistics_player_a[0]->goals }} :
                    {{ $game->statistics_player_b[0]->goals }}
                  </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
