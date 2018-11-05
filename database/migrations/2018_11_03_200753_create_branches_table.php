<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branches', function (Blueprint $table) {
            //
            $table->increments('id')->unsigned();
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('address_az');
            $table->string('address_en');
            $table->string('address_ru');
            $table->string('email');
            $table->string('hospital_phone');
            $table->string('ambulance_phone');
            $table->string('fax');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
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
        Schema::table('branches', function (Blueprint $table) {
            //
        });
    }
}
