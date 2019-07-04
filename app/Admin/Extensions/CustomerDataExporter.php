<?php

namespace App\Admin\Extensions;

use Encore\Admin\Grid\Exporters\ExcelExporter;

class CustomerDataExporter extends ExcelExporter
{
    protected $fileName = '地图数据.xlsx';

    protected $columns = [
        'uid' => '标识',
        'channel' => '来源',
        'keywords' => '关键词',
        'name' => '名称',
        'province' => '省份',
        'city' => '城市',
        'area' => '地区',
        'address' => '地址',
        'telephone' => '手机号',
    ];
}