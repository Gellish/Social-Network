<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public function getRouteKeyName()
    {
        return 'name';
    }
}
