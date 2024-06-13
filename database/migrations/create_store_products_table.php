<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('store_products', function (Blueprint $table) {
            $table->unsignedInteger('store_id');
            $table->unsignedInteger('product_id');
            $table->timestamps();

            $table->primary(['store_id', 'product_id']);
            $table->foreign('store_id')->references('store_id')->on('stores');
            $table->foreign('product_id')->references('product_id')->on('products');
        });
    }

    public function down()
    {
        Schema::dropIfExists('store_products');
    }
};
