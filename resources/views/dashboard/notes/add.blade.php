@extends('dashboard.layouts.default')
@section('content')
    <div class="mt-10">
        <div class="panel panel-default simplebox">

            <form class="p-0" method="post" action="/journals/create">
                {{csrf_field()}}
                <div class="panel-body p-0">
                        <div>
                            <textarea class="form-control simplebox b-0 no-resize" rows="4" name="allergies" placeholder="Write notes here"></textarea>
                        </div>
                    <div>
                        <label class="ml-10 text-muted">Password protected <input type="checkbox"></label>
                    </div>
                </div>
                <div class="panel-footer pt-0 pb-5">
                    <div class="row mt-10">
                        <button type="submit" class="btn btn-info btn-sm simplebox ml-10"><i class="fa fa-plus-square"></i> Add note</button>
                    </div>

                </div>

            </form>
        </div>

    </div>

@endsection