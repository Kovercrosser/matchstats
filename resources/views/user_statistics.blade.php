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
                    Wertung: {{ round($user_assesment, 2) }} %<br>
                    Gewonnen: {{ $user_games_won }}<br>
                    Verloren: {{ $user_games_lost}}<br>
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
                  Tore: {{ round($user_goals_av, 2) }}<br>
                  Schüsse: {{ round($user_shot_av, 2) }}<br>
                  Schüsse aufs Tor: {{ round($user_shot_on_target_av, 2) }}<br>
                  Zweikämpfe: {{ round($user_tackles_av, 2) }}<br>
                  Fouls: {{ round($user_fouls_av, 2) }}<br>
                  Abseits: {{ round($user_offsides_av, 2) }}<br>
                  Ecken: {{ round($user_corners_av, 2) }}<br>
                  Gelbe Karten: {{ round($user_yellow_cards_av, 2) }}<br>
                  Rote Karten: {{ round($user_red_cards_av, 2) }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card my-2">
                <div class="card-header">
                  Best of
                </div>
                <div class="card-body">
                    Tore:  {{ $user_goals_high }}<br>
                    Schüsse:  {{ $user_shot_high }}<br>
                    Schüsse aufs Tor: {{ $user_shot_on_target_high }}<br>
                    Zweikämpfe:  {{ $user_tackles_high }}<br>
                    Fouls:  {{ $user_fouls_high }}<br>
                    Abseits:  {{ $user_offsides_high }}<br>
                    Ecken:  {{ $user_corners_high }}<br>
                    Gelbe Karten:  {{ $user_yellow_cards_high }}<br>
                    Rote Karten:  {{ $user_red_cards_high }}<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection