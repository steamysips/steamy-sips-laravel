<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('name');
            $table->unsignedInteger('calories');
            $table->string('img_url');
            $table->string('img_alt_text', 150);
            $table->string('category');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->dateTime('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();

            $table->check('char_length(name) > 2');
            $table->check('char_length(img_alt_text) BETWEEN 5 AND 150');
            $table->check('char_length(category) > 2');
            $table->check("img_url LIKE '%.png' OR img_url LIKE '%.jpeg' OR img_url LIKE '%.avif' OR img_url LIKE '%.jpg' OR img_url LIKE '%.webp'");
            $table->check('char_length(description) > 0');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
