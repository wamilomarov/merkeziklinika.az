<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors_articles', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('authors_az');
            $table->string('authors_en');
            $table->string('authors_ru');
            $table->string('publication_az');
            $table->string('publication_en');
            $table->string('publication_ru');
            $table->boolean('is_guest');
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
        Schema::dropIfExists('doctors_articles');
    }
}
