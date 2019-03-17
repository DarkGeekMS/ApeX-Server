<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Block extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'blocks',
            function (Blueprint $table) {
                $table->string('blockerID');
                $table->string('blockedID');
                $table->timestamps();
                $table->primary(['blockedID','blockerID']);
                $table->foreign('blockedID')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('blockerID')->references('id')->on('users')->onDelete('cascade');
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
          Schema::dropIfExists('blocks');
    }
}
