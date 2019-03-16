<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SavePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'save_posts',
            function (Blueprint $table) {
                $table->string('postID');
                $table->string('userID');
                $table->timestamps();
                $table->primary(['userID','postID']);
                $table->foreign('postID')->references('id')->on('posts')->onDelete('cascade');
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
          Schema::dropIfExists('savePosts');
    }
}
