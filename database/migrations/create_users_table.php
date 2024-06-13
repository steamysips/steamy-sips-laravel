<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('email', 320)->unique();
            $table->string('first_name');
            $table->string('password');
            $table->string('phone_no');
            $table->string('last_name');
            $table->timestamps();

            $table->check('char_length(email) > 0');
            $table->check('char_length(password) > 8');
            $table->check('char_length(phone_no) > 6');
            $table->check('char_length(first_name) > 2');
            $table->check('char_length(last_name) > 2');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
