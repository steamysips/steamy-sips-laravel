<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            $table->increments('store_id');
            $table->string('phone_no');
            $table->string('street');
            $table->point('coordinate')->nullable()->default(null);
            $table->unsignedInteger('district_id');
            $table->foreign('district_id')->references('district_id')->on('district');
        });
    }

    public function down()
    {
        Schema::dropIfExists('store');
    }
};
