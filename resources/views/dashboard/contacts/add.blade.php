@extends('dashboard.layouts.default')
@section('content')
    <div class="mt-10">
        <form class="form-horizontal mt-10 col-sm-12" method="post" action="/user/profile">
            {{csrf_field()}}

            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" placeholder="Your first name" name="first_name">
                </div>
            </div>
            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" placeholder="Your last name" name="last_name">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Called</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" name="username" placeholder="What contact wants to be called">
                </div>
            </div>
            <p><hr></p>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Company name</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control simplebox" placeholder="Company name" name="email">
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control simplebox" placeholder="Description" name="email">
                </div>
            </div>
            <p><hr></p>


            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">email (main)</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control simplebox" placeholder="Your email" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">email (alternate)</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control simplebox" placeholder="Do you have any other email?" name="email_alternate">
                </div>
            </div>
            <p><hr></p>

            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Phone</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" placeholder="Your phone number" name="mobile">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Phone (alternate)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" placeholder="Do you have any other number?" name="mobile_alternate">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Fax </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" placeholder="Fax" name="fax">
                </div>
            </div>
            <p><hr></p>

            <div class="form-group">
                <label class="col-sm-3 control-label">Address </label>
                <div class="col-sm-9">
                    <textarea class="form-control simplebox" rows="2" name="address" placeholder="Address"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Website </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" placeholder="Website" name="website">
                </div>
            </div>
            <p><hr></p>

            <div class="form-group">
                <label class="col-sm-3 control-label">Remarks </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" placeholder="Remarks" name="religion">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-info simplebox">Add contact</button>
                </div>
            </div>
        </form>
    </div>
@endsection