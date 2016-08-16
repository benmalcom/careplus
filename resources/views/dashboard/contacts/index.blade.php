@extends('dashboard.layouts.default')
@section('content')
    <div class="mt-20">
        <a href="{{url('/contacts/add')}}" class="btn btn-info simplebox"><i class="fa fa-plus-square"></i> Add a contact</a>
    </div>
    <div class="mt-10">
        <table class="table table-striped table-bordered">
            <thead>
               <tr>
                   <th>S/No</th>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Phone Number</th>
               </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>James Peters</td>
                <td>james_peters1122@hotmail.com</td>
                <td>+2348034346000</td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection