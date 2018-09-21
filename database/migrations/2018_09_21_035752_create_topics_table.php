<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string ('title')->default('')->comment('文章标题');
            $table->text ('content')->comment('文章内容');
            $table->unsignedInteger ('user_id')->index();
            $table->foreign('user_id')//外键
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->unsignedInteger ('category_id')->index()->default(0)->comment('栏目id');
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
        Schema::dropIfExists('topics');
    }
}
