<div class="user-data full-width">
    <div class="user-profile">
        <div class="username-dt">
            <div class="usr-pic">
                <img src="http://via.placeholder.com/100x100" alt="">
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