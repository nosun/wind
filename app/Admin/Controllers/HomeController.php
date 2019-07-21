<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AnalysisChart;
use Carbon\Carbon;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Content;
use App\Models\VibrationData;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Content $content){
        return redirect('/dataMap');
    }

    public function index1(Content $content, Request $request)
    {

        // for sql query
        $start = $this->getMiniMonth();
        $end = Carbon::parse(time())->format('Ym');

        // for show
        $start_1 =  Carbon::parse($start.'01')->format('m/d/Y');
        $end_1 = Carbon::parse(time())->format('m/d/Y');
        $date_range = $start_1 . ' - ' . $end_1;

        if ($request->method() == 'POST') {
            $date_range = $request->post('date_range');
            if ($date_range) {
                $_arr = explode(' - ', $date_range);
                if (count($_arr) == 2) {
                    $start = Carbon::parse($_arr[0])->format('Ym');
                    $end = Carbon::parse($_arr[1])->format('Ym');
                }
            }
        }

        $data1 = $this->getFengZhenData(1, $start, $end);
        $data2 = $this->getFengZhenData(2, $start, $end);
        $data3 = $this->getFengZhenData(3, $start, $end);
        $data4 = $this->getFengZhenData(4, $start, $end);

        $charts = AnalysisChart::query()->select(
            [
                'category_1','category_2','category_3','category_4',
                'type','number','title','path','description'
            ]
        )->get();

        $charts = $this->formatCharts($charts);

        return $content
            ->header('数据特征挖掘')
            ->breadcrumb(
                ['text' => '数据特征挖掘']
            )->view('admin.custom.home', [
                'data1' => $data1,
                'data2' => $data2,
                'data3' => $data3,
                'data4' => $data4,
                'date_range' => $date_range,
                'charts' => $charts
            ]);
    }

    protected function formatCharts($charts){
        $_arr = [];
        foreach($charts as $chart){
            if($chart['category_4']){
                $_arr[$chart['category_1']][$chart['category_2']][$chart['category_3']][$chart['category_4']][] = $chart;
            }else{
                if($chart['category_3']){
                    $_arr[$chart['category_1']][$chart['category_2']][$chart['category_3']][] = $chart;
                }else{
                    if($chart['category_2']){
                        $_arr[$chart['category_1']][$chart['category_2']][] = $chart;
                    }
                }
            }
        }
        return $_arr;
    }

    protected function getMiniMonth()
    {
        $result = VibrationData::query()->whereIn('batch', [2, 3])
            ->selectRaw("MIN(time) as time")->first();
        return $result->time;
    }

    protected function getFengZhenData($level, $start, $end)
    {
        $query = VibrationData::query()->whereIn('batch', [2, 3]);

        if ($start) {
            $query = $query->where('time', '>', $start);
        }

        if ($end) {
            $query = $query->where('time', '<', $end);
        }

        return $query->where('fengzhen', $level)
            ->groupBy('province')
            ->selectRaw("province as name,count(id) as value")->get()->toJson();
    }

    protected function formatData($data)
    {

        $array = [];
        foreach ($data as $row) {
            $array[$row->level][] = [
                $row->name => $row->value
            ];
        }

        return $array;
    }

    public function nouse(Content $content)
    {
        return $content
            ->row(Dashboard::title())
            ->view('admin.custom.home', []);
    }
}
