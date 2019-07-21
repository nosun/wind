<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalysisChart extends Model
{
    public $table = 'analysis_charts';

    protected $fillable = ['category_1', 'category_2', 'category_3', 'category_4',
        'number', 'title', 'path', 'type', 'description', 'ext', 'md5'];
}
