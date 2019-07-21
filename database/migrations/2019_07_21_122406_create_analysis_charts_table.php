<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalysisChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analysis_charts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('md5')->default('');
            $table->string('path')->default('');
            $table->integer('category_id')->default(0);
            $table->string('category')->default('');
            $table->string('title')->default('');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->index('md5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analysis_charts');
    }
}
