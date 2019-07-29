<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWeightToAnalysisChartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up  ()
    {
        Schema::table('analysis_charts', function (Blueprint $table) {
            $table->integer('weight')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('analysis_charts', function (Blueprint $table) {
            $table->dropColumn('weight');
        });
    }
}
