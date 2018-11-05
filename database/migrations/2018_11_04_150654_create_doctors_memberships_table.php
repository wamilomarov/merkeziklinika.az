<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors_memberships', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->string('organization_az');
            $table->string('organization_en');
            $table->string('organization_ru');
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
        Schema::table('doctors_memberships', function (Blueprint $table) {
            //
        });
    }
}
