<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TodosController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $pageTitle = "Todos";
        $topBarTitle = "Todos";
        $topBarSubTitle = "Remember things to do, and assign responsibility for them";
        return view('dashboard.todos.index',compact('pageTitle','topBarTitle','topBarSubTitle'));
    }
}
