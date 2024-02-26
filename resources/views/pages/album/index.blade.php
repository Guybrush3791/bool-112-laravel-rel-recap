@extends('layouts.main-layout')
@section('head')
    <title>Albums</title>
@endsection
@section('content')
    <h1>Albums</h1>
    <a href="{{ route('album.create') }}">
        CREATE NEW ALBUM
    </a>
    <br><br>
    <ul>
        @foreach ($albums as $album)
            <li>
                <a href="{{ route('album.show', $album -> id) }}">
                    {{ $album -> name }}
                </a>
                <br>
                <a href="{{ route('album.edit', $album -> id) }}">
                    EDIT
                </a>
                <br>
                <form action="{{ route('album.delete', $album -> id) }}" method="POST">

                    @csrf
                    @method("DELETE")

                    <input type="submit" value="DELETE">
                </form>
            </li>
        @endforeach
    </ul>
@endsection
