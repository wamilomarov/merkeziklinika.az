<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_results', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->string('phone');
            $table->string('email');
            $table->string('learned_from');
            $table->string('appointment_type');
            $table->integer('department_id')->nullable()->unsigned();
            $table->integer('branch_id')->nullable()->unsigned();
            $table->integer('registration')->nullable();
            $table->integer('doctor')->nullable();
            $table->integer('nurse')->nullable();
            $table->integer('laboratory')->nullable();
            $table->integer('diagnostics')->nullable();
            $table->integer('hygiene')->nullable();
            $table->integer('ambulance')->nullable();
            $table->integer('imaging')->nullable();
            $table->integer('waited')->nullable();
            $table->string('notes', 500)->nullable();
            $table->string('suggestions', 500)->nullable();
            $table->boolean('seen')->default(false);
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
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
        Schema::dropIfExists('survey_results');
    }
}
