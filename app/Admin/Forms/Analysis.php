<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class Analysis extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '分析参数';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        dump($request->all());

        admin_success('Processed successfully.');

        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->decimal('span', __('Span'))->default(344)
            ->rules('required');
        $this->decimal('line_angle', __('Line Angle'))->default(292.6)
            ->rules('required');
        $this->decimal('wind_speed', __('Wind Speed'))->default(26.58)
            ->rules('required');
        $this->decimal('wind_direction', __('Wind Direction'))->default(4.54)
            ->rules('required');
        $this->decimal('humidity', __('Humidity'))->default(87.55)
            ->rules('required');
        $this->decimal('temperature', __('Temperature'))->default(-2.47)
            ->rules('required');
        $this->decimal('precipitation', __('Precipitation'))->default(0.01)
            ->rules('required');
        $this->decimal('ice_thickness', __('Ice Thickness'))->default(0.012944)
            ->rules('required');
        $this->decimal('angle', __('Angle'))->default(86.02)
            ->rules('required');
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [];
    }
}
