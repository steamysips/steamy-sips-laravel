<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('password_change_requests', function (Blueprint $table) {
            $table->id('request_id');
            $table->unsignedInteger('user_id');
            $table->string('token_hash');
            $table->dateTime('expiry_date');
            $table->boolean('used')->default(false)->comment('Whether token has been used once');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('password_change_requests');
    }
};
