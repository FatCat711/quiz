@extends('test')

@section('content')
    <h1>Админская панель</h1>
    @livewire('admin-panel', ['game' => $game])
@endsection
