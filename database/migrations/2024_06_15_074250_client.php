<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->primary('user_id');
            $table->string('street');
            $table->string('city');
            $table->foreignId('district_id')->constrained('district')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('user')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('client');
    }
};
