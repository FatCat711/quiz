@extends('test')

@section('content')
    Игра №{{ $game->id }}
    @livewire('game', ['game' => $game])
@endsection
