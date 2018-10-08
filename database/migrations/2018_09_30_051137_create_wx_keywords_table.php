<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wx_keywords', function (Blueprint $table) {
            $table->increments('id');
            $table->string('keyword')->comment('关键词');
            $table->unsignedInteger('wx_rule_id')->comment('所属规则(Wxrule)编号');
            $table->foreign('wx_rule_id')//设wx_rule_id为外键
                  ->references('id')->on('wx_rules')->onDelete('cascade');
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
        Schema::dropIfExists('wx_keywords');
    }
}
