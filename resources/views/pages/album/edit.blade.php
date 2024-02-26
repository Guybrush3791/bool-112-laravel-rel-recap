@extends('layouts.main-layout')
@section('head')
    <title>Albums</title>
@endsection
@section('content')

    <h1>UPDATE ALBUM</h1>
    <form method="POST">

        @csrf
        @method("PUT")

        <label for="name">Name</label>
        <input type="text" name="name" id="name" value={{ $album -> name }}>
        <br>
        <label for="records">records</label>
        <input type="text" name="records" id="records" value={{ $album -> records }}>
        <br>
        <label for="track_count">Tack Count</label>
        <input type="number" name="track_count" id="track_count" value={{ $album -> track_count }}>
        <br>
        <label for="artist">Artist</label>
        <select name="artist_id" id="artists">
            @foreach ($artists as $artist)
                <option value="{{ $artist -> id }}"
                    @selected($album -> artist -> id === $artist -> id)
                >
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

                    @foreach ($album -> genres as $aGenre)
                        @checked($aGenre -> id === $genre -> id)
                    @endforeach
                >
                <label for="{{ 'genre-' . $genre -> id }}">
                    {{ $genre -> name }}
                </label>
            </div>
        @endforeach
        <input type="submit" value="UPDATE">
    </form>

@endsection
