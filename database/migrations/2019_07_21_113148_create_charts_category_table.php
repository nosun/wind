<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChartsCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charts_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_1')->comment('一级栏目');
            $table->string('category_2')->comment('二级栏目');
            $table->tinyInteger('weight')->default(0);
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
        Schema::dropIfExists('charts_category');
    }
}
