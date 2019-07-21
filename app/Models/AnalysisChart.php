<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalysisChart extends Model
{
    public $table = 'analysis_charts';

    protected $fillable = ['category_id', 'category', 'title', 'path', 'description', 'md5'];
}
