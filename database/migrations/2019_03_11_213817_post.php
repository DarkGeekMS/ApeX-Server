<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'posts',
            function (Blueprint $table) {
                $table->string('id')->unique();
                $table->string('posted_by');
                $table->string('apex_id');
                $table->string('img')->nullable();
                $table->string('videolink')->nullable();
                $table->text('content')->nullable();
                $table->timestamp('posted_at');
                $table->boolean('locked')->default(false);
                $table->primary('id');
                $table->foreign('posted_by')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('apex_id')->references('id')->on('apex_coms')->onDelete('cascade');
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
          Schema::dropIfExists('posts');
    }
}
