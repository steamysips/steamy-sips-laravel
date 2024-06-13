<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->enum('status', ['pending', 'cancelled', 'completed'])->default('pending');
            $table->dateTime('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('pickup_date')->nullable()->comment('Date when client picks up his order at the store');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('store_id');
            $table->timestamps();

            $table->foreign('client_id')->references('user_id')->on('clients')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('store_id')->references('store_id')->on('stores');
            $table->check('pickup_date IS NULL OR pickup_date >= created_date');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
