<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('order_id')->on('order');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('product');
            $table->enum('cup_size', ['small', 'medium', 'large']);
            $table->enum('milk_type', ['almond', 'coconut', 'oat', 'soy']);
            $table->unsignedInteger('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->primary(['order_id', 'product_id', 'cup_size', 'milk_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_product');
    }
};
