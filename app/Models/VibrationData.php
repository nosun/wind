<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VibrationData extends Model
{
    protected $table = 'vibration_data';
    protected $guarded = [];

    public function getProvinces(){
        return $this->newQuery()->selectRaw("distinct(province)")->pluck('province')->toArray();
    }
}
