@extends('users.layouts.app')

@section('main-content')

        <section class="cover-sec">
            @if($users->background_image) 
                <img src="/storage/images/{{ $users->background_image }}" alt="" style="width: 100%; height: 400px; object-fit: cover;">
            @else
                <img src="https://placehold.co/1600x400?text=Cover+Image" alt="" style="width: 100%; height: 400px; object-fit: cover;">
            @endif
            @if(Auth::id() == $users->id)
                <a href="#" data-toggle="modal" data-target="#edit-background" title=""><i class="fa fa-camera"></i> Change Image</a>
            @endif
        </section>

        <div class="modal fade" id="edit-background" tabindex="-1" role="dialog" aria-labelledby="edit-post" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalCenterTitle">Change Background</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form  method="post" action="{{ route('profile.background.upload') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                            {{ csrf_field() }}
                            Select file : <input type='file' name='background_image' id='file' class='form-control' ></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <main>
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                          <div class="row">
                            <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                                <div class="main-left-sidebar">
                                    <div class="user_profile">
                                        <div class="user-pro-img">
                                            @if($users->image)
                                                <img src="/storage/users/{{ $users->image }}" alt="" style="width: 170px; height: 170px; object-fit: cover;">
                                            @else
                                                <img src="https://ui-avatars.com/api/?name={{ $users->firstname }}+{{ $users->lastname }}&size=170&background=random" alt="">
                                            @endif
                                            @if(Auth::id() == $users->id)
                                                <a href="#" title=""><i class="fa fa-camera"></i></a>
                                            @endif
                                        </div><!--user-pro-img end-->
                                        
                                        <div class="user_pro_status">
                                            @if(Auth::id() != $users->id)
                                                <ul class="flw-hr">
                                                    <li>
                                                        <form action="{{ url('follow/'.$users->id) }}" method="post" id="follow-form-{{$users->id}}">
                                                            {{ csrf_field() }}
                                                            <a href="#" onclick="document.getElementById('follow-form-{{$users->id}}').submit(); return false;" title="" class="flww">
                                                                <i class="la la-plus"></i> 
                                                                @if($users->profile && auth()->user()->following->contains($users->profile->id))
                                                                    Unfollow
                                                                @else
                                                                    Follow
                                                                @endif
                                                            </a>
                                                        </form>
                                                    </li>
                                                    <li><a href="#" title="" class="hre">Hire</a></li>
                                                </ul>
                                            @endif
                                            <ul class="flw-status">
                                                <li>
                                                    <span>Following</span>
                                                    <b>{{ $users->following->count() }}</b>
                                                </li>
                                                <li>
                                                    <span>Followers</span>
                                                    <b>{{ $users->profile ? $users->profile->followers->count() : 0 }}</b>
                                                </li>
                                            </ul>
                                        </div><!--user_pro_status end-->
                                        <ul class="social_links">
                                            <li><a href="#" title=""><i class="la la-globe"></i> www.example.com</a></li>
                                            <li><a href="#" title=""><i class="fa fa-facebook-square"></i> Http://www.facebook.com/john...</a></li>
                                            <li><a href="#" title=""><i class="fa fa-twitter"></i> Http://www.Twitter.com/john...</a></li>
                                            <li><a href="#" title=""><i class="fa fa-google-plus-square"></i> Http://www.googleplus.com/john...</a></li>
                                            <li><a href="#" title=""><i class="fa fa-behance-square"></i> Http://www.behance.com/john...</a></li>
                                            <li><a href="#" title=""><i class="fa fa-pinterest"></i> Http://www.pinterest.com/john...</a></li>
                                            <li><a href="#" title=""><i class="fa fa-instagram"></i> Http://www.instagram.com/john...</a></li>
                                            <li><a href="#" title=""><i class="fa fa-youtube"></i> Http://www.youtube.com/john...</a></li>
                                        </ul>
                                    </div><!--user_profile end-->
                                    <div class="suggestions full-width">
                                        <div class="sd-title">
                                            <h3>People Viewed Profile</h3>
                                            <i class="la la-ellipsis-v"></i>
                                        </div><!--sd-title end-->
                                        <div class="suggestions-list">
                                            @foreach($users_viewed_profile as $users_viewed_profiles)
                                            <div class="suggestion-usd">
                                                <img src="http://via.placeholder.com/35x35" alt="">
                                                <div class="sgt-text">
                                                    <h4>{{ $users_viewed_profiles->username }}</h4>
                                                    {{--<span>Graphic Designer</span>--}}
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                                @endforeach
                                        </div><!--suggestions-list end-->
                                    </div><!--suggestions end-->
                                </div><!--main-left-sidebar end-->
                            </div>
                            <div class="col-lg-6 col-md-8 no-pd">
                                <div class="main-ws-sec">
                                    <div class="user-tab-sec">
                                        <h3>{{ $users->firstname }} {{ $users->lastname }}</h3>
                                        <div class="star-descp">
                                            <span>Graphic Designer at Self Employed</span>
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                            </ul>
                                            <a href="#" title="">Status</a>
                                        </div><!--star-descp end-->
                                        <div class="tab-feed st2">
                                            <ul>
                                                <li data-tab="feed-dd" class="active">
                                                    <a href="#" title="">
                                                        <img src="images/ic1.png" alt="">
                                                        <span>Feed</span>
                                                    </a>
                                                </li>
                                                <li data-tab="info-dd">
                                                    <a href="#" title="">
                                                        <img src="images/ic2.png" alt="">
                                                        <span>Info</span>
                                                    </a>
                                                </li>
                                                <li data-tab="saved-jobs">
                                                    <a href="#" title="">
                                                        <img src="images/ic4.png" alt="">
                                                        <span>Saved Jobs</span>
                                                    </a>
                                                </li>
                                                <li data-tab="my-bids">
                                                    <a href="#" title="">
                                                        <img src="images/ic5.png" alt="">
                                                        <span>My Bids</span>
                                                    </a>
                                                </li>
                                                <li data-tab="portfolio-dd">
                                                    <a href="#" title="">
                                                        <img src="images/ic3.png" alt="">
                                                        <span>Portfolio</span>
                                                    </a>
                                                </li>
                                                <li data-tab="payment-dd">
                                                    <a href="#" title="">
                                                        <img src="images/ic6.png" alt="">
                                                        <span>Payment</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!-- tab-feed end-->
                                    </div><!--user-tab-sec end-->
                                    <div class="product-feed-tab current" id="feed-dd">
                                        <div class="posts-section posts endless-pagination" data-next-page="{{$users_posts->nextPageUrl()}}">
                                            @foreach($users_posts as $users_post)
                                                <div class="post-bar">
                                                    <div class="post_topbar">
                                                        <div class="usy-dt">
                                                            <img src="http://via.placeholder.com/50x50" alt="">
                                                            <div class="usy-name">
                                                                <h3>
                                                                    @if($users_post->posted_by == "")
                                                                        N/A
                                                                    @else
                                                                        {{ $users_post->posted_by }}
                                                                    @endif
                                                                </h3>
                                                                {{--<span><img src="images/clock.png" alt="">{{ $users_post->created_at->diffForHumans() }}</span>--}}
                                                            </div>
                                                        </div>
                                                        <div class="ed-opts">
                                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                            <ul class="ed-options">
                                                                <li><a href="#" title="">Edit Post</a></li>
                                                                <li><a href="#" title="">saved</a></li>
                                                                <li><a href="#" title="">Close</a></li>
                                                                <li><a href="#" title="">Hide</a></li>
                                                                <li>
                                                                    <form id="delete-form-{{$users_post->id }}" action="{{ route('profile.destroy',$users_post->id) }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                    </form>
                                                                    <a href=""
                                                                    onclick="if(confirm('Are your sure, You Want to Delete this '))
                                                                    {
                                                                    event.preventDefault();document.getElementById('delete-form-{{$users_post->id }}').submit();
                                                                    }
                                                                    else {
                                                                    event.preventDefault();
                                                                    }">
                                                                    Delete
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="job_descp">
                                                        <h3>{{ $users_post->title }}</h3>
                                                        <p>
                                                            {{ $users_post->body }}
                                                            <br>
                                                            <a href="#" title="">view more</a>
                                                        </p>
                                                    </div>
                                                    <div class="job-status-bar">
                                                        <ul class="like-com">
                                                            <li>
                                                                <a href="#"><i class="fa fa-heart"></i> Like</a>
                                                                 <img src="images/liked-img.png" alt="" style="display:none;">
                                                                <span>
                                                        @if($users_post->like == "")
                                                                        0
                                                                    @else
                                                                        {{ $users_post->like }}
                                                                    @endif
                                                   </span>
                                                            </li>
                                                            <li><a href="#" title="" class="com" onclick="$('#comment-section-{{$users_post->id}}').slideToggle(); return false;"><i class="fa fa-comment"></i> Comment {{ $users_post->comments->count() }}</a></li>
                                                        </ul>
                                                        <a><i class="la la-eye"></i>Views 50</a>
                                                    </div>
                                                    
                                                    <!-- Comment Section -->
                                                    <div class="comment-section" id="comment-section-{{$users_post->id}}" style="display: none; padding: 20px;">
                                                        <div class="comment-sec">
                                                            <ul>
                                                                @foreach($users_post->comments as $comment)
                                                                <li>
                                                                    <div class="comment-list">
                                                                        <div class="bg-img">
                                                                            @if($comment->user->image)
                                                                                <img src="/storage/users/{{ $comment->user->image }}" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                                                            @else
                                                                                <img src="https://ui-avatars.com/api/?name={{ $comment->user->firstname }}+{{ $comment->user->lastname }}&size=40&background=random" alt="">
                                                                            @endif
                                                                        </div>
                                                                        <div class="comment">
                                                                            <h3>{{ $comment->user->firstname }} {{ $comment->user->lastname }}</h3>
                                                                            <span><img src="images/clock.png" alt=""> {{ $comment->created_at->diffForHumans() }}</span>
                                                                            <p>{{ $comment->body }}</p>
                                                                        </div>
                                                                    </div><!--comment-list end-->
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="post-comment">
                                                            <div class="cm_img">
                                                                @if(Auth::user()->image)
                                                                    <img src="/storage/users/{{ Auth::user()->image }}" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                                                @else
                                                                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->firstname }}+{{ Auth::user()->lastname }}&size=40&background=random" alt="">
                                                                @endif
                                                            </div>
                                                            <div class="comment_box">
                                                                <form action="{{ route('comment.store') }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="post_id" value="{{ $users_post->id }}">
                                                                    <input type="text" name="comment" placeholder="Post a comment">
                                                                    <button type="submit">Send</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <style>
                                                        .comment-section {
                                                            padding: 15px;
                                                            background-color: #fceceb; /* Light reddish background to match theme */
                                                            border-top: 1px solid #e5e5e5;
                                                        }
                                                        .comment-sec ul li {
                                                            margin-bottom: 5px; /* Reduced margin */
                                                            padding-bottom: 5px; /* Reduced padding */
                                                            border-bottom: 1px solid #e5e5e5;
                                                        }
                                                        .comment-sec ul li:last-child {
                                                            border-bottom: 0;
                                                            margin-bottom: 0;
                                                        }
                                                        .comment-list {
                                                            display: flex; /* Use flexbox for layout */
                                                            align-items: flex-start; /* Align items to top */
                                                            width: 100%;
                                                        }
                                                        .bg-img {
                                                            width: 40px;
                                                            margin-right: 15px; /* Space between avatar and text */
                                                        }
                                                        .bg-img img {
                                                            width: 100%; /* Ensure image fills container */
                                                            border-radius: 50%;
                                                        }
                                                        .comment {
                                                            flex: 1; /* Take remaining width */
                                                        }
                                                        .comment h3 {
                                                            font-size: 14px;
                                                            font-weight: 600;
                                                            color: #000;
                                                            margin-bottom: 2px; /* Tighten spacing */
                                                        }
                                                        .comment span {
                                                            font-size: 12px;
                                                            color: #888;
                                                            display: block;
                                                            margin-bottom: 5px;
                                                        }
                                                        .comment p {
                                                            font-size: 13px;
                                                            color: #444;
                                                            line-height: title;
                                                        }
                                                    </style>

                                                </div>
                                            @endforeach
                                            {{--{!! $users_posts->render() !!}--}}
                                            <div class="process-comm">
                                                <div class="spinner">
                                                    <div class="bounce1"></div>
                                                    <div class="bounce2"></div>
                                                    <div class="bounce3"></div>
                                                </div>
                                            </div><!--process-comm end-->
                                        </div><!--posts-section end-->
                                    </div><!--product-feed-tab end-->
                                    <div class="product-feed-tab" id="info-dd">
                                        @foreach($users_info as $users_infos)
                                        <div class="user-profile-ov">
                                            <h3>
                                                <a href="#" title="" class="overview-open">Overview</a>
                                                @if(Auth::id() == $users->id)
                                                <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a>
                                                @endif
                                            </h3>
                                            <p>{{ $users_infos->overview }}</p>
                                        </div><!--user-profile-ov end-->
                                        <div class="user-profile-ov st2">
                                            <h3><a href="#" title="" class="exp-bx-open">Experience </a>
                                                @if(Auth::id() == $users->id)
                                                <a href="#" title="" class="exp-bx-open"><i class="fa fa-pencil"></i></a> <a href="#" title="" class="exp-bx-open"><i class="fa fa-plus-square"></i></a>
                                                @endif
                                            </h3>
                                            <h4>{{ $users_infos->positions }}
                                                @if(Auth::id() == $users->id)
                                                <a href="#" title=""><i class="fa fa-pencil"></i></a>
                                                @endif
                                            </h4>
                                        </div><!--user-profile-ov end-->
                                        <div class="user-profile-ov">
                                            <h3><a href="#" title="" class="ed-box-open">Education</a> 
                                                @if(Auth::id() == $users->id)
                                                <a href="#" title="" class="ed-box-open"><i class="fa fa-pencil"></i></a> <a href="#" title=""><i class="fa fa-plus-square"></i></a>
                                                @endif
                                            </h3>
                                            <h4>{{ $users_infos->degree }}</h4>
                                            <span>{{ $users_infos->from }}-{{ $users_infos->to }}</span>
                                            <p>{{ $users_infos->education }} </p>
                                        </div><!--user-profile-ov end-->
                                        <div class="user-profile-ov">
                                            <h3><a href="#" title="" class="lct-box-open">Location</a> 
                                                @if(Auth::id() == $users->id)
                                                <a href="#" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a> <a href="#" title=""><i class="fa fa-plus-square"></i></a>
                                                @endif
                                            </h3>
                                            {{ $users_infos->location }}
                                        </div><!--user-profile-ov end-->
                                        <div class="user-profile-ov">
                                            <h3><a href="#" title="" class="skills-open">Skills</a> 
                                                @if(Auth::id() == $users->id)
                                                <a href="#" title="" class="skills-open"><i class="fa fa-pencil"></i></a> <a href="#"><i class="fa fa-plus-square"></i></a>
                                                @endif
                                            </h3>
                                            <ul>
                                                <li><a href="#" title="">{{ $users_infos->skils }}></a></li>
                                            </ul>
                                        </div><!--user-profile-ov end-->
                                        @endforeach
                                    </div><!--product-feed-tab end-->
                                    <div class="product-feed-tab" id="saved-jobs">
                                        <div class="posts-section">
                                            <div class="post-bar">
                                                <div class="job_descp">
                                                    <h3>No Saved Jobs</h3>
                                                    <p>You have not saved any jobs yet.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--product-feed-tab end-->
                                    <div class="product-feed-tab" id="my-bids">
                                        <div class="posts-section">
                                             <div class="post-bar">
                                                <div class="job_descp">
                                                    <h3>No Bids</h3>
                                                    <p>You have not placed any bids yet.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--product-feed-tab end-->
                                    <div class="product-feed-tab" id="portfolio-dd">
                                        <div class="portfolio-gallery-sec">
                                            <h3>Portfolio</h3>
                                            <div class="gallery_pf">
                                                <div class="row">
                                                    @for ($i = 1; $i <= 6; $i++)
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                        <div class="gallery_pt">
                                                            <img src="https://placehold.co/170x170?text={{ $i }}" alt="">
                                                            <a href="#" title=""><img src="images/all-out.png" alt=""></a>
                                                        </div><!--gallery_pt end-->
                                                    </div>
                                                    @endfor
                                                </div>
                                            </div><!--gallery_pf end-->
                                        </div><!--portfolio-gallery-sec end-->
                                    </div><!--product-feed-tab end-->
                                    <div class="product-feed-tab" id="payment-dd">
                                         <!-- Payment Content (Simplified) -->
                                    </div><!--product-feed-tab end-->
                                </div><!--main-ws-sec end-->
                            </div>
                            <!-- Right Sidebar -->
                            <div class="col-lg-3 pd-right-none no-pd">
                                <div class="right-sidebar">
                                    <div class="message-btn">
                                        <a href="{{ url('chat') }}?user_id={{ $users->id }}" title=""><i class="fa fa-envelope"></i> Message</a>
                                    </div>
                                    <div class="widget widget-portfolio">
                                        <div class="wd-heady">
                                            <h3>Portfolio</h3>
                                            <img src="images/photo-icon.png" alt="">
                                        </div>
                                        <div class="pf-gallery">
                                            <ul>
                                                <li><a href="#" title=""><img src="https://placehold.co/70x70?text=1" alt=""></a></li>
                                                <li><a href="#" title=""><img src="https://placehold.co/70x70?text=2" alt=""></a></li>
                                                <li><a href="#" title=""><img src="https://placehold.co/70x70?text=3" alt=""></a></li>
                                                <li><a href="#" title=""><img src="https://placehold.co/70x70?text=4" alt=""></a></li>
                                                <li><a href="#" title=""><img src="https://placehold.co/70x70?text=5" alt=""></a></li>
                                                <li><a href="#" title=""><img src="https://placehold.co/70x70?text=6" alt=""></a></li>
                                                <li><a href="#" title=""><img src="https://placehold.co/70x70?text=7" alt=""></a></li>
                                                <li><a href="#" title=""><img src="https://placehold.co/70x70?text=8" alt=""></a></li>
                                                <li><a href="#" title=""><img src="https://placehold.co/70x70?text=9" alt=""></a></li>
                                                <li><a href="#" title=""><img src="https://placehold.co/70x70?text=10" alt=""></a></li>
                                                <li><a href="#" title=""><img src="https://placehold.co/70x70?text=11" alt=""></a></li>
                                                <li><a href="#" title=""><img src="https://placehold.co/70x70?text=12" alt=""></a></li>
                                            </ul>
                                        </div><!--pf-gallery end-->
                                    </div><!--widget-portfolio end-->
                                </div><!--right-sidebar end-->
                            </div>
                        </div>
                    </div><!-- main-section-data end-->
                </div> 
            </div>
        </main>

        <footer>
            <div class="footy-sec mn no-margin">
                <div class="container">
                    <ul>
                        <li><a href="#" title="">Help Center</a></li>
                        <li><a href="#" title="">Privacy Policy</a></li>
                        <li><a href="#" title="">Community Guidelines</a></li>
                        <li><a href="#" title="">Cookies Policy</a></li>
                        <li><a href="#" title="">Career</a></li>
                        <li><a href="#" title="">Forum</a></li>
                        <li><a href="#" title="">Language</a></li>
                        <li><a href="#" title="">Copyright Policy</a></li>
                    </ul>
                    <p><img src="images/copy-icon2.png" alt="">Copyright 2018</p>
                    <img class="fl-rgt" src="images/logo2.png" alt="">
                </div>
            </div>
        </footer><!--footer end-->

        <div class="overview-box" id="overview-box">
            <div class="overview-edit">
                <h3>Overview</h3>
                <span>5000 character left</span>
                <form role="form"  method="post" action="{{ route('profile.overview') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <textarea name="overview">

                </textarea>
                        <button type="submit" class="save">save</button>
                        <button type="submit" class="cancel">Cancel</button>
                </form>


                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div><!--overview-edit end-->
        </div><!--overview-box end-->

        <div class="overview-box" id="experience-box">
            <div class="overview-edit">
                <h3>Experience</h3>
                <form method="post" action="{{ route('profile.experience') }}">
                    {{ csrf_field() }}
                    <input type="text" name="subject" placeholder="Subject">
                    <textarea name="experience"></textarea>
                    <button type="submit" class="save">Save</button>
                    <button type="submit" class="save-add">Save & Add More</button>
                    <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div><!--overview-edit end-->
        </div><!--overview-box end-->
        <div class="overview-box" id="education-box">
            <div class="overview-edit">
                <h3>Education</h3>
                <form method="post" action="{{ route('profile.education') }}">
                    {{ csrf_field() }}
                    <input type="text" name="school" placeholder="School / University">
                    <div class="datepicky">
                        <div class="row">
                            <div class="col-lg-6 no-left-pd">
                                <div class="datefm">
                                    <input type="text" name="from" placeholder="From" class="datepicker">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                            <div class="col-lg-6 no-righ-pd">
                                <div class="datefm">
                                    <input type="text" name="to" placeholder="To" class="datepicker">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="degree" placeholder="Degree">
                    <textarea name="description" placeholder="Description"></textarea>
                    <button type="submit" class="save">Save</button>
                    <button type="submit" class="save-add">Save & Add More</button>
                    <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div><!--overview-edit end-->
        </div><!--overview-box end-->
        <div class="overview-box" id="location-box">
            <div class="overview-edit">
                <h3>Location</h3>
                <form method="post" action="{{ route('profile.location') }}">
                    {{ csrf_field() }}
                    <div class="datefm">
                        <select>
                            <option>Country</option>
                            <option value="pakistan">Pakistan</option>
                            <option value="england">England</option>
                            <option value="india">India</option>
                            <option value="usa">United Sates</option>
                        </select>
                        <i class="fa fa-globe"></i>
                    </div>
                    <div class="datefm">
                        <input type="text" name="location" placeholder="City, Country">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <button type="submit" class="save">Save</button>
                    <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div><!--overview-edit end-->
        </div><!--overview-box end-->
        <div class="overview-box" id="skills-box">
            <div class="overview-edit">
                <h3>Skills</h3>
                <ul>
                    <li><a href="#" title="" class="skl-name">HTML</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
                    <li><a href="#" title="" class="skl-name">php</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
                    <li><a href="#" title="" class="skl-name">css</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
                </ul>
                <form method="post" action="{{ route('profile.skills') }}">
                    {{ csrf_field() }}
                    <input type="text" name="skills" placeholder="Skills (comma separated)">
                    <button type="submit" class="save">Save</button>
                    <button type="submit" class="save-add">Save & Add More</button>
                    <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div><!--overview-edit end-->
        </div><!--overview-box end-->
        <div class="overview-box" id="create-portfolio">
            <div class="overview-edit">
                <h3>Create Portfolio</h3>
                <form>
                    <input type="text" name="pf-name" placeholder="Portfolio Name">
                    <div class="file-submit">
                        <input type="file" name="file">
                    </div>
                    <div class="pf-img">
                        <img src="http://via.placeholder.com/60x60" alt="">
                    </div>
                    <input type="text" name="website-url" placeholder="htp://www.example.com">
                    <button type="submit" class="save">Save</button>
                    <button type="submit" class="cancel">Cancel</button>
                </form>
                <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
            </div><!--overview-edit end-->
        </div><!--overview-box end-->

    </div><!--theme-layout end-->
@endsection
@section('footerSection')
    <script type="text/javascript">
        $(document).ready(function () {

//           $('body').on('click', '.pagination a', function(e){
//
//               e.preventDefault();
//               var url = $(this).attr('href');
//
//               $.get(url, function(data){
//                   $('.posts-section').html(data);
//               });
//
//           });

            $('.process-comm').hide();

            // $(window).scroll(fetchPost()); // This can cause issues if fetchPost is not defined or infinite loop



            function fetchPost() {
                var page=$('.endless-pagination').data('next-page');
                if(page!==null) {
                    $('.process-comm').show();
                    clearTimeout($.data(this,'scrollCheck'));
                    $.data(this,"scrollCheck",setTimeout(function () {
                        var scroll_position_for_post_load=$(window).height() + $(window).scrollTop()+100;
                        if(scroll_position_for_post_load>=$(document).height()) {
                            $.get(page,function (data) {
                                $('.posts').append(data.posts);
                                $('.endless-pagination').data('next-page',data.next_page);
                            });
                            $('.process-comm').hide();
                        }
                    },350))
                }else {
                    $('.process-comm').hide();
                }

            }
        })
    </script>
@endsection
