@extends('test')

@section('content')
    <h2>Игра №{{ $game->id }}</h2>
    @livewire('game-admin', ['game' => $game])
@endsection
