<div class="posts-section posts endless-pagination" data-next-page="{{$users_posts->nextPageUrl()}}">
    @foreach($users_posts as $key=> $users_post)
        {{--//Modal edit-post--}}
        <div class="modal fade" id="edit-post" tabindex="-1" role="dialog" aria-labelledby="edit-post" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalCenterTitle">Posts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="update-form-{{$users_post->id }}" action="{{ url('/',$users_post->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label for="post_title" class="col-form-label">Title</label>
                                <input type="text" class="form-control" id="post_title" name="post_title" value="{{ $users_post->title }}">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Description</label>
                                <textarea name="body" class="form-control" id="body">{{ $users_post->body }}</textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('update-form-{{$users_post->id }}').submit();">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    {{--//Modal edit post end--}}


        {{--//Modal Comfirm Delete--}}
        <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Posts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are your sure, You Want to Delete this
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete-form-{{$users_post->id }}').submit();">Yes</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    {{--//end modal--}}

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
                    <li>
                        <a href="#" title="" data-toggle="modal" data-target="#edit-post">Edit Post</a>
                    </li>
                    <li><a href="#" title="">saved</a></li>
                    <li><a href="#" title="">Close</a></li>
                    <li><a href="#" title="">Hide</a></li>
                    <li>
                        <form id="delete-form-{{$users_post->id }}" action="{{ url('/',$users_post->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                        <a href="#" data-toggle="modal" data-target="#confirm">Delete</a>
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
        {{--{!! $users_posts->render() !!}--}}
    <div class="process-comm">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div><!--process-comm end-->
</div><!--posts-section end-->
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

           $(window).scroll(fetchPost());


           
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