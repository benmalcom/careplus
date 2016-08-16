<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Careplus</title>
    <link rel="stylesheet" href="{{asset('/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('/bower_components/bootstrap/dist/css/bootstrap-theme.min.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('/bower_components/font-awesome/css/font-awesome.min.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}" media="all">
    @yield('after_style_css')
</head>
<body>
<div class="container">
    @yield('content')
</div>

<script type="text/javascript" src="{{asset('/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/script.js')}}"></script>
</body>
</html>