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
            'post',
            function (Blueprint $table) {
                $table->string('id')->unique();
                $table->string('posted_by');
                $table->string('apex_id');
                $table->string('img');
                $table->string('videolink');
                $table->text('content');
                $table->timestamp('posted_at');
                $table->boolean('locked');
                $table->primary('id');
                $table->foreign('posted_by')->references('id')->on('users');
                $table->foreign('apex_id')->references('id')->on('apexCom');
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
          Schema::dropIfExists('post');
    }
}
