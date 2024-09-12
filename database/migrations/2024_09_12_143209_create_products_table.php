<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(column: 'product_id'); // Primary key
            $table->string('name'); // Product name
            $table->unsignedInteger('calories'); // Calories
            $table->string('img_url'); // Image URL
            $table->string('img_alt_text', 150); // Alt text for the image
            $table->string('category', 50); // Product category
            $table->decimal('price', 10, 2); // Product price
            $table->text('description'); // Product description
            $table->timestamps(); // Automatically adds 'created_at' and 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
