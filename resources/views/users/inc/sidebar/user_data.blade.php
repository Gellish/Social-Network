<div class="user-data full-width">
    <div class="user-profile">
        <div class="username-dt">
            <div class="usr-pic">
                @if(Auth::user()->image)
                    <img src="/storage/users/{{ Auth::user()->image }}" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->firstname }}+{{ Auth::user()->lastname }}&size=100&background=random" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                @endif
            </div>
        </div><!--username-dt end-->
        <div class="user-specs">
            <h3>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h3>
            <span>Graphic Designer at Self Employed</span>
        </div>
    </div><!--user-profile end-->
    <ul class="user-fw-status">
        <li>
            <h4>Following</h4>
            <span>34</span>
        </li>
        <li>
            <h4>Followers</h4>
            <span>155</span>
        </li>
        <li>
            <a href="{{ url('/profile/'. Auth::user()->id )}}" title="">View Profile</a>
        </li>
    </ul>
</div>