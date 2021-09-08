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
            $table->string('observation',500);
            $table->string('name',50);
            $table->string('zip_code',9);
            $table->string('public_place',50);
            $table->integer('number');
            $table->char('state',2);
            $table->string('city',50);
            $table->string('phone_number',20);
            $table->string('country',50);
            $table->string('complement',50);
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
