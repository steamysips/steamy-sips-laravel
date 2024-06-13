<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_id');
            $table->string('text', 2000);
            $table->dateTime('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('parent_comment_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('review_id');
            $table->timestamps();

            $table->foreign('parent_comment_id')->references('comment_id')->on('comments')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('review_id')->references('review_id')->on('reviews');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
