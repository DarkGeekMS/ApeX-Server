<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'vote',
            function (Blueprint $table) {
                $table->string('postID')->unique();
                $table->string('userID');
                $table->primary(['postID','userID']);
                $table->integer('dir')->default(0);
                $table->foreign('postID')->references('id')->on('post')->onDelete('cascade');
                $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('vote');
    }
}
