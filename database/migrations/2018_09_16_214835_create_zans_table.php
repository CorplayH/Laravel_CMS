<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger ('user_id')->index()->comment('点赞用户id');
            $table->unsignedInteger ('zan_id')->index()->comment('点赞的文章/视频..id');
            $table->string ('zan_type')->index()->comment('点赞类型:article/comment/video...');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zans');
    }
}
