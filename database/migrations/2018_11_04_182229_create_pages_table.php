<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->string('slug');
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('type');
            $table->string('group');
            $table->integer('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('pages')->onDelete('cascade');
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
        Schema::dropIfExists('pages');
    }
}
