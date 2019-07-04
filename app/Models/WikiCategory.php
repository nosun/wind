<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WikiCategory extends Model
{
    public $table = 'wiki_categories';
    protected $fillable = ['name','slug'];

    public function docs(){
        return $this->hasMany(WikiDoc::class,'category_id','id');
    }
}
