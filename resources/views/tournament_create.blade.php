@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Tournament</div>
                <div class="card-body">

                  <form method="POST" action="/home/create">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="name">Tuniername</label>
                          <input type="text" id="name" name="name" class="form-control"
                              placeholder="Name" required>
                        </div>
                      </div>
                      <div class="col-12">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Tunierart</label>
                          <select name="type" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option value="liga" selected>Liga (jeder gegen jeden)</option>
                            <option value="tournament">Tunier (Gruppenphase)</option>
                            <option value="ko-tournament">KO-Tournament</option>
                            <option value="team-vs-team">Team vs. Team</option>
                            <option value="free">Free</option>
                          </select>
                      </div>
                      <div class="col-md-6 col-12">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Spielversion</label>
                          <select name="game_version" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option value="FIFA17">FIFA17</option>
                            <option value="FIFA18">FIFA18</option>
                            <option value="FIFA19">FIFA19</option>
                            <option value="FIFA20">FIFA20</option>
                            <option value="FIFA21" selected>FIFA21</option>
                          </select>
                      </div>
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <label for="halftime_time">Halbzeitlänge</label>
                          <input type="number" id="halftime_time" name="halftime_time" class="form-control"
                              value="6" required>
                        </div>
                      </div>

                      <div class="col-12 mt-3">
                        <a href="/home"
                          class="btn btn-outline-secondary">back</a>
                        <button type="submit" class="btn btn-primary float-right">Create</button>
                      </div>
                    </div>
                  </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
