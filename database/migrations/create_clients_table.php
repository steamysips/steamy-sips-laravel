<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->string('street');
            $table->string('city');
            $table->unsignedInteger('district_id');
            $table->timestamps();

            $table->primary('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('district_id')->references('district_id')->on('districts')->onUpdate('cascade');
            $table->check('char_length(city) > 2');
            $table->check('char_length(street) > 3');
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
