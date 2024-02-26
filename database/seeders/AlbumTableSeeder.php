<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Artist;
use App\Models\Album;

class AlbumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Album :: factory()
            -> count(30)
            -> make()
            -> each(function($album) {

            $artist = Artist :: inRandomOrder() -> first();

            $album -> artist() -> associate($artist);
            $album -> save();
        });
    }
}
