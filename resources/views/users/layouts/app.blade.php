<html>
<head>
        @include('users.inc.head')
</head>
<body>
        @include('sweetalert::alert')
        <div class="wrapper">
            @include('users.inc.navbar')
            {{--@include('users.inc.header')--}}
                @section('main-content')
                @show
            @include('users.inc.footer')
            </div>
</body>
</html>
