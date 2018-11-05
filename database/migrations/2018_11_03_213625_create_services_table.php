<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->string('title_az', 200);
            $table->string('title_ru', 200);
            $table->string('title_en', 200);
            $table->string('description_az', 500);
            $table->string('description_ru', 500);
            $table->string('description_en', 500);
            $table->string('icon');
            $table->string('url');
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
        Schema::dropIfExists('services');
    }
}
