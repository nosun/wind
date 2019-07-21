<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->any('/', 'HomeController@index')->name('admin.home');
    $router->resource('wiki', 'WikiDocController')->names('admin.wiki');
    $router->resource('wikicategory', 'WikiCategoryController')->names('admin.wikiCategory');
    $router->resource('vibrationData', 'VibrationDataController')->names('admin.vibrationData');
    $router->resource('chartsCategory', 'ChartsCategoryController')->names('admin.chartsCategory');
    $router->get('importData','VibrationDataController@importForm')->name('admin.vibrationData.importForm');
//    $router->post('importData','VibrationDataController@import')->name('admin.vibrationData.import');
    $router->get('dataMap','VibrationDataController@showMap')->name('admin.vibrationData.showMap');
    $router->get('smartAnalysis','AnalysisController@showForm')->name('admin.analysis.form');
    $router->post('smartAnalysis','AnalysisController@getResult')->name('admin.handle-form');

});
