{{--<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">--}}
    {{--<div class="container-fluid">--}}
        {{--<a class="navbar-brand pl-5" href="{{ url('/') }}">--}}
            {{--{{ config('app.name', 'Aics') }}--}}
            {{--<div class="d-flex">--}}
                {{--<h1 class="w-100">Aics</h1>--}}
            {{--</div>--}}
        {{--</a>--}}
        {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}

        {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
            {{--<!-- Left Side Of Navbar -->--}}
            {{--<ul class="navbar-nav mr-auto pl-5">--}}
                {{--<li class="nav-item mr {{Request::is('/') ? 'active' : ''}}">--}}
                    {{--<a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item mr {{Request::is('blog') ? 'active' : ''}}">--}}
                    {{--<a class="nav-link" href="{{ url('blog') }}">{{ __('Blog') }}</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item     {{Request::is('event') ? 'active' : ''}}">--}}
                    {{--<a class="nav-link" href="{{ url('event') }}">{{ __('Event') }}</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item     {{Request::is('news') ? 'active' : ''}}">--}}
                    {{--<a class="nav-link" href="{{ url('news') }}">{{ __('News') }}</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item     {{Request::is('faculty') ? 'active' : ''}}">--}}
                    {{--<a class="nav-link" href="{{ url('faculty') }}">{{ __('faculty') }}</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item     {{Request::is('contact') ? 'active' : ''}}">--}}
                    {{--<a class="nav-link" href="{{ url('contact') }}">{{ __('contact') }}</a>--}}
                {{--</li>--}}
            {{--</ul>--}}

            {{--<!-- Right Side Of Navbar -->--}}
            {{--<ul class="navbar-nav ml-auto">--}}
                {{--<!-- Authentication Links -->--}}
                {{--@guest--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                {{--</li>--}}
                {{--@if (Route::has('register'))--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                    {{--</li>--}}
                {{--@endif--}}
                {{--@else--}}
                    {{--<li class="nav-item dropdown">--}}

                            {{--<a id="navbarDropdown" class="navbar-brand nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                                {{--<div><img src="/user/svg/gellish_logo.svg" class="rounded-circle img-thumbnail" style="height: 45px;"></div>--}}
                                {{--<div class="pl-2"> {{ Auth::user()->username }} <span class="caret"></span></div>--}}
                            {{--</a>--}}

                        {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}

                            {{--<a class="dropdown-item" href="{{ url('/profile/') }}">--}}
                                {{--{{ __('profile') }}--}}
                            {{--</a>--}}

                            {{--<a class="dropdown-item" href="">--}}
                                {{--{{ __('Settings') }}--}}
                            {{--</a>--}}

                            {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                               {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                {{--{{ __('Logout') }}--}}
                            {{--</a>--}}

                            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                {{--@csrf--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--@endguest--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}


<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="index.html" title=""><img src="images/logo.png" alt=""></a>
            </div><!--logo end-->
            <div class="search-bar">
                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit"><i class="la la-search"></i></button>
                </form>
            </div><!--search-bar end-->
            <nav>
                <ul>
                    <li>
                        <a href="{{ url('/') }}" title="">
                            <span><img src="images/icon1.png" alt=""></span>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/profile/'. Auth::user()->id )}}" title="">
                            <span><img src="images/icon5.png" alt=""></span>
                           Profile
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('chat') }}" title="" class="not-box-open">
                            <span><img src="images/icon6.png" alt=""></span>
                            Messages
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/article') }}" title="">
                            <span><img src="images/icon1.png" alt=""></span>
                           Article
                        </a>
                    </li>
                    <li>
                        {{--<a href="#" title="" class="not-box-open">--}}
                            {{--<span><img src="images/icon7.png" alt=""></span>--}}
                            {{--Notification--}}
                        {{--</a>--}}
                        <div class="notification-box">
                            <div class="nt-title">
                                <h4>Setting</h4>
                                <a href="#" title="">Clear all</a>
                            </div>
                            <div class="nott-list">
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="images/resources/ny-img1.png" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                        <span>2 min ago</span>
                                    </div><!--notification-info -->
                                </div>
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="images/resources/ny-img2.png" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                        <span>2 min ago</span>
                                    </div><!--notification-info -->
                                </div>
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="images/resources/ny-img3.png" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                        <span>2 min ago</span>
                                    </div><!--notification-info -->
                                </div>
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="images/resources/ny-img2.png" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                        <span>2 min ago</span>
                                    </div><!--notification-info -->
                                </div>
                                <div class="view-all-nots">
                                    <a href="#" title="">View All Notification</a>
                                </div>
                            </div><!--nott-list end-->
                        </div><!--notification-box end-->
                    </li>
                </ul>
            </nav><!--nav end-->
            <div class="menu-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div><!--menu-btn end-->
            <div class="user-account">
                <div class="user-info">
                    <img src="http://via.placeholder.com/30x30" alt="">
                    <a class="username" href="#" title="">{{ Auth::user()->username }}</a>
                    <i class="la la-sort-down"></i>
                </div>
                <div class="user-account-settingss">
                    <h3>Online Status</h3>
                    <ul class="on-off-status">
                        <li>
                            <div class="fgt-sec">
                                <input type="radio" name="cc" id="c5">
                                <label for="c5">
                                    <span></span>
                                </label>
                                <small>Online</small>
                            </div>
                        </li>
                        <li>
                            <div class="fgt-sec">
                                <input type="radio" name="cc" id="c6">
                                <label for="c6">
                                    <span></span>
                                </label>
                                <small>Offline</small>
                            </div>
                        </li>
                    </ul>
                    <h3>Custom Status</h3>
                    <div class="search_form">
                        <form>
                            <input type="text" name="search">
                            <button type="submit">Ok</button>
                        </form>
                    </div><!--search_form end-->
                    <h3>Setting</h3>
                    <ul class="us-links">
                        <li><a href="profile-account-setting.html" title="">Account Setting</a></li>
                        <li><a href="#" title="">Privacy</a></li>
                        <li><a href="#" title="">Faqs</a></li>
                        <li><a href="#" title="">Terms & Conditions</a></li>
                    </ul>
                    <h3 class="tc"><a href="{{ route('logout') }}" title="">Logout</a></h3>
                </div><!--user-account-settingss end-->
            </div>
        </div><!--header-data end-->
    </div>
</header><!--header end-->