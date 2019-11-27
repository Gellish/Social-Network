<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;




class HomeController extends Controller
{
    public function index() {
        return view('admin.index');
    }
}
