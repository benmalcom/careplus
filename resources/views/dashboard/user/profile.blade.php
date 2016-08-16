@extends('dashboard.layouts.default')
@section('content')

    <form class="form-horizontal mt-10 col-sm-12 mb-5" method="post" action="/user/profile" enctype="multipart/form-data">
        @include('errors.flash-message')

        {{csrf_field()}}
        <div class="form-group">

            <label class="col-sm-3 control-label">Picture</label>
            <div class="col-sm-9">
                <div class="h-50 row">
                    <div class="col-sm-2 col-xs-4">
                        <img src="{{empty($user->avatar)  ? asset('/img/no-avatar.png') : asset('/img/avatar/'.$user->avatar)}}" class="img-responsive profile-pic-nav">
                    </div>
                    <div class="col-sm-4 col-xs-6">
                        <label class="btn btn-info btn-xs text-left"><i class="fa fa-camera"></i> Choose photo<input type="file" name="avatar" class="hidden profile-file"></label>
                    </div>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
            <label class="col-sm-3 control-label">First Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control simplebox" placeholder="Your first name" name="first_name" value="{{$user->first_name}}">
            </div>
        </div>
        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
            <label class="col-sm-3 control-label">Last Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control simplebox" placeholder="Your last name" name="last_name" value="{{$user->last_name}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Called</label>
            <div class="col-sm-9">
                <input type="text" class="form-control simplebox" name="username" placeholder="What name should we call you in this site?" value="{{$user->username}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">email</label>
            <div class="col-sm-9">
                <div class="bg-custom p-5 simplebox text-muted shadow">
                <h5><strong>{{$user->email}}</strong></h5>
                    <p>Want to change this email? Go to your careplus <a href="/user/settings">settings page</a> to do it</p>
                </div>
            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="col-sm-3 control-label">email (main)</label>
            <div class="col-sm-9">
                <input type="email" class="form-control simplebox" placeholder="Your email" name="email" value="{{$user->email}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">email (alternate)</label>
            <div class="col-sm-9">
                <input type="email" class="form-control simplebox" placeholder="Do you have any other email?" name="email_alternate" value="{{$user->email_alternate}}">
            </div>
        </div>
        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
            <label class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-9">
                <input type="text" class="form-control simplebox" placeholder="Your phone number" name="mobile" value="{{$user->mobile}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Phone (alternate)</label>
            <div class="col-sm-9">
                <input type="text" class="form-control simplebox" placeholder="Do you have any other number?" name="mobile_alternate" value="{{$user->mobile_altrnate}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Fax </label>
            <div class="col-sm-9">
                <input type="text" class="form-control simplebox" placeholder="Fax" name="fax" value="{{$user->fax}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Address </label>
            <div class="col-sm-9">
                <textarea class="form-control simplebox" rows="2" name="address" placeholder="Address" value="{{$user->address}}"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Website </label>
            <div class="col-sm-9">
                <input type="text" class="form-control simplebox" placeholder="Website" name="website" value="{{$user->website}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Date of birth </label>
            <div class="col-sm-9">
                <input type="text" class="form-control simplebox" placeholder="format: dd-mm-yyy" name="dob" value="{{$user->dob}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Known Allergies </label>
            <div class="col-sm-9">
                <textarea class="form-control simplebox" rows="2" name="allergies" placeholder="Your known allergies" value="{{$user->allergies}}"></textarea>

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Medical Conditions </label>
            <div class="col-sm-9">
                <textarea class="form-control simplebox" rows="2" name="medical_conditions" placeholder="List medical conditions here" value="{{$user->medical_conditions}}"></textarea>

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Faith/Religion </label>
            <div class="col-sm-9">
                <input type="text" class="form-control simplebox" placeholder="format: dd-mm-yyy" name="religion" value="{{$user->religion}}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-info simplebox">Save Changes</button>
            </div>
        </div>
    </form>
    @endsection