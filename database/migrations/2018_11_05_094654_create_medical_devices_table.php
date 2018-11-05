<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_devices', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->date('production_date');
            $table->string('manufacturer');
            $table->string('model');
            $table->integer('department_id')->unsigned();
            $table->text('information');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
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
        Schema::dropIfExists('medical_devices');
    }
}
