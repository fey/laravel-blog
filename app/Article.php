<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest Author',
            'email' => 'guest@example.com',
            'password' => \Hash::make(12345)
        ]);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
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
                $article->slug = \Str::slug($article->name);
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
