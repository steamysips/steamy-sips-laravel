<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->primary();
            $table->string('street');
            $table->string('city');
            $table->unsignedInteger('district_id');
            $table->foreign('district_id')->references('district_id')->on('district')->onUpdate('cascade');
            $table->foreign('user_id')->references('user_id')->on('user')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('client');
    }
};
