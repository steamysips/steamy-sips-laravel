<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('review_id');
            $table->string('title');
            $table->text('description');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->unsignedTinyInteger('rating');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('product_id');
            $table->timestamps();

            $table->foreign('client_id')->references('user_id')->on('clients');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->check('rating BETWEEN 1 AND 5');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
