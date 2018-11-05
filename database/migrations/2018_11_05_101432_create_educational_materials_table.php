<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationalMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('educational_materials', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->string('category', 50);
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('link');
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
        Schema::table('educational_materials', function (Blueprint $table) {
            //
        });
    }
}
