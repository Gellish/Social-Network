<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/JNiNHZYPax0bk1mZWBDuZbvKfghk7OsZRJjsTrXO.png';

        return '/storage/' . $imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(user::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
