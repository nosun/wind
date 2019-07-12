<?php

namespace App\Admin\Controllers;

use App\Models\VibrationData;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;

class VibrationDataController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '风振数据';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new VibrationData);

        $grid->column('span', __('Span'));
        $grid->column('line_angle', __('Line angle'));
        $grid->column('wind_direction', __('Wind direction'));
        $grid->column('wind_speed', __('Wind speed'));
        $grid->column('humidity', __('Humidity'));
        $grid->column('temperature', __('Temperature'));
        $grid->column('angle', __('Angle'));
        $grid->column('precipitation', __('Precipitation'));
        $grid->column('ice_thickness', __('Ice thickness'));
        $grid->column('wudong', __('Wudong'));

        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            $filter->column(1 / 2, function ($filter) {

                $filter->between('span', 'span');
                $filter->between('line_angle', 'Line Angle');
                $filter->between('wind_speed', 'Wind Speed');
                $filter->between('humidity', 'Humidity');
                $filter->between('temperature', 'Temperature');
                $filter->between('precipitation', 'Precipitation');
                $filter->between('ice_thickness', 'IceThickness');
                $filter->between('angle', 'Angle');

            });

            $filter->column(1 / 3, function ($filter) {
                $filter->like('province', '省份');
                $filter->like('line_name', 'Line Name');
                $filter->in('tianzha')->radio([
                    0 => 0,
                    1 => 1,
                ]);

                $filter->equal('pohuai')->select([
                    0 => 0,
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                ]);

                $filter->equal('wudong')->select(
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

//        $grid->column('number', __('Number'));
//        $grid->column('evid', __('Evid'));
//        $grid->column('province', __('Province'));
//        $grid->column('line_name', __('Line name'));
//        $grid->column('clock', __('Clock'));
//        $grid->column('voltage', __('Voltage'));
//        $grid->column('gt_number', __('Gt number'));
//        $grid->column('voltage_type', __('Voltage type'));
//        $grid->column('vertical_wind_speed', __('Vertical wind speed'));
//        $grid->column('podu', __('Podu'));
//        $grid->column('pogao', __('Pogao'));
//        $grid->column('dimao', __('Dimao'));
//        $grid->column('tiaoczha', __('Tiaoczha'));
//        $grid->column('pohuai', __('Pohuai'));
//        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));

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
        $show->field('line_angle', __('Line angle'));
        $show->field('wind_direction', __('Wind direction'));
        $show->field('wind_speed', __('Wind speed'));
        $show->field('humidity', __('Humidity'));
        $show->field('temperature', __('Temperature'));
        $show->field('precipitation', __('Precipitation'));
        $show->field('ice_thickness', __('Ice thickness'));
        $show->field('angle', __('Angle'));
        $show->field('vertical_wind_speed', __('Vertical wind speed'));
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
        $form->text('line_name', __('Line name'));
        $form->number('clock', __('Clock'));
        $form->number('voltage', __('Voltage'));
        $form->number('gt_number', __('Gt number'));
        $form->number('voltage_type', __('Voltage type'));
        $form->number('span', __('Span'));
        $form->decimal('line_angle', __('Line angle'));
        $form->decimal('wind_direction', __('Wind direction'));
        $form->decimal('wind_speed', __('Wind speed'));
        $form->text('humidity', __('Humidity'));
        $form->decimal('temperature', __('Temperature'));
        $form->decimal('precipitation', __('Precipitation'));
        $form->decimal('ice_thickness', __('Ice thickness'));
        $form->decimal('angle', __('Angle'));
        $form->decimal('vertical_wind_speed', __('Vertical wind speed'));
        $form->number('podu', __('Podu'));
        $form->number('pogao', __('Pogao'));
        $form->number('dimao', __('Dimao'));
        $form->number('wudong', __('Wudong'));
        $form->number('tiaoczha', __('Tiaoczha'));
        $form->number('pohuai', __('Pohuai'));

        return $form;
    }

    public function showMap(Content $content)
    {

        $data = VibrationData::query()->groupBy('province')
            ->selectRaw("province as name,count(id) as value")->get()->toJson();

        return $content
            ->header('风振数据分布图')
            ->description('各省上传数据分布')
            ->breadcrumb(
                ['text' => '风振数据', 'url' => route('admin.vibrationData.index')],
                ['text' => '分布图']
            )->view('admin::custom.vibration-data-map', ['data' => $data]);
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
}
