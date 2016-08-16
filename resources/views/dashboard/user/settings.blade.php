@extends('dashboard.layouts.default')
@section('content')
    <form class="form-horizontal mt-10 col-sm-12">
        <h3 class="text-muted text-center text-info">Notifications and preferences</h3>
        <h4 class="text-center">I want to receive notification when: </h4>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Someone assigns a Calendar event or To-Do to you, or requests a volunteer
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Someone writes a Journal entry
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Someone comments on a Journal entry
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Include content of Journal entries and comments in your email notifications
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Never include content of Journal entries and comments in email notifications for Loved Ones in your account
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Send weekly account summary emails
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Send summaries for your account
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Send calendar reminders by email for your account
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Send calendar reminders to my mobile device for this account
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-info simplebox">Save Changes</button>
            </div>
        </div>

    </form>
    <div>
        <div class="col-sm-12"><hr></div>
        <p>Share Calendar <a href="#">Setup and more</a></p>
        <div class="col-sm-12"><hr></div>
    </div>

    <form class="form-horizontal">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Current Sign-in Email</label>
            <div class="col-sm-9">
                <input type="email" class="form-control simplebox" id="inputEmail3" placeholder="Email" name="email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Current Password</label>
            <div class="col-sm-9">
                <input type="password" class="form-control simplebox" id="inputPassword3" placeholder="Password" name="password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">New Password</label>
            <div class="col-sm-9">
                <input type="password" class="form-control simplebox" id="inputPassword3" placeholder="Password" name="new_password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-info simplebox">Save changes</button>
            </div>
        </div>
    </form>
@endsection