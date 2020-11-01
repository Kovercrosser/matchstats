@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <form method="POST" action="/home/{{ $tournament->id }}/create">
      {{ csrf_field() }}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Spieler 1</div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Spieler</label>
                          <select name="user_id_a" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                          </select>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="team_a">Team</label>
                          <input type="text" id="team_a" name="team_a" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="goals_a">Goals</label>
                          <input type="number" id="goals_a" name="goals_a" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="shots_a">Shots</label>
                          <input type="number" id="shots_a" name="shots_a" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="shots_on_target_a">Shots on Target</label>
                          <input type="number" id="shots_on_target_a" name="shots_on_target_a" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="possession_a">Possession</label>
                          <input type="number" id="possession_a" name="possession_a" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="tackles_a">Tackles</label>
                          <input type="number" id="tackles_a" name="tackles_a" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="fouls_a">Fouls</label>
                          <input type="number" id="fouls_a" name="fouls_a" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="offsides_a">Offsides</label>
                          <input type="number" id="offsides_a" name="offsides_a" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="corners_a">Corners</label>
                          <input type="number" id="corners_a" name="corners_a" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="yellow_cards_a">Yellow Cards</label>
                          <input type="number" id="yellow_cards_a" name="yellow_cards_a" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="red_cards_a">Red Cards</label>
                          <input type="number" id="red_cards_a" name="red_cards_a" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Game End</label>
                          <select name="game_end_a" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option value="normal" selected>Normal (90min)</option>
                            <option value="overtime">Overtime (120min)</option>
                            <option value="penalty">Penalty shoutout</option>
                            <option value="goldengoal">Goalden Goal</option>
                          </select>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="pass_accuracy_a">Pass Accuracy</label>
                          <input type="number" id="pass_accuracy_a" name="pass_accuracy_a" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="shot_accuracy_a">Shot Accuracy</label>
                          <input type="number" id="shot_accuracy_a" name="shot_accuracy_a" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Spieler 1</div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Spieler</label>
                          <select name="user_id_b" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                          </select>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="team_b">Team</label>
                          <input type="text" id="team_b" name="team_b" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="goals_b">Goals</label>
                          <input type="number" id="goals_b" name="goals_b" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="shots_b">Shots</label>
                          <input type="number" id="shots_b" name="shots_b" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="shots_on_target_b">Shots on Target</label>
                          <input type="number" id="shots_on_target_b" name="shots_on_target_b" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="possession_b">Possession</label>
                          <input type="number" id="possession_b" name="possession_b" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="tackles_b">Tackles</label>
                          <input type="number" id="tackles_b" name="tackles_b" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="fouls_b">Fouls</label>
                          <input type="number" id="fouls_b" name="fouls_b" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="offsides_b">Offsides</label>
                          <input type="number" id="offsides_b" name="offsides_b" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="corners_b">Corners</label>
                          <input type="number" id="corners_b" name="corners_b" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="yellow_cards_b">Yellow Cards</label>
                          <input type="number" id="yellow_cards_b" name="yellow_cards_b" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="red_cards_b">Red Cards</label>
                          <input type="number" id="red_cards_b" name="red_cards_b" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Game End</label>
                          <select name="game_end_b" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option value="normal" selected>Normal (90min)</option>
                            <option value="overtime">Overtime (120min)</option>
                            <option value="penalty">Penalty shoutout</option>
                            <option value="goldengoal">Goalden Goal</option>
                          </select>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="pass_accuracy_b">Pass Accuracy</label>
                          <input type="number" id="pass_accuracy_b" name="pass_accuracy_b" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="shot_accuracy_b">Shot Accuracy</label>
                          <input type="number" id="shot_accuracy_b" name="shot_accuracy_b" class="form-control"
                              placeholder="0" required>
                        </div>
                      </div>

                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-right">Create</button>
    </form>
    <div class="col-12 mt-3">
      <a href="/home"
        class="btn btn-outline-secondary">back</a>

    </div>
  </div>
</div>
@endsection
