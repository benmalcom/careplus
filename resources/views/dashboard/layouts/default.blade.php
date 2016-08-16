<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$pageTitle}}</title>
    <link rel="stylesheet" href="{{asset('/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('/bower_components/bootstrap/dist/css/bootstrap-theme.min.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('/bower_components/font-awesome/css/font-awesome.min.css')}}" media="all">
    @yield('dynamic-css')
    <link rel="stylesheet" href="{{asset('/css/style.css')}}" media="all">

</head>
<body>
<div class="container flex-box shadow">
    <div class="row full-page">
    @include('dashboard.layouts.partials.left-aside')
    @include('dashboard.layouts.partials.content')

    </div>

    <div class="clearfix"></div>

</div>

    @include('dashboard.layouts.partials.footer')
<script type="text/javascript" src="{{asset('/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
@yield('dynamic-js')
<script type="text/javascript" src="{{asset('/js/script.js')}}"></script>
</body>
</html>