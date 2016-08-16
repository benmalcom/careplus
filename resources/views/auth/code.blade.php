@extends('auth.partials.default')
@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        <div class="col-sm-12">
            <div class="col-sm-10 col-sm-offset-1 mt-40">
                <h1 class="text-center custom-care-font">care<span class="custom-zone-font">plus</span></h1>
                @include('errors.flash-message')
            </div>

            <div class="col-sm-10 col-sm-offset-1">

                <div class="panel panel-default m-0 p-0 bg-white form">
                    <div class="form-top mt-0">
                    </div>
                    <h4 class="text-muted text-center">Complete your registration</h4>
                    <form role="form" method="POST" action="{{ url('/auth/v-code') }}">
                        {{ csrf_field() }}

                        <div class="panel-body">
                            <div class="form-group{{ $errors->has('verification_code') ? ' has-error' : '' }}">
                                <label for="first_name" class="control-label">VERIFICATION CODE</label>
                                <input id="first_name" type="text" class="form-control simplebox" name="verification_code" placeholder="Verification code" value="{{ old('verification_code') }}">

                                @if ($errors->has('verification_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('verification_code') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="last_name" class="control-label">PASSWORD</label>

                                <input id="last_name" type="password" class="form-control simplebox" name="password" placeholder="Password" value="{{ old('password') }}">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">CONFIRM PASSWORD</label>

                                <input id="email" type="password" class="form-control simplebox" name="password_confirmation" placeholder="Type password again" value="{{ old('password_confirmation') }}">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>



                        </div>

                        <div class="panel-footer m-0">
                            <div class="form-group mt-10">
                                <button type="submit" class="btn btn-info simplebox">
                                    REGISTER
                                </button>
                                @if(Session::has('unverified_mobile'))
                                    <a class="label label-info pull-right mt-10" href="/auth/resend-v-code"><i class="fa fa-refresh"></i> Resend code?</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div class="well well-sm simplebox mt-5 p-3">
                    <p class="text-center text-muted">Experiencing difficulty? Contact us: <a><strong>support@mycareplus.com</strong></a></p>
                </div>
            </div>

        </div>

    </div>

@endsection