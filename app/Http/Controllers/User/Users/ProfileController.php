<?php

namespace App\Http\Controllers\User\Users;

    use App\Model\user\user;
    use App\Model\user\users_infos;
    use App\Model\user\users_post;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;




    class ProfileController extends Controller
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

    public function index(Request $request ,User $user)
    {
        $users = user::findOrFail($user);
        $users_info = users_infos::all();
        // limit the post
        $users_viewed_profile = DB::table('users')
            ->orderBy('id',"DESC")
            ->paginate($this->per_post_number=5);
            //
        $users_posts = DB::table('users_posts')
            ->orderBy('id',"DESC")
            ->paginate($this->per_post_number);
        if ($request->ajax()) {
            return [
                'posts'=>view('users.ajax.users_post_section')->with(compact('users_posts'))->render(),
                'next_page' => $users_posts->nextPageUrl(),
            ];
        }

        return view('users.profile.index',compact('users_posts','users','users_info','users_viewed_profile'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users_posts = users_post::all();

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
            'overview' => 'required',
        ]);
        $users_infos = new users_infos;
        $users_infos->user_id = Auth::user()->id;
        $users_infos->overview = $request->overview;
        $users_infos->save();

        return redirect()->back();

//        $users_posts = new users_post;
//        $users_posts->title = $request->post_title;
//        $users_posts->body = $request->body;
//        $users_posts->posted_by = Auth::user()->username;
//        $users_posts->save();

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
        $users_posts = users_post::with('tags','categories')->where('id',$id)->first();
        $tags = tag::all();
        $categories = category::all();
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

        $users_posts = users_post::find($id);
        $users_posts ->title = $request->post_title;
        $users_posts ->body = $request->body;
        $users_posts->save();


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
        users_infos::where('id',$id)->delete();
        return redirect()->back();
    }

        public function profile_background_image(Request $request)
        {
            $this->validate($request, [
                'background_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//                'image'         => 'required|image',
            ]);

            $user_background = new user;

            $user_background->background_image = $request->background_image;

            if ($request->hasfile('background_image')) {
                $background_image = $request->file('background_image');
                $filename = time() . '.' . $background_image->getClientOriginalExtension();
                $location = public_path('/storage/images/') . $filename;

                Image::make($background_image)->save($location);

                $background_image->background_image = $filename;
            }

            $background_image->save();

            return redirect()->back();
        }



}
