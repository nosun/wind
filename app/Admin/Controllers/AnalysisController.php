<?php

namespace App\Admin\Controllers;

use App\Admin\Forms\Analysis;
use App\Models\VibrationData;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Encore\Admin\Form;

class AnalysisController
{
    public function showFrom(Content $content)
    {


        $fields = [
            'span' => [
                'label' => 'Span',
                'type' => 'int',
                'default' => 0
            ],

            'line_angle' => [
                'label' => 'Line Angle',
                'type' => 'float',
                'default' => 0
            ],

            'wind_direction' => [
                'label' => 'Wind Direction',
                'type' => 'float',
                'default' => 0
            ],

            'wind_speed' => [
                'label' => 'Wind Speed',
                'type' => 'float',
                'default' => 0
            ],

            'humidity' => [
                'label' => 'Humidity',
                'type' => 'float',
                'default' => 0
            ],

            'temperature' => [
                'label' => 'Temperature',
                'type' => 'float',
                'default' => 0
            ],


            'precipitation' => [
                'label' => 'Precipitation',
                'type' => 'float',
                'default' => 0
            ],

            'ice_thickness' => [
                'label' => 'Ice Thickness',
                'type' => 'float',
                'default' => 0
            ],

            'angle' => [
                'label' => 'Angle',
                'type' => 'float',
                'default' => 0
            ],

//            'number' => [
//                'label' => 'Number',
//                'type' => 'int',
//                'default' => 0
//            ],
//
//            'evid' => [
//                'label' => 'Evid',
//                'type' => 'int',
//                'default' => 0
//            ],
//
//            'province' => [
//                'label' => 'Province',
//                'type' => 'string',
//                'default' => ''
//            ],
//
//            'line_name' => [
//                'label' => 'Line Name',
//                'type' => 'string',
//                'default' => ''
//            ],
//
//            'clock' => [
//                'label' => 'Clock',
//                'type' => 'int',
//                'default' => 0
//            ],
//
//            'voltage' => [
//                'label' => 'Voltage',
//                'type' => 'int',
//                'default' => 0
//            ],
//
//            'gt_number' => [
//                'label' => 'GT Number',
//                'type' => 'int',
//                'default' => 0
//            ],
//
//            'voltage_type' => [
//                'label' => 'Voltage Type',
//                'type' => 'int',
//                'default' => 0
//            ],
//
//            'vertical_wind_speed' => [
//                'label' => 'Vertical Wind Speed',
//                'type' => 'float',
//                'default' => 0
//            ],
//
//            'podu' => [
//                'label' => '坡度',
//                'type' => 'int',
//                'default' => 0
//            ],
//
//            'pogao' => [
//                'label' => '坡高',
//                'type' => 'int',
//                'default' => 0
//            ],
//
//            'dimao' => [
//                'label' => '地貌',
//                'type' => 'int',
//                'default' => 0
//            ],
        ];
        return $content
            ->header('智能分析')
            ->view('admin::custom.wind-analysis-form', ['fields' => $fields]);
    }

    public function showForm(Content $content)
    {
        return $content
            ->title('智能分析')
            ->body(new Analysis());
    }

    public function getResult(Request $request)
    {
        dd($request);
    }
}

