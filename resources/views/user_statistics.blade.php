@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card my-2">
                <div class="card-header">
                    Alltime Statistik
                </div>
                <div class="card-body">
                    Spiele: {{ $user_games_count }}<br>
                    Tore: {{ $user_goals_count }}<br>
                    Schüsse: {{ $user_shot_count }}<br>
                    Schüsse aufs Tor: {{ $user_shot_on_target_count }}<br>
                    Zweikämpfe: {{ $user_tackles_count }}<br>
                    Fouls: {{ $user_fouls_count }}<br>
                    Abseits: {{ $user_offsides_count }}<br>
                    Ecken: {{ $user_corners_count }}<br>
                    Gelbe Karten: {{ $user_yellow_cards }}<br>
                    Rote Karten: {{ $user_red_cards }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card my-2">
                <div class="card-header">
                  Spiel Durchschnitt
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card my-2">
                <div class="card-header">
                  Gesammt Statistik Durchschnitt
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
