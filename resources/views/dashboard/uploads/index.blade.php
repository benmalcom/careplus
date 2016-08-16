@extends('dashboard.layouts.default')
@section('content')

    <div class="mt-20">
        <table class="table table-striped table-bordered">
            <thead>
               <tr>
                   <th>S/No</th>
                   <th>File name</th>
                   <th>Date</th>
               </tr>
            </thead>
        </table>
        <div>
            <p>
                No files have been uploaded yet. Would you like to <a href="{{url('/uploads/new')}}">upload a file now?</a>
            </p>
        </div>
    </div>
@endsection