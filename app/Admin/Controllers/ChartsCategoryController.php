<?php

namespace App\Admin\Controllers;

use App\Models\AnalysisChart;
use App\Models\ChartsCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;

class ChartsCategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\ChartsCategory';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ChartsCategory);

        $grid->column('id', __('Id'));
        $grid->column('category_1', __('Category 1'));
        $grid->column('category_2', __('Category 2'));
        $grid->column('weight', __('Weight'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }


    public function show($id, Content $content)
    {
        $category = ChartsCategory::findOrFail($id);
        $name  = !empty($category->category_2) ? $category->category_2 : $category->category_1;

        return $content
            ->header('分析图表')
            ->description($name)
            ->breadcrumb(
                ['text' => '分析图表展示'],
                ['text' => $name]
            )
            ->body($this->myDetail($id));
    }

    public function myDetail($id){
        $category = ChartsCategory::findOrFail($id);

        $charts = AnalysisChart::query()
            ->where('category_id', $category->id)
            ->orderBy('weight','desc')
            ->orderBy('id','asc')
            ->get();
        $charts = $this->formatCharts($charts);

        return view('admin::custom.charts.category')
            ->with('category', $category)
            ->with('charts',$charts);
    }

    protected function formatCharts($charts){

        $data = [];

        foreach($charts as $chart){
            if($chart->category !== ''){
                $data[$chart->category][] = $chart;
            }else{
                $data['详情'][] = $chart;
            }
        }

        return $data;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ChartsCategory::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_1', __('Category 1'));
        $show->field('category_2', __('Category 2'));
        $show->field('weight', __('Weight'));
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
        $form = new Form(new ChartsCategory);

        $form->text('category_1', __('Category 1'));
        $form->text('category_2', __('Category 2'));
        $form->switch('weight', __('Weight'));

        return $form;
    }
}
