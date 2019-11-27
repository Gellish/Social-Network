@extends('users.layouts.app')

@section('main-content')
    <!-- Main Content -->
    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    @if(isset($details))
                        <p> The Search results for your searching <b> {{ $query }} </b> are :</p>
                        <h2>User Profile</h2>
                        <br>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($details as $user)
                                <tr>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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