<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Moderate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'moderators',
            function (Blueprint $table) {
                $table->string('apexID');
                $table->string('userID');
                $table->timestamps();
                $table->primary(['userID','apexID']);
                $table->foreign('apexID')->references('id')->on('apex_coms')->onDelete('cascade');
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
          Schema::dropIfExists('moderators');
    }
}
