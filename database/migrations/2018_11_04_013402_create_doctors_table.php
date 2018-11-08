<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->string('full_name_az');
            $table->string('full_name_en');
            $table->string('full_name_ru');
            $table->string('photo_url');
            $table->integer('department_id')->unsigned();
            $table->integer('position_id')->unsigned();
            $table->integer('major_id')->unsigned();
            $table->string('facebook');
            $table->string('instagram');
            $table->string('linkedin');
            $table->string('youtube');
            $table->text('bio_az');
            $table->text('bio_en');
            $table->text('bio_ru');
            $table->boolean('is_guest');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');
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
        Schema::dropIfExists('doctors');
    }
}
