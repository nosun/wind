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
        $this->number('span', 'Span')->default(344)
            ->rules('required');
        $this->decimal('line_angle', 'Line Angle')->default(292.6)
            ->rules('required');
        $this->decimal('wind_direction', 'Wind Direction')->default(26.58)
            ->rules('required');
        $this->decimal('wind_speed', 'Wind Speed')->default(4.54)
            ->rules('required');
        $this->decimal('humidity', 'Humidity')->default(87.55)
            ->rules('required');
        $this->decimal('temperature', 'Temperature')->default(-2.47)
            ->rules('required');
        $this->decimal('precipitation', 'Precipitation')->default(0.01)
            ->rules('required');
        $this->decimal('ice_thickness', 'Ice Thickness')->default(0.012944)
            ->rules('required');
        $this->decimal('angle', 'Angle')->default(86.02)
            ->rules('required');
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
