<!-- Set your background image for this header on the line below. -->
<header class="intro-header pb-5">
    <div class="container-fluid h-75"
         style="background-image: url(' @section('bg_image')@show ');">
        <div class="row justify-content-center text-center" >
            <div class="col-lg-8 pt-5">
                <div class="site-heading">
                    <h1>
                        @section('post_title')
                        @show
                    </h1>
                    <hr class="small">
                    <span class="subheading">
                        @section('subtitle')
                         @show
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>