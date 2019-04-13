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
                $table->string('posted_by')->nullable();
                $table->string('apex_id');
                $table->string('title');
                $table->string('img')->nullable();
                $table->string('videolink')->nullable();
                $table->text('content')->nullable();
                $table->boolean('locked')->default(false);
                $table->timestamps();
                $table->primary('id');
                $table->foreign('posted_by')->references('id')->on('users')->onDelete('set null');
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
