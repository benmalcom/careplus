<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NotesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function getIndex()
    {
        $pageTitle = "Notes";
        $topBarTitle = "Notes";
        $topBarSubTitle = "Notes, care instructions, account lists, reference material… ";
        return view('dashboard.notes.index',compact('pageTitle','topBarTitle','topBarSubTitle'));
    }

    public function getAddNote()
    {
        $pageTitle = "Add Note";
        $topBarTitle = "Add Note";
        $topBarSubTitle = "Notes, care instructions, account lists, reference material… ";
        return view('dashboard.notes.add',compact('pageTitle','topBarTitle','topBarSubTitle'));
    }
}
