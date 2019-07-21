<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWikiDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wiki_docs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->default(0);
            $table->string('title', 255);
            $table->string('path', 255);
            $table->string('type', 32)->comment('文件类型')->default('doc');
            $table->float('size')->comment('文件大小')->default(0);
            $table->string('ext', 32)->comment('文件后缀')->default('');
            $table->tinyInteger('weight')->comment('推荐级别')->default(0);
            $table->string('md5',255)->comment('hash');
            $table->string('author',255)->comment('作者')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return voidphp
     */
    public function down()
    {
        Schema::dropIfExists('wiki_docs');
    }
}
