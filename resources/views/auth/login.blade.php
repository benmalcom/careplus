@extends('auth.partials.default')
@section('content')
    <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
        <div class="col-sm-10 col-sm-offset-1 mt-100">
            <h1 class="text-center custom-care-font">care<span class="custom-zone-font">plus</span></h1>
            <h5 class="text-center">Don't have an account yet? <a href="/register" class="text-info">Sign up</a></h5>
            @include('errors.flash-message')
        </div>

        <div class="col-sm-10 col-sm-offset-1">

            <div class="panel panel-default m-0 p-0 bg-white form">
                <div class="form-top mt-0">

                </div>
                <form role="form" method="post" action="/login">
                    {{csrf_field()}}
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">MOBILE NUMBER</label>
                            <div class="clearfix"></div>
                            <input type="text" class="form-control simplebox phone" name="mobile">
                            @if ($errors->has('mobile'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="exampleInputPassword1">PASSWORD</label>
                            <input type="password" class="form-control simplebox" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="checkbox">
                            <label>
                                <a class="text-info">Forgot your password?</a>
                            </label>
                        </div>
                    </div>
                    <div class="panel-footer m-0">
                        <div class="form-group mt-10">
                            <button type="submit" class="btn btn-info simplebox">Sign in</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>

    </div>

@endsection