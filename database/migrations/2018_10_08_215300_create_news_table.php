<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('文章名称');
            $table->string('description')->comment('新闻简介');
            $table->string('author')->comment('作者');
            $table->unsignedInteger('click')->comment('点击数');
            $table->string('source')->comment('新闻来源');
            $table->text('content')->comment('文章内容');
            $table->string('thumb')->comment('缩略图地址');
            $table->string('news_category_id')->comment('新闻所属分类');
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
        Schema::dropIfExists('news');
    }
}
