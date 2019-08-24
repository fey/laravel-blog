<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public $fillable = ['name', 'slug'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function __toString()
    {
        return $this->name;
    }
}
