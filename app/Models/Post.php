<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];


    public function tags()
    {
        return $this->belongsToMany('App\Models\tag','post_tags')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\category','category_posts')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
