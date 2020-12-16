<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album', function (Blueprint $table) {
            $table->increments('sku');
            $table->string('album_name');
            $table->string('tags');
            $table->string('price');
            $table->timestamps();
        });

        Schema::table('album', function (Blueprint $table) {
            $table->integer('artist_id')->unsigned();
            $table->integer('genre_id')->unsigned();

            $table->foreign('artist_id')->references('id')->on('artist');
            $table->foreign('genre_id')->references('id')->on('genre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album');
    }
}
