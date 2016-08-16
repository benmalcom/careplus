@extends('dashboard.layouts.default')
@section('dynamic-css')
    <link rel="stylesheet" href="{{asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" media="all">
@endsection
@section('content')
    <div class="col-sm-12 m-0 p-0 mt-10">
        <div class="panel panel-default simplebox shadow">

            <form class="p-0 shadow" method="post" action="/journals/create">
                {{csrf_field()}}
                <div class="panel-body p-0">

                    <div class="row">
                        <div class="col-sm-10 br-0">
                            <textarea style="overflow: hidden;" class="form-control simplebox b-0 no-resize" rows="5" name="allergies" placeholder="Type here to record an observation"></textarea>
                        </div>
                        <div class="col-sm-2">
                            <img src="{{empty(Auth::user()->avatar)  ? asset('/img/no-avatar.png') : asset('/img/avatar/'.Auth::user()->avatar)}}" class="img-responsive profile-pic-nav m-10">
                        </div>
                    </div>
                </div>
                <div class="panel-footer pt-0 pb-5">
                    <div class="row mt-10">
                        <div class="col-sm-2">
                        <p class="text-muted text-right hide-on-minimize">Time <i class="fa fa-clock-o"></i></p>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <input type="text" class="form-control simplebox input-sm date-time">
                        </div>
                        <div class="col-sm-7 col-xs-6">
                            <p class="text-center p-5">
                                <button type="submit" class="btn btn-info btn-xs simplebox pull-right"><i class="fa fa-plus-square"></i> Add entry</button>
                                <label class="btn text-info m-0 p-0 mr-10 pull-right">
                                    <input type="file" class="hidden"><i class="fa fa-camera"></i>
                                </label>
                            </p>
                        </div>

                    </div>

                </div>

            </form>
        </div>
        <div>
            <p class="text-muted text-center">
                To create a Journal Entry via email, send mail to: <strong>52942-34574@mail.careplus.com</strong>
            </p>
        </div>
    </div>

    @endsection
@section('dynamic-js')
    <script type="text/javascript" src="{{asset('/bower_components/moment/min/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.date-time').datetimepicker({
                defaultDate: Date.now()
            });
        });
    </script>
@endsection