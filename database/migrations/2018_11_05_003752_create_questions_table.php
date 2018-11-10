<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('question', 1000);
            $table->text('answer')->default(null);
            $table->integer('department_id')->nullable()->unsigned();
            $table->boolean('seen')->default(false);
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
        Schema::dropIfExists('questions');
    }
}
