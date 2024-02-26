@extends('layouts.main-layout')
@section('head')
    <title>Albums</title>
@endsection
@section('content')

    <h1>CREATE NEW ALBUM</h1>
    <form method="POST">

        @csrf
        @method("POST")

        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="records">records</label>
        <input type="text" name="records" id="records">
        <br>
        <label for="track_count">Tack Count</label>
        <input type="number" name="track_count" id="track_count">
        <br>
        <label for="artist">Artist</label>
        <select name="artist_id" id="artists">
            @foreach ($artists as $artist)
                <option value="{{ $artist -> id }}">
                    {{ $artist -> firstname }}
                    {{ $artist -> lastname }}
                </option>
            @endforeach
        </select>
        <br>
        @foreach ($genres as $genre)
            <div>
                <input
                    type="checkbox"
                    value="{{ $genre -> id }}"
                    name="genre_id[]"
                    id="{{ 'genre-' . $genre -> id }}"
                >
                <label for="{{ 'genre-' . $genre -> id }}">
                    {{ $genre -> name }}
                </label>
            </div>
        @endforeach
        <input type="submit" value="CREATE">
    </form>

@endsection
