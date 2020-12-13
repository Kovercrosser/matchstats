@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  {{ $game->statistics_player_a[0]->user->name }}
                  <span class="float-right">{{ $game->statistics_player_b[0]->user->name }}</span>
                </div>
                <div class="card-body">
                  <div class="row text-center">
                    <!-- Team -->
                    <div class="col-4">{{ $game->statistics_player_a[0]->team }}</div>
                    <div class="col-4">Team</div>
                    <div class="col-4">{{ $game->statistics_player_b[0]->team }}</div>

                    <!-- Goals -->
                    <div class="col-4">{{ $game->statistics_player_a[0]->goals }}</div>
                    <div class="col-4">Goals</div>
                    <div class="col-4">{{ $game->statistics_player_b[0]->goals }}</div>

                    <!-- Shots -->
                    <div class="col-4">{{ $game->statistics_player_a[0]->shots }}</div>
                    <div class="col-4">Shots</div>
                    <div class="col-4">{{ $game->statistics_player_b[0]->shots }}</div>

                    <!-- Shots on target -->
                    <div class="col-4">{{ $game->statistics_player_a[0]->shots_on_target }}</div>
                    <div class="col-4">Shots on Target</div>
                    <div class="col-4">{{ $game->statistics_player_b[0]->shots_on_target }}</div>

                    <!-- Possession -->
                    <div class="col-4">{{ $game->statistics_player_a[0]->possession }}%</div>
                    <div class="col-4">Possession</div>
                    <div class="col-4">{{ $game->statistics_player_b[0]->possession }}%</div>

                    <!-- Tackles -->
                    <div class="col-4">{{ $game->statistics_player_a[0]->tackles }}</div>
                    <div class="col-4">Tackles</div>
                    <div class="col-4">{{ $game->statistics_player_b[0]->tackles }}</div>

                    <!-- Fouls -->
                    <div class="col-4">{{ $game->statistics_player_a[0]->fouls }}</div>
                    <div class="col-4">Fouls</div>
                    <div class="col-4">{{ $game->statistics_player_b[0]->fouls }}</div>

                    <!-- Offsides -->
                    <div class="col-4">{{ $game->statistics_player_a[0]->offsides }}</div>
                    <div class="col-4">Offsides</div>
                    <div class="col-4">{{ $game->statistics_player_b[0]->offsides }}</div>

                    <!-- Corners -->
                    <div class="col-4">{{ $game->statistics_player_a[0]->corners }}</div>
                    <div class="col-4">Corners</div>
                    <div class="col-4">{{ $game->statistics_player_b[0]->corners }}</div>

                    <!-- Yellow Cards -->
                    <div class="col-4">{{ $game->statistics_player_a[0]->yellow_cards }}</div>
                    <div class="col-4">Yellow Cards</div>
                    <div class="col-4">{{ $game->statistics_player_b[0]->yellow_cards }}</div>

                    <!-- Red Cards -->
                    <div class="col-4">{{ $game->statistics_player_a[0]->red_cards }}</div>
                    <div class="col-4">Red Cards</div>
                    <div class="col-4">{{ $game->statistics_player_b[0]->red_cards }}</div>

                    <!-- Pass Accuracy -->
                    <div class="col-4">{{ $game->statistics_player_a[0]->pass_accuracy }}%</div>
                    <div class="col-4">Pass Accuracy</div>
                    <div class="col-4">{{ $game->statistics_player_b[0]->pass_accuracy }}%</div>

                    <!-- Shot Accuracy -->
                    <div class="col-4">{{ $game->statistics_player_a[0]->shot_accuracy }}%</div>
                    <div class="col-4">Shot Accuracy</div>
                    <div class="col-4">{{ $game->statistics_player_b[0]->shot_accuracy }}%</div>

                  </div>
                </div>
            </div>

            <div class="card my-4">
                <div class="card-header">
                  Extra Informations
                </div>
                <div class="card-body">
                    Game End: {{ $game->statistics_player_a[0]->gameend($game->statistics_player_b[0]->game_end) }}
                </div>
            </div>

            <div class="card my-4 border-danger">
                <div class="card-header">
                  Edit or Delete
                </div>
                <div class="card-body">
                <button type="button" class="btn btn-primary">Edit Game</button>
                <button type="button" data-toggle="modal" data-target="#deleteModal"class="btn btn-danger">Delete Game</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- deleteModal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Deleting</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
        </div>
      <div class="modal-body">
        Do you really want to delete this game?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
        <button type="button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
@endsection
