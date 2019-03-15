<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'users',
            function (Blueprint $table) {
                $table->string('id')->unique();
                $table->string('fullname');
                $table->string('email')->unique();
                $table->string('username')->unique();
                $table->string('password');
                $table->string('avatar')->default('public\img\def.jpg');
                $table->integer('karma')->default(1);
                $table->boolean('notification')->default(true);
                $table->integer('type')->default(1);   //i normal user , 2 moderator , 3 admin
                $table->timestamps();
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
        Schema::dropIfExists('users');
    }
}
