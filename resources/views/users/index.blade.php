@extends('users.layouts.app')

@section('main-content')
    <!-- Main Content -->
    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    @if(isset($details))

                        <br>
                        <br>
                            <div class="companies-list">
                                <div class="row">
                                    @foreach($details as $user)
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="company_profile_info">
                                                <div class="company-up-info">
                                                    @if($user->image)
                                                        <img src="/storage/users/{{ $user->image }}" alt="" style="width: 90px; height: 90px; object-fit: cover; border-radius: 50%;">
                                                    @else
                                                        <img src="https://ui-avatars.com/api/?name={{ $user->firstname }}+{{ $user->lastname }}&size=90&background=random" alt="">
                                                    @endif
                                                    <h3>{{ $user->firstname }} {{ $user->lastname }}</h3>
                                                    <h4>{{ $user->username }}</h4>
                                                    <ul>
                                                        <li><a href="#" title="" class="follow">Follow</a></li>
                                                        <li><a href="{{ url('/profile/'.$user->id) }}" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
                                                    </ul>
                                                </div>
                                                <a href="{{ url('/profile/'.$user->id) }}" title="" class="view-more-pro">View Profile</a>
                                            </div><!--company_profile_info end-->
                                        </div>
                                    @endforeach
                                </div>
                            </div><!--companies-list end-->
                     @elseif(isset($message))
                        <p>{{ $message }}</p>
                     @else
                        <div class="row">
                            <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                                <div class="main-left-sidebar no-margin">
                                    @include('users.inc.sidebar.user_data')
                                    @include('users.inc.sidebar.suggestions_sidebar')
                                    @include('users.inc.sidebar.tags_sections')
                                </div>
                            </div>
                                @include('users.inc.posts-content.post_main')
                                @include('users.inc.sidebar.rightsidebar')
                     @endif
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>

    @include('users.inc.posts_popup.post-popup')<!--post-project-popup -->

    @include('users.inc.chat.chatbox')

@endsection