<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id('store_id');
            $table->string('city');
            $table->unsignedInteger('district_id');
            $table->string('street');
            $table->timestamps();

            $table->foreign('district_id')->references('district_id')->on('districts')->onUpdate('cascade');
            $table->check('char_length(city) > 2');
            $table->check('char_length(street) > 3');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stores');
    }
};
