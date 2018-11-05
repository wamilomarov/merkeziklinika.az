<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientRightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_rights', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->string('title_az');
            $table->string('title_en');
            $table->string('title_ru');
            $table->text('body_az');
            $table->text('body_en');
            $table->text('body_ru');
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
        Schema::table('pacient_rights', function (Blueprint $table) {
            //
        });
    }
}
