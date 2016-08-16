<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CalendarController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $pageTitle = "Calendar";
        $topBarTitle = "Calendar";
        $topBarSubTitle = "Schedule life and coordinate help ";
        return view('dashboard.calendar-events.index',compact('pageTitle','topBarTitle','topBarSubTitle'));
    }
}
