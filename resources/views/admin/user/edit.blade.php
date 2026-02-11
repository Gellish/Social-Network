@extends('admin.layouts.app')

@section('main-content')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Users</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="../../dist/img/user4-128x128.jpg"
                                         alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $user->firstname }} {{ $user->lastname }}</h3>

                                <p class="text-muted text-center">Software Engineer</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Followers</b> <a class="float-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Following</b> <a class="float-right">543</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Friends</b> <a class="float-right">13,287</a>
                                    </li>
                                </ul>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">Malibu, California</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger">UI Design</span>
                                    <span class="tag tag-success">Coding</span>
                                    <span class="tag tag-info">Javascript</span>
                                    <span class="tag tag-warning">PHP</span>
                                    <span class="tag tag-primary">Node.js</span>
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane" id="activity">
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                                <span class="username">
                          <a href="#"></a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                                                <span class="description">Shared publicly - 7:30 PM today</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <div class="post clearfix">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                                <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                                                <span class="description">Sent you a message - 3 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>

                                            <form class="form-horizontal">
                                                <div class="input-group input-group-sm mb-0">
                                                    <input class="form-control form-control-sm" placeholder="Response">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-danger">Send</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                                <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                                                <span class="description">Posted 5 photos - 5 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                                                            <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                                                            <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.row -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-envelope bg-primary"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                                    <div class="timeline-body">
                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                        quora plaxo ideeli hulu weebly balihoo...
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-user bg-info"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                                    </h3>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-comments bg-warning"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                                    <div class="timeline-body">
                                                        Take me to your leader!
                                                        Switzerland is small and neutral!
                                                        We are more like Germany, ambitious and misunderstood!
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline time label -->
                                            <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-camera bg-purple"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                                    <div class="timeline-body">
                                                        <img src="http://placehold.it/150x100" alt="...">
                                                        <img src="http://placehold.it/150x100" alt="...">
                                                        <img src="http://placehold.it/150x100" alt="...">
                                                        <img src="http://placehold.it/150x100" alt="...">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="active tab-pane" id="settings">
                                        @include('admin.inc.messages')
                                        <form role="form" class="form-horizontal" action="{{ route('user.update',$user->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                            <div class="form-group row">
                                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                                            </div>
                                                            @if($user->username == '')
                                                                <input type="text" class="form-control" id="username" name="username" value="N/A" placeholder="username">
                                                            @else
                                                                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" placeholder="username">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="firstname" class="col-sm-2 col-form-label">Firstname</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                                            </div>
                                                            @if($user->firstname == '')
                                                                <input type="text" class="form-control" id="firsname" name="firstname" value="N/A" placeholder="firstname">
                                                            @else
                                                                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}" placeholder="firstname">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lastname" class="col-sm-2 col-form-label">Lastname</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                                            </div>
                                                            @if($user->lastname == '')
                                                                <input type="text" class="form-control" id="lastname" name="lastname" value="N/A" placeholder="lastname">
                                                            @else
                                                                <input type="text" class="form-control" id="firstname" name="lastname" value="{{ $user->lastname }}" placeholder="lastname">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                            </div>
                                                            @if($user->email == '')
                                                                <input type="email" class="form-control" id="email" name="email" value="N/A" placeholder="email">
                                                            @else
                                                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="email">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cellphone" class="col-sm-2 col-form-label">Cellphone</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                            </div>
                                                            @if($user->Cellphone == '')
                                                                <input type="text" class="form-control" id="cellphone" name="cellphone" value="N/A" placeholder="cellphone">
                                                            @else
                                                                <input type="text" class="form-control" id="cellphone" name="cellphone" value="{{ $user->cellphone }}" placeholder="cellphone">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                                                            </div>
                                                            @if($user->Address == '')
                                                                <input type="text" class="form-control" id="address" name="address" value="N/A" placeholder="address">
                                                            @else
                                                                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" placeholder="address">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                            </div>
                                                            @if($user->password == '')
                                                                <input type="text" class="form-control" id="password" name="address" value="N/A" placeholder="address">
                                                            @else
                                                                <input type="text" class="form-control" id="address" name="address" value="{{ $user->password }}" placeholder="password">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                                            </div>
                                                            <select name="gender" id="gender" class="form-control">
                                                                @if($user->gender == 'male' || 'Male')
                                                                    <option name="male" value="male">Male</option>
                                                                    <option name="female" value="female">Female</option>
                                                                @elseif($user->gender == 'female' || 'Female')
                                                                    <option name="male" value="male">Male</option>
                                                                    <option name="female" value="female">Female</option>
                                                                @else
                                                                    <option name="male" value="male">Male</option>
                                                                    <option name="female" value="female">Female</option>
                                                                    <option name="male" value="male">N/A</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="gender" class="col-sm-2 col-form-label">Role</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-users"></i></span>
                                                            </div>
                                                            <select name="gender" id="gender" class="form-control">
                                                                @if($user->gender == 'male' || 'Male')
                                                                    <option name="male" value="male">Male</option>
                                                                    <option name="female" value="female">Female</option>
                                                                @elseif($user->gender == 'female' || 'Female')
                                                                    <option name="male" value="male">Male</option>
                                                                    <option name="female" value="female">Female</option>
                                                                @else
                                                                    <option name="male" value="male">Male</option>
                                                                    <option name="female" value="female">Female</option>
                                                                    <option name="male" value="male">N/A</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="created_at" class="col-sm-2 col-form-label">Created_at</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $user->created_at }}"  placeholder="created_at" disabled>
                                                            <input type="datetime-local" class="form-control" id="created_at" name="created_at" value="{{ $user->created_at }}"  placeholder="created_at">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="updated_at" class="col-sm-2 col-form-label">Updated_at</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $user->updated_at }}"  placeholder="created_at" disabled>
                                                        <input type="datetime-local" class="form-control" id="created_at" name="created_at" value="{{ $user->updated_at }}"  placeholder="created_at">
                                                    </div>
                                                </div>
                                            </div>
                                            {{--<div class="form-group row">--}}
                                                {{--<label for="inputSkills" class="col-sm-2 col-form-label">Position Title</label>--}}
                                                {{--<div class="col-sm-10">--}}
                                                    {{--@if($user->password == '')--}}
                                                        {{--<input type="text" class="form-control" id="inputSkills" placeholder="Title">--}}
                                                    {{--@else--}}
                                                        {{--<input type="text" class="form-control" id="inputSkills" placeholder="Title">--}}
                                                    {{--@endif--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group row">--}}
                                                {{--<label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>--}}
                                                {{--<div class="col-sm-10">--}}
                                                    {{--<input type="text" class="form-control" id="inputSkills" placeholder="Skills">--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group row">--}}
                                                {{--<label for="inputSkills" class="col-sm-2 col-form-label">Talent</label>--}}
                                                {{--<div class="col-sm-10">--}}
                                                    {{--<input type="text" class="form-control" id="inputSkills" placeholder="Talent">--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group row">--}}
                                                {{--<label for="inputExperience" class="col-sm-2 col-form-label">About me</label>--}}
                                                {{--<div class="col-sm-10">--}}
                                                    {{--<textarea class="form-control" id="inputExperience" placeholder="About me"></textarea>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group row">--}}
                                                {{--<label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>--}}
                                                {{--<div class="col-sm-10">--}}
                                                    {{--<textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group row">--}}
                                                {{--<div class="offset-sm-2 col-sm-10">--}}
                                                    {{--<div class="checkbox">--}}
                                                        {{--<label>--}}
                                                            {{--<input type="checkbox"> I agree to the <a href="#">terms and conditions</a>--}}
                                                        {{--</label>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-edit"></i>
                                                            Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-wrapper -->
    </div>
@endsection

@section('footerSection')

@endsection