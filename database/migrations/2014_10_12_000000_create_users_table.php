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
                $table->string('fullname')->nullable();
                $table->string('email')->unique();
                $table->string('username')->unique();
                $table->string('password');
                $table->string('avatar')->default('/storage/avatars/users/t2_3872.jpg');
                $table->integer('karma')->default(1);
                $table->boolean('notification')->default(true);
                $table->integer('type')->default(1);   //1 normal user , 2 moderator , 3 admin
                $table->timestamps();
                $table->primary('id');
                $table->SoftDeletes();
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
