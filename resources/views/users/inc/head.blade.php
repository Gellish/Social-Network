    <meta charset="UTF-8">
    <title>Gellish</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/user/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/css/line-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/css/line-awesome-font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/vendor/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet" >
    <link href="{{ asset('assets/user/css/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/lib/slick/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/css/responsive.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <script>
        // "fix" to prevent pusher error on reload
        window.Pusher = undefined;
    </script>
    @section('headSection')
        @show
