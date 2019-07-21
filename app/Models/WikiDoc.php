<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WikiDoc extends Model
{
    protected $fillable = ['category_id', 'title', 'path', 'type', 'size', 'ext',
        'weight','md5','author'];

    public function link(){
        return url($this->path);
    }
}
