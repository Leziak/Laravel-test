<h1>The hero roster</h1>

@extends('layouts.app')

@section('content')


    @foreach($heroes as $hero)

        <h1>{{$hero->name}}</h1>
        <p>{{$hero->backstory}}</p>

    @endforeach

@endsection