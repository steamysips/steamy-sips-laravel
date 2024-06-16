<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->enum('status', ['pending', 'cancelled', 'completed'])->default('pending');
            $table->timestamp('created_date')->useCurrent();
            $table->timestamp('pickup_date')->nullable();
            $table->unsignedInteger('client_id')->nullable();
            $table->foreign('client_id')->references('user_id')->on('client')->onDelete('set null')->onUpdate('cascade');
            $table->unsignedInteger('store_id');
            $table->foreign('store_id')->references('store_id')->on('store');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order');
    }
};
