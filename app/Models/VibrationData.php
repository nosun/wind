<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VibrationData extends Model
{
    protected $table = 'vibration_data';
    protected $fillable = ['number', 'evid', 'province', 'line_name', 'clock', 'voltage', 'gt_number',
        'voltage_type', 'span', 'line_angle', 'wind_direction', 'wind_speed', 'humidity', 'temperature',
        'precipitation', 'ice_thickness', 'angle', 'vertical_wind_speed', 'podu', 'pogao', 'dimao', 'wudong',
        'tiaozha', 'pohuai'
    ];
}
