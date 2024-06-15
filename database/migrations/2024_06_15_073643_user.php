<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_no');
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamp('created_date')->useCurrent();
            $table->boolean('disabled')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
};
