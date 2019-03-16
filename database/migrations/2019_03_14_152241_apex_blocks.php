<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApexBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'apexBlocks',
            function (Blueprint $table) {
                $table->string('ApexID');
                $table->string('blockedID');
                $table->timestamps();
                $table->primary(['blockedID','ApexID']);
                $table->foreign('blockedID')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('ApexID')->references('id')->on('apexComs')->onDelete('cascade');
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
          Schema::dropIfExists('apexBlocks');
    }
}
