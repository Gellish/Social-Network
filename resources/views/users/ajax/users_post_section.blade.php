@foreach($users_posts as $key=> $users_post)
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
                        {{--<form id="delete-form-{{$users_post->id }}" action="{{ route('users.destroy',$users_post->id) }}" method="post">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--{{ method_field('DELETE') }}--}}
                        {{--</form>--}}
                        {{--<a href=""--}}
                        {{--onclick="if(confirm('Are your sure, You Want to Delete this '))--}}
                        {{--{--}}
                        {{--event.preventDefault();document.getElementById('delete-form-{{$users_post->id }}').submit();--}}
                        {{--}--}}
                        {{--else {--}}
                        {{--event.preventDefault();--}}
                        {{--}">--}}
                        {{--Delete--}}
                        {{--</a>--}}
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
                    <a href="#"><i class="la la-heart"></i> Like</a>
                    <img src="images/liked-img.png" alt="">
                    <span>
                          @if($users_post->like == "")
                            0
                        @else
                            {{ $users_post->like }}
                        @endif
                    </span>
                </li>
                <li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
            </ul>
            <a><i class="la la-eye"></i>Views 50</a>
        </div>
    </div>
@endforeach