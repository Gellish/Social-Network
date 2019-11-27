<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(user $user)
    {
        return auth()->user()->following()->toggle($user->profile);
    }
}
