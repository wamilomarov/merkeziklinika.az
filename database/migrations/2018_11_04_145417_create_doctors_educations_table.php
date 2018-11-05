<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors_educations', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->integer('start');
            $table->integer('end');
            $table->string('major_az');
            $table->string('major_en');
            $table->string('major_ru');
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('address_az');
            $table->string('address_en');
            $table->string('address_ru');
            $table->timestamps();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors_educations', function (Blueprint $table) {
            //
        });
    }
}
