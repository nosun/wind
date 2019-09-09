<?php

namespace App\Admin\Controllers;

use App\Models\VibrationData;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Encore\Admin\Widgets\Box;
use View;

class VibrationDataController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '风振数据';

    /**
     * Index interface.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function index(Content $content)
    {

        $info = View::make('admin.custom.parts.filter-info');

        $box = new Box('筛选项取值范围', $info);
        $box->style('primary');
        $box->collapsable();
        $box->solid();

        return $content
            ->title($this->title())
            ->body($box)
            ->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new VibrationData);

        $grid->column('span', __('Span'));
        $grid->column('line_angle', __('Line Angle'));
        $grid->column('wind_direction', __('Wind Direction'));
        $grid->column('wind_speed', __('Wind Speed'));
        $grid->column('humidity', __('Humidity'));
        $grid->column('temperature', __('Temperature'));
        $grid->column('angle', __('Angle'));
        $grid->column('precipitation', __('Precipitation'));
        $grid->column('ice_thickness', __('Ice Thickness'));
        $grid->column('province', __('Province'));
        $grid->column('line_name', __('Line Name'));
        $grid->column('voltage', __('Voltage'));
        $grid->column('gt_number', __('Gt Number'));
        $grid->column('voltage_type', __('Voltage Type'));
        $grid->column('vertical_wind_speed', __('Vertical Wind Speed'));
        $grid->column('podu', __('Podu'));
        $grid->column('pogao', __('Pogao'));
        $grid->column('dimao', __('Dimao'));
        $grid->column('tiaozha', __('Tiaozha'));
        $grid->column('pohuai', __('Pohuai'));
        $grid->column('fengzhen', __('Fengzhen'));
        $grid->column('batch', __('Batch'));
//        $grid->column('line_split_num', __('Line Split Number'));
//        $grid->column('sub_span', __('Sub Span'));

        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            $filter->column(2 / 3, function ($filter) {

                $filter->between('span', __('Span'));
                $filter->between('line_angle', __('Line Angle'));
                $filter->between('wind_speed', __('Wind Speed'));
                $filter->between('humidity', __('Humidity'));
                $filter->between('temperature', __('Temperature'));
                $filter->between('precipitation', __('Precipitation'));
                $filter->between('ice_thickness', __('Ice Thickness'));
                $filter->between('angle', __('Angle'));

            });

            $filter->column(1 / 3, function ($filter) {
                $provinces = config('app.provinces');
                $province_options = (function ($provinces){
                    $options = [];
                    foreach($provinces as $province){
                        $options[$province] = $province;
                    }
                    return $options;
                })($provinces);

                $filter->like('batch', __('Batch'));
                $filter->equal('province', __('Province'))->select($province_options);
                $filter->like('line_name', __('Line Name'));
                $filter->in('tiaozha', __('Tiaozha'))->radio([
                    0 => 0,
                    1 => 1,
                ]);

                $filter->equal('pohuai', __('Pohuai'))->select([
                    0 => 0,
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                ]);

                $filter->equal('fengzhen', __('Fengzhen'))->select(
                    [
                        0 => '无异常',
                        1 => '舞动',
                        2 => '风偏',
                        3 => '微风振动',
                        4 => '次档距振荡'
                    ]
                );
            });
        });

        $grid->disableActions();
        $grid->disableCreateButton();
        $grid->disableRowSelector();

//        $grid->tools(function ($tools) {
//            $tools->append('<div class="btn-group" style="margin-right: 5px">
//                <a href="' . route('admin.vibrationData.showMap') . '" class="btn btn-sm btn-warning" title="地理分布图">
//                    <i class="fa fa-map"></i><span class="hidden-xs"> 地理分布图 </span>
//                </a></div>');
//
//            $tools->append('<div class="btn-group" style="margin-right: 5px">
//                <a href="' . route('admin.vibrationData.importForm') . '" class="btn btn-sm btn-success" title="导入数据">
//                    <i class="fa fa-database"></i><span class="hidden-xs"> 导入数据 </span>
//                </a></div>');
//        });

//        $grid->header(function ($query) {
//
//            $gender = $query->select(DB::raw('count(gender) as count, gender'))
//                ->groupBy('gender')->get()->pluck('count', 'gender')->toArray();
//
//            $doughnut = view('admin.chart.gender', compact('gender'));
//
//            return new Box('性别比例', $doughnut);
//        });

//        $grid->tools(function ($tools){
//            $tools->add
//        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(VibrationData::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('number', __('Number'));
        $show->field('evid', __('Evid'));
        $show->field('province', __('Province'));
        $show->field('line_name', __('Line name'));
        $show->field('clock', __('Clock'));
        $show->field('voltage', __('Voltage'));
        $show->field('gt_number', __('Gt number'));
        $show->field('voltage_type', __('Voltage type'));
        $show->field('span', __('Span'));
        $show->field('line_angle', __('Line Angle'));
        $show->field('wind_direction', __('Wind Direction'));
        $show->field('wind_speed', __('Wind Speed'));
        $show->field('humidity', __('Humidity'));
        $show->field('temperature', __('Temperature'));
        $show->field('precipitation', __('Precipitation'));
        $show->field('ice_thickness', __('Ice Thickness'));
        $show->field('angle', __('Angle'));
        $show->field('vertical_wind_speed', __('Vertical Wind Speed'));
        $show->field('podu', __('Podu'));
        $show->field('pogao', __('Pogao'));
        $show->field('dimao', __('Dimao'));
        $show->field('wudong', __('Wudong'));
        $show->field('tiaozha', __('Tiaozha'));
        $show->field('pohuai', __('Pohuai'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new VibrationData);

        $form->number('number', __('Number'));
        $form->number('evid', __('Evid'));
        $form->text('province', __('Province'));
        $form->text('line_name', __('Line Name'));
        $form->number('clock', __('Clock'));
        $form->number('voltage', __('Voltage'));
        $form->number('gt_number', __('Gt Number'));
        $form->number('voltage_type', __('Voltage Type'));
        $form->number('span', __('Span'));
        $form->decimal('line_angle', __('Line Angle'));
        $form->decimal('wind_direction', __('Wind Direction'));
        $form->decimal('wind_speed', __('Wind Speed'));
        $form->text('humidity', __('Humidity'));
        $form->decimal('temperature', __('Temperature'));
        $form->decimal('precipitation', __('Precipitation'));
        $form->decimal('ice_thickness', __('Ice Thickness'));
        $form->decimal('angle', __('Angle'));
        $form->decimal('vertical_wind_speed', __('Vertical Wind Speed'));
        $form->number('podu', __('Podu'));
        $form->number('pogao', __('Pogao'));
        $form->number('dimao', __('Dimao'));
        $form->number('wudong', __('Wudong'));
        $form->number('tiaozha', __('tiaozha'));
        $form->number('pohuai', __('Pohuai'));

        return $form;
    }

    public function showMap(Content $content, Request $request)
    {

        // for sql query
        $start = $this->getMiniMonth();
        $end = Carbon::parse(time())->format('Ym');

        // for show
        $start_1 = Carbon::parse($start . '01')->format('m/d/Y');
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

        return $content
            ->header('风振数据分布图')
            ->description('各省上传数据分布')
            ->breadcrumb(
                ['text' => '风振数据', 'url' => route('admin.vibrationData.index')],
                ['text' => '分布图']
            )->view('admin::custom.vibration-data-map', [
                'data1' => $data1,
                'data2' => $data2,
                'data3' => $data3,
                'data4' => $data4,
                'date_range' => $date_range
            ]);
    }

    public function showMapDemo(Content $content)
    {
        return $content
            ->header('风振数据分布图')
            ->description('各省上传数据分布')
            ->breadcrumb(['text' => '分布图'])
            ->view('admin::custom.vibration-data-map-back', []);
    }

    public function importForm(Content $content)
    {
        return $content
            ->header('上传数据')
            ->description('批量上传数据')
            ->breadcrumb(
                ['text' => '风振数据', 'url' => route('admin.vibrationData.index')],
                ['text' => '批量上传']
            )->view('admin::custom.vibration-data-form', []);
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
}
