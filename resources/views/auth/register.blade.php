@extends('auth.partials.default')
@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        <div class="col-sm-10 col-sm-offset-1 mt-20">
            <h1 class="text-center custom-care-font">care<span class="custom-zone-font">plus</span></h1>
            <h5 class="text-center">Have an account already? <a href="{{url('/login')}}" class="text-info">Sign in</a></h5>
            @include('errors.flash-message')
        </div>

        <div class="col-sm-10 col-sm-offset-1">

            <div class="panel panel-default m-0 p-0 bg-white form">
                <div class="form-top mt-0">

                </div>
                <form role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}

                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="control-label">FIRST NAME</label>
                            <input id="first_name" type="text" class="form-control simplebox" name="first_name" value="{{ old('first_name') }}" placeholder="First name">

                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="control-label">LAST NAME</label>

                            <input id="last_name" type="text" class="form-control simplebox" name="last_name" value="{{ old('last_name') }}" placeholder="Last name">

                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-MAIL ADDRESS</label>

                            <input id="email" type="email" class="form-control simplebox" name="email" value="{{ old('email') }}" placeholder="Email address">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="control-label">MOBILE NUMBER</label>

                            <input id="mobile" type="text" min="11" class="form-control simplebox phone" name="mobile" value="{{ old('mobile') }}">

                            @if ($errors->has('mobile'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                            @endif
                        </div>

                    </div>

                    <div class="panel-footer m-0">
                        <div class="form-group mt-10">
                            <button type="submit" class="btn btn-info simplebox">
                                NEXT  <i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection