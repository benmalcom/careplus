@extends('dashboard.layouts.default')
@section('dynamic-css')
    <link rel="stylesheet" href="{{asset('/bower_components/bootstrap-calendar/css/calendar.min.css')}}" media="all">
@endsection
@section('content')
    <div id="calendar"></div>
@endsection
@section('dynamic-js')
    <script type="text/javascript" src="{{asset('/bower_components/underscore/underscore-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/bower_components/bootstrap-calendar/js/calendar.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            var calendar = $("#calendar").calendar(
                    {
                        tmpl_path: "/bower_components/bootstrap-calendar/tmpls/",
                        events_source: function () { return []; }
                    });
        });
    </script>
@endsection