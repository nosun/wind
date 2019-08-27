<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WikiCategory extends Model
{
    public $table = 'wiki_categories';
    protected $fillable = ['definition', 'theory', 'name', 'slug'];
    protected $guarded = [];

    public function docs()
    {
        return $this->hasMany(WikiDoc::class, 'category_id', 'id');
    }
}
