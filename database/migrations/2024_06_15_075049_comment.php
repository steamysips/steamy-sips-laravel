<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->string('text', 2000);
            $table->timestamp('created_date')->useCurrent();
            $table->foreignId('parent_comment_id')->nullable()->constrained('comment')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('user');
            $table->foreignId('review_id')->constrained('review');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comment');
    }
};
