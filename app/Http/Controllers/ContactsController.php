<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $pageTitle = "Contacts";
        $topBarTitle = "Contacts";
        $topBarSubTitle = "Friends, family, doctors, neighbors…";
        return view('dashboard.contacts.index',compact('pageTitle','topBarTitle','topBarSubTitle'));
    }

    public function getAddContact()
    {
        $pageTitle = "Add Contact";
        $topBarTitle = "Add Contact";
        $topBarSubTitle = "Friends, family, doctors, neighbors…";
        return view('dashboard.contacts.add',compact('pageTitle','topBarTitle','topBarSubTitle'));
    }

}
