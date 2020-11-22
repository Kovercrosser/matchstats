@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <form method="GET" action="/statistic/">
        <div class="row">
          <div class="col-6">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Spieler</label>
              <select name="user1" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <option value="0"></option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="col-6">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Spieler</label>
              <select name="user2" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <option value="0"></option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="col-6">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Spieler</label>
              <select name="user3" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <option value="0"></option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="col-6">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Spieler</label>
              <select name="user4" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <option value="0"></option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="col-6">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Spieler</label>
              <select name="user5" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <option value="0"></option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="col-6">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Spieler</label>
              <select name="user6" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <option value="0"></option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="col-12 my-1">
            <button type="submit" class="btn btn-primary float-right">Load</button>
          </div>
        </div>
      </form>
    </div>

    <div class="chart-container col-12" style="position: relative; height:20vh; width:80vw">
      <canvas id="myChart"></canvas>
    </div>
  </div>
</div>

<script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: [-30,-29,-28,-27,-26,-25,-24,-23,-22,-21,-20,-19,-18,-17,-16,-15,-14,-13,-12,-11,-10,-9,-8,-7,-6,-5,-4,-3,-2,-1,0],
          datasets: [
            @if (isset($user1["name"]))
            {
              data: [
                @foreach ($user1 as $data)
                  @if (isset($data["user_assesment"]))
                    {{ $data["user_assesment"] }},
                  @endif
                @endforeach
              ],
              label: "{{ $user1["name"] }}",
              borderColor: "#3e95cd",
              fill: false
            },
            @endif
            @if (isset($user2["name"]))
            {
              data: [
                @foreach ($user2 as $data)
                  @if (isset($data["user_assesment"]))
                    {{ $data["user_assesment"] }},
                  @endif
                @endforeach
              ],
              label: "{{ $user2["name"] }}",
              borderColor: "#1e19dc",
              fill: false
            },
            @endif
            @if (isset($user3["name"]))
            {
              data: [
                @foreach ($user3 as $data)
                  @if (isset($data["user_assesment"]))
                    {{ $data["user_assesment"] }},
                  @endif
                @endforeach
              ],
              label: "{{ $user3["name"] }}",
              borderColor: "#CAFBB6",
              fill: false
            },
            @endif
            @if (isset($user4["name"]))
            {
              data: [
                @foreach ($user4 as $data)
                  @if (isset($data["user_assesment"]))
                    {{ $data["user_assesment"] }},
                  @endif
                @endforeach
              ],
              label: "{{ $user4["name"] }}",
              borderColor: "#ECAB9B",
              fill: false
            },
            @endif
            @if (isset($user5["name"]))
            {
              data: [
                @foreach ($user5 as $data)
                  @if (isset($data["user_assesment"]))
                    {{ $data["user_assesment"] }},
                  @endif
                @endforeach
              ],
              label: "{{ $user5["name"] }}",
              borderColor: "#625E5E",
              fill: false
            },
            @endif
            @if (isset($user6["name"]))
            {
              data: [
                @foreach ($user6 as $data)
                  @if (isset($data["user_assesment"]))
                    {{ $data["user_assesment"] }},
                  @endif
                @endforeach
              ],
              label: "{{ $user6["name"] }}",
              borderColor: "#FFEE88",
              fill: false
            },
            @endif
          ]
        },
        options: {

        }
      });
</script>
@endsection
