<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->increments('review_id');
            $table->unsignedInteger('rating');
            $table->timestamp('created_date')->useCurrent();
            $table->string('text', 2000);
            $table->unsignedInteger('client_id');
            $table->foreign('client_id')->references('user_id')->on('client')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('product')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('review');
    }
};
