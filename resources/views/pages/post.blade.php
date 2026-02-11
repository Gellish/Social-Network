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
</style>
<link rel="stylesheet" href="{{ asset('assets/user/css/prism.css')  }}">
@endsection

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId=554017068734038&autoLogAppEvents=1"></script>

@section('main-content')
    <header class="intro-header" style="background-image: url({{ Storage::disk('local')->url($post->image) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading text-center">
                        <h1>{{ $post->title }}</h1>
                        <h2 class="subheading">{{ $post->subtitle }}</h2>
                        {{--<span class="meta">Posted by <a href="#">Gellish</a> on August 24, 2014</span>--}}
                    </div>
                </div>
            </div>
        </div>
    </header>

    <article style="padding-top: 600px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h5>Created at {{ $post->created_at->diffForHumans() }}</h5>
                    <h3>Category</h3>
                    {{-- category --}}
                        @foreach($post->categories as $category )
                        <small style="border-radius: 5px; border: black solid 1px;padding: 5px; margin-right: 5px;">
                            <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
                        </small>
                        @endforeach
                    <br>
                    <br>

                    {!! htmlspecialchars_decode($post->body) !!}

                    {{-- tag --}}
                    <h3>Tags</h3>
                    @foreach($post->tags as $tag )
                        <a href="{{ route('tag',$tag->slug) }}">
                        <small style="border-radius: 5px; border: black solid 1px;padding: 5px; margin-right: 5px;">
                            {{ $tag->name }}
                        </small>
                        </a>
                    @endforeach
                </div>
                <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="10"></div>
            </div>
        </div>
    </article>

    <hr>


@endsection

@section('footerSection')
    <script src="{{ asset('assets/user/js/prism.js') }}"></script>
@endsection