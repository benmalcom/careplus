@extends('front.partials.default')
@section('after_style_css')
    <link rel="stylesheet" href="{{asset('/css/welcome.css')}}" media="all">
@endsection
@section('content')
    <div class="overlay-div">
            <div class="col-sm-10 col-sm-offset-1 mt-150">
                    <h1 class="text-center text-white big-font">myCareplus</h1>
                    <p class="text-white text-center lead text-muted">Care is now a plus. Todos,Journals,Medications,Contacts,Save notes and so much more!</p>
                    <p class="text-center"><a href="/register" class="btn btn-default btn-lg mr-5 simplebox">Create account!</a><a href="/login" class="btn btn-info btn-lg simplebox"><i class="fa fa-user"></i> Sign In</a></p>
            </div>
    </div>
    <nav class="navbar navbar-default navbar-fixed-bottom transparent">
        <div class="container">
            <p class="navbar-link pull-right mt-10 mr-5 text-muted"><a class="text-muted label label-default" href="http://ekaruztech.com">Developed by Ekaruztech</a></p>
        </div>
    </nav>

@endsection
