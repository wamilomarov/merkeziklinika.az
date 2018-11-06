<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directors', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->string('photo_url');
            $table->string('position_az');
            $table->string('position_en');
            $table->string('position_ru');
            $table->string('full_name_az');
            $table->string('full_name_en');
            $table->string('full_name_ru');
            $table->string('title_az');
            $table->string('title_en');
            $table->string('title_ru');
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
        Schema::dropIfExists('directors');
    }
}
