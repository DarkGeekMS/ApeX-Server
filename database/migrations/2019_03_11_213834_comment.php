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
            'comment',
            function (Blueprint $table) {
                $table->string('id')->unique();
                $table->string('commented_by');
                $table->text('content');
                $table->string('root');
                $table->string('parent');
                $table->primary('id');
                $table->foreign('commented_by')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('root')->references('id')->on('post')->onDelete('cascade');
                $table->foreign('parent')->references('id')->on('comment')->onDelete('cascade');
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
          Schema::dropIfExists('comment');
    }
}
