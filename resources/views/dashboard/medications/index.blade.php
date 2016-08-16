@extends('dashboard.layouts.default')
@section('content')
    <div class="mt-10">
        <a href="{{url('/medications/add')}}" class="btn btn-info simplebox"><i class="fa fa-plus-square"></i> Add medication</a>
    </div>
    <div class="mt-10">
        <table class="table table-striped table-bordered">
            <thead>
               <tr>
                   <th>S/No</th>
                   <th>Name</th>
                   <th>What it's for</th>
                   <th>RX Number</th>
                   <th>Where you got it</th>
               </tr>
            </thead>
        </table>
        <div>
            <p class="text-muted text-center">
                No medications have been added yet. Would you like to <a href="{{url('/medications/add')}}">add a medication now?</a>

            </p>
        </div>
    </div>
@endsection