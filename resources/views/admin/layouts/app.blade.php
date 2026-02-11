<!DOCTYPE html>
<html>
<head>
    @include('admin.inc.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('admin.inc.header')
    @include('admin.inc.sidebar')
    @section('main-content')
    @show
    @include('admin.inc.footer')
</div>
</body>
</html>