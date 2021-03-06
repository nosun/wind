<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVibrationDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vibration_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filename');
            $table->tinyInteger('batch')->default(0);
            $table->string('time')->default('');
            $table->integer('number');
            $table->integer('evid');
            $table->string('province', '16')->default('');
            $table->string('line_name', '50')->default('');
            $table->integer('clock');
            $table->integer('voltage');
            $table->integer('gt_number');
            $table->integer('voltage_type');
            $table->integer('span');
            $table->float('line_angle');
            $table->float('wind_direction');
            $table->float('wind_speed');
            $table->string('humidity')->default('');
            $table->float('temperature');
            $table->float('precipitation');
            $table->float('ice_thickness');
            $table->float('angle');
            $table->float('vertical_wind_speed');
            $table->integer('podu');
            $table->integer('pogao');
            $table->integer('dimao');
            $table->integer('fengzhen');
            $table->integer('tiaozha');
            $table->integer('pohuai');

            $table->timestamps();

            $table->index('filename');
            $table->index('batch');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vibration_data');
    }
}
