<div class="post-topbar">
    <div class="user-picy">
        @if(Auth::user()->image)
             <img style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" src="/storage/users/{{ Auth::user()->image }}" alt="">
        @else
             <img style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" src="https://ui-avatars.com/api/?name={{ Auth::user()->firstname }}+{{ Auth::user()->lastname }}&size=50&background=random" alt="">
        @endif
    </div>
    <div class="post-st">
        <ul>
            {{--<li><a class="post_project" href="#" title="">Post a Project</a></li>--}}
            <li><a class="post-jb active" href="#" title="">Post</a></li>
        </ul>
    </div><!--post-st end-->
</div><!--post-topbar end-->