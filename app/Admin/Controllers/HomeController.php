<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Content;

class HomeController extends Controller
{

    public function index(Content $content)
    {
        return redirect(route('admin.wikiCategory.show', ['id' => 1]));
    }

    public function nouse(Content $content)
    {
        return $content
            ->row(Dashboard::title())
            ->view('admin.custom.home', []);
    }
}
