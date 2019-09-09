<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToVibrationDataTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vibration_data', function (Blueprint $table) {
            $table->float('line_split_num')->default(0.0);
            $table->float('sub_span')->default(0.0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vibration_data', function (Blueprint $table) {
            $table->dropColumn('line_split_num');
            $table->dropColumn('sub_span');
        });
    }
}
