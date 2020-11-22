@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card bg-secondary text-white my-2">
                <div class="card-header">Tournament Overview</div>

                <div class="card-body">
                  @guest
                  <p>Please login or register to create an Tournament</p>
                  @else
                  <a href="/home/create" class="btn btn-primary">Create Tournament</a>
                  @endguest
                  <a href="/statistic" class="btn btn-primary">Statistic</a>
                </div>
            </div>

            @foreach ($tournaments as $tournament)
            <div class="card my-2">
              <div class="card-header">{{ $tournament->name }}</div>
              <div class="card-body">
                <p class="float-left">
                  Type: {{ $tournament->turnamentType($tournament->type) }}<br> Admin: {{ $tournament->admin->name }}
                </p>
                <a class="btn btn-primary mt-4 float-right" href="/home/{{ $tournament->id }}" role="button">more...</a>
              </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
