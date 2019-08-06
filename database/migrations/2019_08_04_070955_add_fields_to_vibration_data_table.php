<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToVibrationDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vibration_data', function (Blueprint $table) {
            $table->float('altitude')->default(0.0);
            $table->float('longitude')->default(0.0);
            $table->float('latitude')->default(0.0);
            $table->string('line_type',255)->default('');
            $table->integer('split_number')->default(0);
            $table->integer('split_span')->default(0);
            $table->integer('max_span')->default(0);
            $table->string('insulator_type',255)->default('');
            $table->tinyInteger('shock_device')->default(0)
                ->comment('0 means false,1 means true');
            $table->string('reserved_a')->default('');
            $table->string('reserved_b')->default('');
            $table->float('reserved_c')->default(0);
            $table->float('reserved_d')->default(0);
            $table->float('reserved_e')->default(0);

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
            $table->dropColumn('altitude');
            $table->dropColumn('longitude');
            $table->dropColumn('latitude');
            $table->dropColumn('line_type');
            $table->dropColumn('split_number');
            $table->dropColumn('split_span');
            $table->dropColumn('max_span');
            $table->dropColumn('insulator_type');
            $table->dropColumn('shock_device');
            $table->dropColumn('reserved_a');
            $table->dropColumn('reserved_b');
            $table->dropColumn('reserved_c');
            $table->dropColumn('reserved_d');
            $table->dropColumn('reserved_e');
        });
    }
}
