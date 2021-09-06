<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('photo_path');
            $table->string('observation');
            $table->string('name');
            $table->string('zip_code');
            $table->string('public_place');
            $table->integer('number');
            $table->string('state');
            $table->string('city');
            $table->string('phone_number');
            $table->string('country');
            $table->string('complement');
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
        Schema::dropIfExists('contacts');
    }
}
