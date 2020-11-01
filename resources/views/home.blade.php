@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            @foreach ($tournaments as $tournament)
            <div class="card my-2">
              <div class="card-header">{{ $tournament->name }}</div>
              <div class="card-body">
                <p>Text & Infos</p>
                <a class="btn btn-primary" href="/home/{{ $tournament->id }}" role="button">Link</a>
              </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
