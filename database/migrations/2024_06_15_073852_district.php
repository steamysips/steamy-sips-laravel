<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('district', function (Blueprint $table) {
            $table->increments('district_id');
            $table->enum('name', ['Moka','Port Louis','Flacq','Curepipe','Black River','Savanne','Grand Port','Riviere du Rempart','Pamplemousses','Mahebourg','Plaines Wilhems'])->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('district');
    }
};
