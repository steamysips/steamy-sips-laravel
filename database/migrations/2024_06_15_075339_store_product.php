<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('store_product', function (Blueprint $table) {
            $table->foreignId('store_id')->primary()->constrained('store');
            $table->foreignId('product_id')->constrained('product');
            $table->unsignedInteger('stock_level');
        });
    }

    public function down()
    {
        Schema::dropIfExists('store_product');
    }
};
