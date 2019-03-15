<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'comments',
            function (Blueprint $table) {
                $table->string('id')->unique();
                $table->string('commented_by');
                $table->text('content');
                $table->string('root')->nullable();     //post id
                $table->string('parent')->nullable();  //comment id
                $table->primary('id');
                $table->foreign('commented_by')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('root')->references('id')->on('posts')->onDelete('cascade');
                $table->foreign('parent')->references('id')->on('comments')->onDelete('cascade');
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
          Schema::dropIfExists('comments');
    }
}
