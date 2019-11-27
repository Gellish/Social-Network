<div class="suggestions full-width">
    <div class="sd-title">
        <h3>Suggestions</h3>
        <i class="la la-ellipsis-v"></i>
    </div><!--sd-title end-->
    <div class="suggestions-list">
        @foreach($users_suggest as $users_suggests)
            <div class="suggestion-usd">
                <img src="http://via.placeholder.com/35x35" alt="">
                <div class="sgt-text">
                    <h4>{{ $users_suggests->username }}</h4>
                    <span></span>
                </div>
                <span><i class="la la-plus"></i></span>
            </div>
        @endforeach
            <div class="view-more">
                <a href="#" title="">View More</a>
            </div>
    </div>
</div><!--suggestions end-->
