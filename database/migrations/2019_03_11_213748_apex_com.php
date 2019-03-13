<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApexCom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create(
                'apexCom',
                function (Blueprint $table) {
                    $table->string('id')->unique();
                    $table->string('avatar');
                    $table->string('banner');
                    $table->text('rules');
                    $table->text('description');
                    $table->primary('id');
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
          Schema::dropIfExists('apeXcom');
    }
}
