<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Artist;
use App\Models\Album;
use App\Models\Genre;

class AlbumController extends Controller
{

    public function index() {

        $albums = Album :: all();

        return view('pages.album.index', compact('albums'));
    }
    public function show($id) {

        $album = Album :: find($id);

        return view('pages.album.show', compact('album'));
    }
    public function create() {

        $artists = Artist :: all();
        $genres = Genre :: all();

        return view('pages.album.create', compact('artists', 'genres'));
    }
    public function store(Request $request) {

        $data = $request -> all();

        $album = new Album();

        $album -> name = $data['name'];
        $album -> records = $data['records'];
        $album -> track_count = $data['track_count'];

        $album -> artist() -> associate($data['artist_id']);

        $album -> save();

        $album -> genres() -> attach($data['genre_id']);

        return redirect() -> route('album.show', $album -> id);
    }

    public function edit($id) {

        $album = Album :: find($id);

        $artists = Artist :: all();
        $genres = Genre :: all();

        return view('pages.album.edit', compact('album', 'artists', 'genres'));
    }
    public function update(Request $request, $id) {

        $data = $request -> all();

        $album = Album :: find($id);

        $album -> name = $data['name'];
        $album -> records = $data['records'];
        $album -> track_count = $data['track_count'];

        $album -> artist() -> associate($data['artist_id']);

        $album -> save();

        $album -> genres() -> sync($data['genre_id']);

        return redirect() -> route('album.show', $album -> id);
    }

    public function delete($id) {

        $album = Album :: find($id);
        $album -> genres() -> sync([]);
        $album -> delete();

        return redirect() -> route('album.index');
    }
}
