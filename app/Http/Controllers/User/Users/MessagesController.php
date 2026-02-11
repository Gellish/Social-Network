<?php

namespace App\Http\Controllers\User\Users;

use App\Events\MessageSent;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\message;
use App\Events\ChatMessage;
use Illuminate\Support\Facades\Auth;






class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('users.chat.index');
    }
    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return message::with('user')->get();
    }
    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {

        if(request()->has('file')){
            $filename = request('file')->store('chat');
            $message=message::create([
                'user_id' => request()->user()->id,
                'image' => $filename,
                'receiver_id' => request('receiver_id')
            ]);
        }else{
            $message = auth()->user()->messages()->create(['message' => $request->message]);

        }

        broadcast(new MessageSent(auth()->user(),$message->load('user')))->toOthers();

        return response(['status'=>'Message sent successfully','message'=>$message]);
    }

    public function chatPage()
    {
        $users = User::take(10)->get();
        return view('users.chat.index',['users'=> $users]);
    }


}
