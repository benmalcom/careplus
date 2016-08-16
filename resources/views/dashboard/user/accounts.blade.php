@extends('dashboard.layouts.default')
@section('content')
<div>
    <h3 class="text-center">In your account</h3>
    <h5 class="text-center text-muted">You own the subscriptions for these people. Their data can’t be shared without your approval.</h5>

    <div class="list-group mt-10 col-sm-10 col-sm-offset-1">
            <div class="list-group-item row mb-5 p-5 no-br">
                <div class="col-sm-2 col-xs-4">
                    <img src="{{empty(Auth::user()->avatar)  ? asset('/img/no-avatar.png') : asset('/img/avatar/'.Auth::user()->avatar)}}" class="img-responsive profile-pic-nav">
                </div>
                <div class="col-sm-6 col-xs-8">
                    <h5 class="text-muted"><strong>Evans J. Michael</strong></h5>
                </div>
                <div class="col-sm-2 col-xs-4">
                    <button href="#" class="btn btn-danger btn-xs simplebox"><i class="fa fa-trash-o"></i> Delete</button>
                </div>
            </div>


            <div class="list-group-item row mb-5 p-5 no-br">
                <div class="col-sm-2 col-xs-4">
                    <img src="{{empty(Auth::user()->avatar)  ? asset('/img/no-avatar.png') : asset('/img/avatar/'.Auth::user()->avatar)}}" class="img-responsive profile-pic-nav">
                </div>
                <div class="col-sm-6 col-xs-8">
                    <h5 class="text-muted"><strong>Emmanuel Okafor N.</strong></h5>
                </div>
                <div class="col-sm-2 col-xs-4">
                    <button href="#" class="btn btn-danger btn-xs simplebox"><i class="fa fa-trash-o"></i> Delete</button>
                </div>
            </div>


        <div class="list-group-item row mb-5 p-5 no-br">
            <div class="col-sm-2 col-xs-4">
                <img src="{{empty(Auth::user()->avatar)  ? asset('/img/no-avatar.png') : asset('/img/avatar/'.Auth::user()->avatar)}}" class="img-responsive profile-pic-nav">
            </div>
            <div class="col-sm-6 col-xs-8">
                <h5 class="text-muted"><strong>Benjamin Simeon Ike</strong></h5>
            </div>
            <div class="col-sm-2 col-xs-4">
                <button href="#" class="btn btn-danger btn-xs simplebox"><i class="fa fa-trash-o"></i> Delete</button>
            </div>
        </div>


    </div>

</div>
@endsection