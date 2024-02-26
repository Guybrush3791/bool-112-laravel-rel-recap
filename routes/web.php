<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlbumController;

Route :: get('/', [AlbumController :: class, 'index'])
    -> name('album.index');

Route :: get('/albums/create', [AlbumController :: class, 'create'])
    -> name('album.create');
Route :: post('/albums/create', [AlbumController :: class, 'store'])
    -> name('album.store');

Route :: get('/albums/{id}', [AlbumController :: class, 'show'])
    -> name('album.show');

Route :: get('/albums/{id}/edit', [AlbumController :: class, 'edit'])
    -> name('album.edit');
Route :: put('/albums/{id}/edit', [AlbumController :: class, 'update'])
    -> name('album.update');

Route :: delete('/albums/{id}/delete', [AlbumController :: class, 'delete'])
    -> name('album.delete');
