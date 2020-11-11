@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card my-2">
              <div class="card-header">{{ $user->name }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card my-2">
                <div class="card-header">
                    Alltime Statistik
                </div>
                <div class="card-body">
                    Spiele: {{ $user_games_count }}<br>
                    Tore: {{ $user_goals_count }}<br>
                    Gegentore {{ $user_shotout_count }}<br>
                    Schüsse: {{ $user_shot_count }}<br>
                    Schüsse aufs Tor: {{ $user_shot_on_target_count }}<br>
                    Zweikämpfe: {{ $user_tackles_count }}<br>
                    Fouls: {{ $user_fouls_count }}<br>
                    Abseits: {{ $user_offsides_count }}<br>
                    Ecken: {{ $user_corners_count }}<br>
                    Gelbe Karten: {{ $user_yellow_cards_count }}<br>
                    Rote Karten: {{ $user_red_cards_count }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card my-2">
                <div class="card-header">
                  Spiel Durchschnitt
                </div>
                <div class="card-body">
                  Tore: {{ $user_goals_av }}<br>
                  Schüsse: {{ $user_shot_av }}<br>
                  Schüsse aufs Tor: {{ $user_shot_on_target_av }}<br>
                  Zweikämpfe: {{ $user_tackles_av }}<br>
                  Fouls: {{ $user_fouls_av }}<br>
                  Abseits: {{ $user_offsides_av }}<br>
                  Ecken: {{ $user_corners_av }}<br>
                  Gelbe Karten: {{ $user_yellow_cards_av }}<br>
                  Rote Karten: {{ $user_red_cards_av }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card my-2">
                <div class="card-header">
                  Best of
                </div>
                <div class="card-body">
                    Tore
                    Schüsse
                    Zweikämpfe
                    Fouls
                    Abseits
                    Ecken
                    Gelbe Karten
                    Rote Karten
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
