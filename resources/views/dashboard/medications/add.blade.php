@extends('dashboard.layouts.default')
@section('content')
    <div class="mt-10">
        <form class="form-horizontal mt-10 col-sm-12" method="post" action="/user/profile">
            {{csrf_field()}}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" placeholder="Name e.g aspirin" name="name">
                </div>
            </div>

            <div class="form-group{{ $errors->has('dosage') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Dosage</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" placeholder="Dosage e.g 25mg, 300UI" name="dosage">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Instructions</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" name="instructions" placeholder="Instructions e.g 3times d day">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">What it's for</label>
                <div class="col-sm-9">
                        <input type="text" class="form-control simplebox" name="instructions" placeholder="What it's for? e.g teething pain, stomach infection">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Who prescribed it?</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" name="instructions" placeholder="Doctor,physical therapist etc">
                </div>
            </div>
            <p><hr></p>

            <div class="form-group">
                <label class="col-sm-3 control-label">Where you got it</label>
                <div class="col-sm-9">
                        <input type="text" class="form-control simplebox" name="instructions" placeholder="Pharmacy address or it's website">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Mobile</label>
                <div class="col-sm-9">
                        <input type="text" class="form-control simplebox" name="mobile" placeholder="Mobile">
                </div>
            </div>
            <p><hr></p>


            <div class="form-group">
                <label class="col-sm-3 control-label">Expiration date</label>
                <div class="col-sm-9">
                        <input type="text" class="form-control simplebox" name="expiration_date" placeholder="Expiry date">
                </div>
            </div>

            <div class="row col-sm-offset-3 col-sm-9 p-0 pl-5">
                    <div class="col-sm-6">
                        <div class="form-group p-0">
                            <input type="text" class="form-control simplebox" name="expiration_date" placeholder="Start date">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group p-0">
                            <input type="text" class="form-control simplebox" name="expiration_date" placeholder="End date">
                        </div>
                    </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <label><strong>Active? <input type="checkbox"></strong></label>
                </div>
            </div>
            <p><hr></p>


            <div class="form-group">
                <label class="col-sm-3 control-label">Prescription number</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" name="expiration_date" placeholder="Prescription number">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label">Prescription date</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" name="expiration_date" placeholder="Prescription date">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Quantity</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" name="expiration_date" placeholder="Quantity">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label">Refills left</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" name="expiration_date" placeholder="Refills left">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label">Refills expiration date</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" name="expiration_date" placeholder="Refills expiration date">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Refills ordered on</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" name="expiration_date" placeholder="Refills ordered on">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">When last filled?</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control simplebox" name="expiration_date" placeholder="When last filled?">
                </div>
            </div>
            <p><hr></p>

            <div class="form-group">
                <label class="col-sm-3 control-label">Effective?</label>
                <div class="col-sm-9">
                    <select class="form-control simplebox">
                        <option value="">-- select --</option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Allergic?</label>
                <div class="col-sm-9">
                    <select class="form-control simplebox">
                        <option value="">-- select --</option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
            </div>
            <p><hr></p>

            <div class="form-group">
                <label class="col-sm-3 control-label">Remarks</label>
                <div class="col-sm-9">
                    <textarea rows="3" class="form-control simplebox"></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-info simplebox">Add medication</button>
                </div>
            </div>
        </form>
    </div>
@endsection