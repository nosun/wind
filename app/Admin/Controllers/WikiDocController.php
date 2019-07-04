<?php

namespace App\Admin\Controllers;

use App\Models\WikiDoc;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class WikiDocController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\WikiDoc';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WikiDoc);

        $grid->column('id', __('Id'));
        $grid->column('category_id', __('Category id'));
        $grid->column('title', __('Title'));
        $grid->column('path', __('Path'));
        $grid->column('type', __('Type'));
        $grid->column('size', __('Size'));
        $grid->column('ext', __('Ext'));
        $grid->column('weight', __('Weight'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(WikiDoc::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'));
        $show->field('title', __('Title'));
        $show->field('path', __('Path'));
        $show->field('type', __('Type'));
        $show->field('size', __('Size'));
        $show->field('ext', __('Ext'));
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
        $form = new Form(new WikiDoc);

        $form->number('category_id', __('Category id'));
        $form->text('title', __('Title'));
        $form->text('path', __('Path'));
        $form->text('type', __('Type'))->default('doc');
        $form->decimal('size', __('Size'))->default(0.00);
        $form->text('ext', __('Ext'));
        $form->switch('weight', __('Weight'));

        return $form;
    }
}
