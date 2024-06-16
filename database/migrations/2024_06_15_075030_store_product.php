<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('store_product', function (Blueprint $table) {
            $table->unsignedInteger('store_id');
            $table->foreign('store_id')->references('store_id')->on('store');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('product');
            $table->unsignedInteger('stock_level');
            $table->primary(['store_id', 'product_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('store_product');
    }
};
