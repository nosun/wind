<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChartsCategory extends Model
{
    protected $table = 'charts_category';
    protected $fillable = ['category_1', 'category_2'];
}
