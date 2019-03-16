<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReportComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'report_comments',
            function (Blueprint $table) {
                $table->string('comID');
                $table->string('userID');
                $table->text('content');
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
          Schema::dropIfExists('reportComments');
    }
}
