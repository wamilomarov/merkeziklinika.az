<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors_experiences', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->string('period');
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('address_az');
            $table->string('address_en');
            $table->string('address_ru');
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
        Schema::dropIfExists('doctors_experiences');
    }
}
