@extends('test')

@section('content')
    @livewire('game-admin', ['game' => $game])
@endsection
