<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    public $fillable = ['name', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest Author',
            'email' => 'guest@example.com',
            'password' => \Hash::make(12345)
        ]);
    }
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault([
            'name' => 'Uncategorized'
        ]);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($article) {
            if (empty($article->slug)) {
                $article->slug = \Str::slug(\Str::words($article->name, 5));
            }
            if (empty($article->category_id)) {
                $article->category_id = 0;
            }
            if (empty($article->user_id)) {
                $article->user_id = 0;
            }
        });
    }
}
