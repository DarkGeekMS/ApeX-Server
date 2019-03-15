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
                'apexComs',
                function (Blueprint $table) {
                    $table->string('id')->unique();
                    $table->string('avatar')->default('public\img\apx.png');
                    $table->string('banner')->default('public\img\banner.jpg');
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
          Schema::dropIfExists('apexComs');
    }
}
