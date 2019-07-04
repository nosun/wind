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
        $this->number('span', 'Span')->rules('required');
        $this->decimal('line_angle', 'Line Angle')->rules('required');
        $this->decimal('wind_direction', 'Wind Direction')->rules('required');
        $this->decimal('wind_speed', 'Wind Speed')->rules('required');
        $this->decimal('humidity', 'Humidity')->rules('required');
        $this->decimal('temperature', 'Temperature')->rules('required');
        $this->decimal('precipitation', 'Precipitation')->rules('required');
        $this->decimal('ice_thickness', 'Ice Thickness')->rules('required');
        $this->decimal('angle', 'Angle')->rules('required');
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'span' => 10
        ];
    }
}
