<?php

namespace App\Http\Controllers\User\Users;

    use App\Models\User;
    use App\Models\UserInfo;
    use App\Models\UserPost;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use Intervention\Image\Facades\Image;




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
        $users = User::findOrFail($user->id);
        $users_info = UserInfo::where('user_id', $user->id)->get();
        // limit the post
        $users_viewed_profile = DB::table('users')
            ->orderBy('id',"DESC")
            ->paginate($this->per_post_number=5);
            //
        // $users_posts = DB::table('users_posts')
        //     ->orderBy('id',"DESC")
        //     ->paginate($this->per_post_number);

        $users_posts = UserPost::orderBy('id', 'DESC')
            ->with(['comments.user']) // Eager load comments and the user who commented
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
            'overview' => 'required',
        ]);
        $users_infos = new UserInfo;
        $users_infos->user_id = Auth::user()->id;
        $users_infos->overview = $request->overview;
        $users_infos->save();

        return redirect()->back();

    }

    public function updateOverview(Request $request)
    {
        $this->validate($request,[
            'overview' => 'required',
        ]);

        UserInfo::updateOrCreate(
            ['user_id' => Auth::user()->id],
            ['overview' => $request->overview]
        );

        return redirect()->back();
    }

    public function updateExperience(Request $request)
    {
        // For now, simpler implementation as single field, can be expanded to JSON or separate table later
        // Migration has 'experience' string column.
        UserInfo::updateOrCreate(
            ['user_id' => Auth::user()->id],
            ['experience' => $request->experience] // Assuming input name is experience or we map it
        );
        return redirect()->back();
    }

    public function updateEducation(Request $request)
    {
        UserInfo::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'School' => $request->school,
                'degree' => $request->degree,
                'from' => $request->from,
                'to' => $request->to,
                'education' => $request->description // specific textarea name mapping
            ]
        );
        return redirect()->back();
    }

    public function updateLocation(Request $request)
    {
        UserInfo::updateOrCreate(
            ['user_id' => Auth::user()->id],
            ['location' => $request->location] // Need to combine city/country or store as string
        );
        return redirect()->back();
    }

    public function updateSkills(Request $request)
    {
        UserInfo::updateOrCreate(
            ['user_id' => Auth::user()->id],
            ['skills' => $request->skills]
        );
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
        $users_posts = UserPost::with('tags','categories')->where('id',$id)->first();
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

        $users_posts = UserPost::find($id);
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
        UserInfo::where('id',$id)->delete();
        return redirect()->back();
    }

        public function profile_background_image(Request $request)
        {
            $this->validate($request, [
                'background_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//                'image'         => 'required|image',
            ]);

            $user_background = new User; // Should fetch auth user

            $user_background = Auth::user(); // Fix: Get current user

            if ($request->hasfile('background_image')) {
                $background_image = $request->file('background_image');
                $filename = time() . '.' . $background_image->getClientOriginalExtension();
                $location = public_path('/storage/images/') . $filename;

                Image::make($background_image)->save($location);

                $user_background->background_image = $filename;
            }

            $user_background->save();

            return redirect()->back();
        }



}
