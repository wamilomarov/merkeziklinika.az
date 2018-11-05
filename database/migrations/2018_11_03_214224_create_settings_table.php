<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->string('logo');
            $table->string('address_az');
            $table->string('address_en');
            $table->string('address_ru');
            $table->string('email');
            $table->string('facebook');
            $table->string('linkedin');
            $table->string('twitter');
            $table->string('youtube');
            $table->string('hospital_phone');
            $table->string('ambulance_phone');
            $table->string('dentistry_phone');
            $table->string('family_health_phone');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('short_about_us_heading_az');
            $table->string('short_about_us_heading_en');
            $table->string('short_about_us_heading_ru');
            $table->string('short_about_us_text_az');
            $table->string('short_about_us_text_en');
            $table->string('short_about_us_text_ru');
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
        Schema::dropIfExists('settings');
    }
}
