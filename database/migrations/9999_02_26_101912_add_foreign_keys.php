<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('albums', function (Blueprint $table) {

            $table -> foreignId("artist_id") -> constrained();
        });
        Schema::table('album_genre', function (Blueprint $table) {

            $table -> foreignId("album_id") -> constrained();
            $table -> foreignId("genre_id") -> constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('albums', function (Blueprint $table) {

            $table -> dropForeign("albums_artist_id_foreign");
            $table -> dropColumn("artist_id");
        });
        Schema::table('album_genre', function (Blueprint $table) {

            $table -> dropForeign("album_genre_album_id_foreign");
            $table -> dropColumn("album_id");

            $table -> dropForeign("album_genre_genre_id_foreign");
            $table -> dropColumn("genre_id");
        });
    }
};
