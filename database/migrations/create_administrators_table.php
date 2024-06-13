<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('administrators', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->string('job_title');
            $table->boolean('is_super_admin')->default(false);
            $table->timestamps();

            $table->primary('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->check('char_length(job_title) > 3');
        });
    }

    public function down()
    {
        Schema::dropIfExists('administrators');
    }
};
