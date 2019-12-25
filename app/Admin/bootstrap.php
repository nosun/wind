<?php

use App\Admin\Extensions\Show\HtmlShow;

Encore\Admin\Form::forget(['map', 'editor']);

app('view')->prependNamespace('admin', resource_path('views/admin'));

Encore\Admin\Show::extend('html', HtmlShow::class);

use Encore\Admin\Facades\Admin;

Admin::navbar(function (\Encore\Admin\Widgets\Navbar $navbar) {

    $navbar->left(view('admin.top-title'));

});

Admin::css('/css/app.css');