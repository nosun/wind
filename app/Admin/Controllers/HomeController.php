<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Content;
use App\Models\VibrationData;

class HomeController extends Controller
{

    public function index(Content $content)
    {
        $data = VibrationData::query()->groupBy('province')
            ->selectRaw("province as name,count(id) as value")->get()->toJson();

        return $content
            ->header('数据特征挖掘')
            ->breadcrumb(
                ['text' => '数据特征挖掘']
            )->view('admin.custom.home', ['data' => $data]);
    }

    public function nouse(Content $content)
    {
        return $content
            ->row(Dashboard::title())
            ->view('admin.custom.home', []);
    }
}
