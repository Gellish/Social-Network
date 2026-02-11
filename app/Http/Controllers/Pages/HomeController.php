<?php

namespace App\Http\Controllers\Pages;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::where('status',1)->paginate(2);
        return view('/pages/index',compact('posts'));
    }

    public function tag(tag $tag)
    {
        $posts = $tag->posts();
        return view('/pages/index',compact('posts'));
    }

    public function category(category $category)
    {
        $posts = $category->posts();
        return view('/pages/index',compact('posts'));
    }



}
