@extends('layouts.main-layout')
@section('head')
    <title>Albums</title>
@endsection
@section('content')
    <h1>
        {{ $album -> artist -> firstname }}
        {{ $album -> artist -> lastname }}
        -
        {{ $album -> name }}
    </h1>
    <h3>Genres</h3>
    <ul>
        @foreach ($album -> genres as $genre)
            <li>
                {{ $genre -> name }}
            </li>
        @endforeach
    </ul>



@endsection
