<?php

namespace App\Http\Controllers\User\Users;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Model\user\users_post;


    class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        return view('users.chat.index');
    }

}


