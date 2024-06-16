<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('administrator', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->primary();
            $table->foreign('user_id')->references('user_id')->on('user')->onUpdate('cascade')->onDelete('cascade');
            $table->string('job_title');
            $table->boolean('is_super_admin')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('administrator');
    }
};
