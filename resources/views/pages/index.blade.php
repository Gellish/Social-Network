@extends('pages.layouts.app')

@section('headSection')
    <style>
        .intro-header {
            background-color: #777777;
            background: no-repeat center center;
            background-attachment: scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
            margin-bottom: 50px;
        }
        .intro-header .site-heading,
        .intro-header .post-heading,
        .intro-header .page-heading {
            padding: 100px 0 50px;
            color: white;
        }
        @media only screen and (min-width: 768px) {
            .intro-header .site-heading,
            .intro-header .post-heading,
            .intro-header .page-heading {
                padding: 150px 0;
            }
        }
        .intro-header .site-heading,
        .intro-header .page-heading {
            text-align: center;
        }
        .intro-header .site-heading h1,
        .intro-header .page-heading h1 {
            margin-top: 0;
            font-size: 50px;
        }
        .intro-header .site-heading .subheading,
        .intro-header .page-heading .subheading {
            font-size: 24px;
            line-height: 1.1;
            display: block;
            font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-weight: 300;
            margin: 10px 0 0;
        }
        @media only screen and (min-width: 768px) {
            .intro-header .site-heading h1,
            .intro-header .page-heading h1 {
                font-size: 80px;
            }
        }
        .intro-header .post-heading h1 {
            font-size: 35px;
        }
        .intro-header .post-heading .subheading,
        .intro-header .post-heading .meta {
            line-height: 1.1;
            display: block;
        }
        .intro-header .post-heading .subheading {
            font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 24px;
            margin: 10px 0 30px;
            font-weight: 600;
        }
        .intro-header .post-heading .meta {
            font-family: 'Lora', 'Times New Roman', serif;
            font-style: italic;
            font-weight: 300;
            font-size: 20px;
        }
        .intro-header .post-heading .meta a {
            color: white;
        }
        @media only screen and (min-width: 768px) {
            .intro-header .post-heading h1 {
                font-size: 55px;
            }
            .intro-header .post-heading .subheading {
                font-size: 30px;
            }
        }
        .post-preview > a {
            color: #333333;
        }
        .post-preview > a:hover,
        .post-preview > a:focus {
            text-decoration: none;
            color: #0085A1;
        }
        .post-preview > a > .post-title {
            font-size: 30px;
            margin-top: 30px;
            margin-bottom: 10px;
        }
        .post-preview > a > .post-subtitle {
            margin: 0;
            font-weight: 300;
            margin-bottom: 10px;
        }
        .post-preview > .post-meta {
            color: #777777;
            font-size: 18px;
            font-style: italic;
            margin-top: 0;
        }
        .post-preview > .post-meta > a {
            text-decoration: none;
            color: #333333;
        }
        .post-preview > .post-meta > a:hover,
        .post-preview > .post-meta > a:focus {
            color: #0085A1;
            text-decoration: underline;
        }
        @media only screen and (min-width: 768px) {
            .post-preview > a > .post-title {
                font-size: 36px;
            }
        }
        .section-heading {
            font-size: 36px;
            margin-top: 60px;
            font-weight: 700;
        }
        .caption {
            text-align: center;
            font-size: 14px;
            padding: 10px;
            font-style: italic;
            margin: 0;
            display: block;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
        }
        .pager {
            margin: 20px 0 0;
        }
        .pager li > a,
        .pager li > span {
            font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 1px;
            padding: 15px 25px;
            background-color: white;
            border-radius: 0;
        }
        .pager li > a:hover,
        .pager li > a:focus {
            color: white;
            background-color: #0085A1;
            border: 1px solid #0085A1;
        }
        .pager .disabled > a,
        .pager .disabled > a:hover,
        .pager .disabled > a:focus,
        .pager .disabled > span {
            color: #777777;
            background-color: #333333;
            cursor: not-allowed;
        }
        ::-moz-selection {
            color: white;
            text-shadow: none;
            background: #0085A1;
        }
        ::selection {
            color: white;
            text-shadow: none;
            background: #0085A1;
        }
        img::selection {
            color: white;
            background: transparent;
        }
        img::-moz-selection {
            color: white;
            background: transparent;
        }
    </style>
@endsection

@section('main-content')

    <header class="intro-header" style="background-image: url({{ asset('img/coding_1.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading text-center">

                    </div>
                </div>
            </div>
        </div>
    </header>

    <article style="padding-top: 450px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h1 style="font-size: 25px">Post</h1>
                    @foreach($posts as $post)

                        <div class="post-preview">

                            <a href="{{ route('post',$post->slug) }}">
                                <h2 class="post-title">
                                  {{ $post->title }}
                                </h2>
                                <h3 class="post-subtitle">
                                 {{ $post->slug }}
                                </h3>
                            </a>
                            <p class="post-meta"> <a href="#"></a> Created at {{ $post->created_at->diffForHumans() }}</p>
                        </div>
                        <hr>

                    @endforeach
                    <hr>
                        <!-- Pager -->
                        <ul class="pager">
                            <li class="next">
                                {{ $posts->links() }}
                                {{--<a href="#">Older Posts &rarr;</a>--}}
                            </li>
                        </ul>
                </div>
            </div>
        </div>
    </article>

        <hr>


@endsection