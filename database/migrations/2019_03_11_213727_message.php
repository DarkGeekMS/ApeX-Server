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
            'messages',
            function (Blueprint $table) {
                $table->string('id')->unique();
                $table->text('content');
                $table->string('subject')->nullable();
                $table->string('parent')->nullable();
                $table->string('sender');
                $table->string('receiver');
                $table->timestamps();
                $table->boolean('received')->default(false);
                $table->boolean('delSend')->default(false);
                $table->boolean('delReceive')->default(false);
                $table->primary('id');
                $table->foreign('parent')->references('id')->on('messages')->onDelete('cascade');
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
          Schema::dropIfExists('messages');
    }
}
