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
            $table->unsignedInteger('parent_comment_id')->nullable();
            $table->foreign('parent_comment_id')->references('comment_id')->on('comment')->onDelete('cascade');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->unsignedInteger('review_id');
            $table->foreign('review_id')->references('review_id')->on('review');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comment');
    }
};
