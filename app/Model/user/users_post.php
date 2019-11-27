<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class users_post extends Model
{
    protected $guarded = [];
    protected $per_post_number=1;

    public function users_post()
    {
        return $this->belongsToMany(user::class,'users_posts','user_id');
    }

//    public function tags()
//    {
//        return $this->belongsToMany('App\Model\user\tag','post_tags')->withTimestamps();
//    }
//
//    public function categories()
//    {
//        return $this->belongsToMany('App\Model\user\category','category_posts')->withTimestamps();
//    }
//
//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }
//
//    public function user()
//    {
//        return $this->belongsTo(user::class);
//    }
}
