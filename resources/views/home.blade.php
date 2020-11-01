@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tournament Overview</div>

                <div class="card-body">
                  <a href="/home/create" class="btn btn-primary">Create Tournament</a>
                </div>
            </div>

            @foreach ($tournaments as $tournament)
            <div class="card my-2">
              <div class="card-header">{{ $tournament->name }}</div>
              <div class="card-body">
                <p>Text & Infos</p>
                <a class="btn btn-primary" href="/home/{{ $tournament->id }}" role="button">more...</a>
              </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
