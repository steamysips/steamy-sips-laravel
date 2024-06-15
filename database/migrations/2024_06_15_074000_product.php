<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('name');
            $table->unsignedInteger('calories');
            $table->string('img_url');
            $table->string('img_alt_text', 150);
            $table->string('category', 50);
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->timestamp('created_date')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product');
    }
};
