<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('password_change_request', function (Blueprint $table) {
            $table->increments('request_id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('user')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('token_hash');
            $table->timestamp('expiry_date');
            $table->boolean('used')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('password_change_request');
    }
};
