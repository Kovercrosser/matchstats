@extends('layouts.app')

@section('content')
<div class="container">
  <form method="GET" action="/statistic/">
    <div class="row">
      <div class="col-6">
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Spieler</label>
          <select name="user1" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
          </select>
      </div>
      <div class="col-6">
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Spieler</label>
          <select name="user2" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
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

  <canvas id="myChart" width="400" height="400"></canvas>
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
                ]
              },
              options: {
                title: {
                  @if (isset($user1["name"]))
                  display: true,
                  @endif
                },
                maintainAspectRatio: false,
              }
              });
      </script>
</div>
@endsection
