<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaralumAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('laralum_addresses_state', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('laralum_addresses_city', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('state_id');
            $table->timestamps();
        });

        Schema::create('laralum_addresses_neighborhood', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->timestamps();
        });

        Schema::create('laralum_addresses_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->integer('neighborhood_id');
            $table->string('street');
            $table->string('zip_code');
            $table->string('number');
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
        Schema::dropIfExists('laralum_addresses_state');
        Schema::dropIfExists('laralum_addresses_city');
        Schema::dropIfExists('laralum_addresses_neighborhood');
        Schema::dropIfExists('laralum_addresses_address');
    }
}
