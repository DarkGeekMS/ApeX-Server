<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Message extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'message',
            function (Blueprint $table) {
                $table->string('id')->unique();
                $table->text('content');
                $table->string('subject');
                $table->string('parent');
                $table->string('sender');
                $table->string('receiver');
                $table->timestamp('sentAt');
                $table->boolean('received');
                $table->boolean('delSend');
                $table->boolean('delReceive');
                $table->primary('id');
                $table->foreign('parent')->references('id')->on('message')->onDelete('cascade');
                $table->foreign('sender')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('receiver')->references('id')->on('users')->onDelete('cascade');
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
          Schema::dropIfExists('message');
    }
}
