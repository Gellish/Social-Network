<div class="col-lg-3 pd-right-none no-pd">
    <div class="right-sidebar">
        <div class="widget widget-jobs">
            <div class="sd-title">
                <h3>Top Games</h3>
                <i class="la la-ellipsis-v"></i>
            </div>
            <div class="jobs-list">
                <div class="job-info">
                    <div class="job-details">
                        {{--<h3>Senior Product Designer</h3>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>--}}
                    </div>
                    <div class="hr-rate">
                        {{--<span>$25/hr</span>--}}
                    </div>
                </div><!--job-info end-->
            </div><!--jobs-list end-->
        </div><!--widget-jobs end-->

        <div class="widget widget-jobs">
            <div class="sd-title">
                <h3>Top Jobs</h3>
                <i class="la la-ellipsis-v"></i>
            </div>
            <div class="jobs-list">
                <div class="job-info">
                    <div class="job-details">
                        <h3>Senior Product Designer</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                    </div>
                    <div class="hr-rate">
                        <span>$25/hr</span>
                    </div>
                </div><!--job-info end-->
            </div><!--jobs-list end-->
        </div><!--widget-jobs end-->

        <div class="widget widget-jobs">
            <div class="sd-title">
                <h3>Most Viewed This Week</h3>
                <i class="la la-ellipsis-v"></i>
            </div>
            <div class="jobs-list">
                @foreach($users_most_view as $user_most_views)
                <div class="job-info">
                    <div class="job-details">
                        <h3>{{ $user_most_views->username }}</h3>
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>--}}
                    </div>
                    <div class="hr-rate">
                        {{--<span>$25/hr</span>--}}
                    </div>
                </div><!--job-info end-->
               @endforeach
            </div><!--jobs-list end-->
        </div><!--widget-jobs end-->
        <div class="widget suggestions full-width">
            <div class="sd-title">
                <h3>Most Viewed People</h3>
                <i class="la la-ellipsis-v"></i>
            </div><!--sd-title end-->

            <div class="suggestions-list">
                @foreach($users_view as $user_views)
                <div class="suggestion-usd">
                    <img src="http://via.placeholder.com/35x35" alt="">
                    <div class="sgt-text">
                        <h4> {{ $user_views->username }}</h4>
                        <span>Graphic Designer</span>
                    </div>
                    <span><i class="la la-plus"></i></span>
                </div>
                @endforeach
                <div class="view-more">
                    <a href="#" title="">View More</a>
                </div>
            </div><!--suggestions-list end-->
        </div>
    </div><!--right-sidebar end-->
</div>
