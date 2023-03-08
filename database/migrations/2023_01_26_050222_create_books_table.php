<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('book_id');
            $table->string('title');
            $table->string('author');
            $table->string('publisherName');
            $table->string('isbn');
            $table->string('largeImageUrl');
            // サマリー：紹介文
            $table->string('itemCaption')->nullable();
            $table->string('gunre')->nullable();
            $table->string('myReview')->nullable();
            // 貸出可能かavailable
            $table->boolean('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
