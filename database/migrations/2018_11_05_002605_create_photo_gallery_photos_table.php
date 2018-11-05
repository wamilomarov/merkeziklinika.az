<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoGalleryPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photo_gallery_photos', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->integer('gallery_id')->unsigned();
            $table->string('photo');
            $table->foreign('gallery_id')->references('id')->on('photo_gallery')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photo_gallery_photos', function (Blueprint $table) {
            //
        });
    }
}
