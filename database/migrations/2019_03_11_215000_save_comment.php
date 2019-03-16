<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SaveComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'save_comments',
            function (Blueprint $table) {
                $table->string('comID');
                $table->string('userID');
                $table->primary(['userID','comID']);
                $table->foreign('comID')->references('id')->on('comments')->onDelete('cascade');
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
          Schema::dropIfExists('saveComments');
    }
}
