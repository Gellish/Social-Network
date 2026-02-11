<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    protected $table = 'users_posts';
    protected $guarded = [];
    protected $per_post_number=1;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tags')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_posts')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id')->orderBy('created_at', 'ASC');
    }
}
