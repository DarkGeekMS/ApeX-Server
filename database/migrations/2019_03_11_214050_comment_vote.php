<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentVote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'commentVote',
            function (Blueprint $table) {
                $table->string('comID');
                $table->string('userID');
                $table->integer('dir')->default(0);
                $table->primary(['userID','comID']);
                $table->foreign('comID')->references('id')->on('comment')->onDelete('cascade');
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
          Schema::dropIfExists('commentVote');
    }
}
