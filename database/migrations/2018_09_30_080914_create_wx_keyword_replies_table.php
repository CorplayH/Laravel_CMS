<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxKeywordRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wx_keyword_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('data')->comment('回复内容');
            $table->string('type')->comment('回复类型');
            $table->unsignedInteger('wx_rule_id')->comment('所属规则编号');
            //外键约束
            $table->foreign('wx_rule_id')//外键
                  ->references('id')->on('wx_rules')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('wx_keyword_replies');
    }
}
