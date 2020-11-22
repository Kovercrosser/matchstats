@extends('layouts.app')

@section('content')
<div class="container">
  <canvas id="myChart" width="400" height="400"></canvas>
      <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: [-30,-29,-28,-27,-26,-25,-24,-23,-22,-21,-20,-19,-18,-17,-16,-15,-14,-13,-12,-11,-10,-9,-8,-7,-6,-5,-4,-3,-2,-1,0],
                datasets: [{
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
                  }, {
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
                ]
              },
              options: {
                title: {
                  display: true,
                },
                maintainAspectRatio: false,
              }
              });
      </script>
</div>
@endsection
