<?php

namespace App\Admin\Controllers;

use App\Models\WikiCategory;
use App\Models\WikiDoc;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class WikiCategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '知识库';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new WikiCategory);

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('slug', __('Slug'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    public function show($id, Content $content)
    {
        $category = WikiCategory::findOrFail($id);

        return $content
            ->header('知识库')
            ->description($category->name)
            ->breadcrumb(
                ['text' => '知识库'],
                ['text' => $category->name]
            )
            ->body($this->myDetail($id));
    }

    public function myDetail($id){
        $category = WikiCategory::findOrFail($id);
        $docs = WikiDoc::query()->where('category_id',$id)->where('type','doc')
            ->orderBy('weight','desc')
            ->orderBy('id','desc')
            ->get();
        $videos = WikiDoc::query()->where('category_id',$id)->where('type','video')
            ->orderBy('weight','desc')
            ->orderBy('id','desc')
            ->get();

        $images = WikiDoc::query()->where('category_id',$id)->where('type','image')
            ->orderBy('weight','desc')
            ->orderBy('id','desc')
            ->get();

        return view('admin::custom.wiki.category')
            ->with('category', $category)
            ->with('docs',$docs)
            ->with('videos', $videos)
            ->with('images', $images);
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(WikiCategory::findOrFail($id));

        $show->panel()
            ->tools(function ($tools) {
                $tools->disableEdit();
                $tools->disableList();
                $tools->disableDelete();
            });

        $show->field('name', __('Name'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new WikiCategory);

        $form->text('name', __('Name'));
        $form->text('slug', __('Slug'));

        return $form;
    }
}
