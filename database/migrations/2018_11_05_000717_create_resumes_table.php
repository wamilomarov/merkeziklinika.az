<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resumes', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->date('birth_date');
            $table->string('birth_city');
            $table->string('birth_country');
            $table->string('gender');
            $table->string('photo');
            $table->string('citizenship');
            $table->string('family');
            $table->string('passport_number');
            $table->string('passport_given_date');
            $table->string('driver_license_category')->nullable();
            $table->integer('height');
            $table->string('blood_group');
            $table->json('education');
            $table->json('languages');
            $table->json('computer_knowledge');
            $table->string('military_rank')->nullable();
            $table->string('military_place');
            $table->integer('military_start');
            $table->integer('military_end');
            $table->boolean('conviction');
            $table->json('experience');
            $table->json('relatives');
            $table->json('relatives_working_in_hospital');
            $table->string('address');
            $table->string('phone');
            $table->string('mobile');
            $table->string('email');
            $table->boolean('seen')->default(false);
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
        Schema::table('resumes', function (Blueprint $table) {
            //
        });
    }
}
