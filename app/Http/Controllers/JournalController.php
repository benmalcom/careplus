<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class JournalController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCreate()
    {

        $pageTitle = "Journals";
        $topBarTitle = "Journals";
        $topBarSubTitle = "Write down your thoughts, post updates ";
        return view('dashboard.journals.create',compact('pageTitle','topBarTitle','topBarSubTitle'));
    }
}
