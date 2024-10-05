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
        Schema::create('stores', function (Blueprint $table) {
            $table->id(column:'store_id');
            $table->string('phone_no');
            $table->string('street');
            $table->string('city');
            $table->point('coordinate')->nullable();
            $table->enum('districts', ['Moka','Port Louis','Flacq','Curepipe','Black River','Savanne','Grand Port','Riviere du Rempart','Pamplemousses','Mahebourg','Plaines Wilhems']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
