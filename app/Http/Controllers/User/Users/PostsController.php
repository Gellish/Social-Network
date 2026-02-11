<?php

namespace App\Http\Controllers\User\Users;


    use App\Models\Profile\users_profiles;
    use App\Models\User;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Models\Users_post;
    use Illuminate\Database\Schema;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;




    class PostsController extends Controller
{
    protected $per_post_number=5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // limit the post
        $users_posts = DB::table('users_posts')
            ->orderBy('id',"DESC")
            ->paginate($this->per_post_number);;
        if ($request->ajax()) {
            return [
                'posts'=>view('users.ajax.users_post_section')->with(compact('users_posts'))->render(),
                'next_page' => $users_posts->nextPageUrl(),

                ];
        }


        // $users_posts = users_Post::all();
        return view('users.index',compact('users_posts'));
    }



    public function profile()
    {
        $users_profile = users_profiles::all();
        return view('users.profile.index',compact('users_profile'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users_posts = users_Post::all();

        return view('users.index',compact('users_posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'post_title' => 'required',
            'body' => 'required',
        ]);

        $users_posts = new users_post;
        $users_posts->user_id = Auth::user()->id;
        $users_posts->title = $request->post_title;
        $users_posts->body = $request->body;
        $users_posts->posted_by = Auth::user()->username;
        $users_posts->save();


        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users_posts = users_Post::with('tags','categories')->where('id',$id)->first();
        $tags = Tag::all();
        $categories = Category::all();
        return view('users.post.edit',compact('tags','categories','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'post_title' => 'required',
            'body' => 'required',
        ]);

//        $data = request()->validate([
//            'post_title' => 'required',
//            'body' => 'required',
//        ]);

        $users_posts = users_Post::find($id);
        $users_posts ->title = $request->post_title;
        $users_posts ->body = $request->body;
        $users_posts->save();

//        auth()->user()->users_post()->create([
//            'post_title' => $data['post_title'],
//            'body' => $data['body'],
//        ]);


        return redirect(route('post.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        users_Post::where('id',$id)->delete();
        return redirect()->back();
    }

    public function changeStatus(Request $request ,$id)
    {
        $post = Post::find($id);
        $post->status = $request->status;
        $post->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function AuthRouteAPI(Request $request){
        return $request->user();
    }

}


