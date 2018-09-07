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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('phone')->unique()->nullable()->comment('电话');
            $table->tinyInteger ('email_valid')->default(0)->comment('是否邮箱验证，1是，0否');
            $table->tinyInteger ('mobile_valid')->default(0)->comment('是否手机验证，1是，0否');
            $table->tinyInteger ('is_admin')->default(0)->comment('是否为管理员，1是，0否');
        });
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
