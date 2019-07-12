<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVibrationDataTable extends Migration
{

//本次共新增加了3个字段：Unique、time、Pici，修改一个字段Wudong
//其中1：Unique是当前时间+MD5值生成的，这个属性作为主键
//2：Time是年月，以’.’作为分隔，99开头的表示是人工添加的数据(time用于地图展示，数据格式为“年.月”(例2015.1)形式、或者“99年.月”(例992015.1)的形式)
//3：Pici表示数据属于第几批次，批次1表示800w条数据，批次2表示迁移学习数据，批次3表示细分类数据，其中批次1数据没有time属性
//4原来Wudong属性已修改为Fengzhen
//(注：批次1没有time属性)
//(注2：第一批数据只是一部分，还有部分后续发)


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
            $table->string('key');
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

            $table->index('key');
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
