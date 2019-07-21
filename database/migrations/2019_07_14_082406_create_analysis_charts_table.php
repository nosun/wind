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
            $table->string('md5');
            $table->string('path');
            $table->string('category_1');
            $table->string('category_2');
            $table->string('category_3');
            $table->string('category_4');
            $table->string('type');
            $table->string('number');
            $table->string('title');
            $table->string('ext');
            $table->text('description');
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
