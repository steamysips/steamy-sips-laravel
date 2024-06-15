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
            $table->foreignId('client_id')->constrained('client')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('product_id')->constrained('product')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('review');
    }
};
