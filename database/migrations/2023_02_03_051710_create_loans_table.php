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
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('loan_id');
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('user_id');
            // ↑に作ったカラムに外部キー指定↓
            $table->foreign('book_id')->references('book_id')->on('books');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->date('loan_date');
            $table->date('return_date');
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
        Schema::dropIfExists('loans');
    }
};
