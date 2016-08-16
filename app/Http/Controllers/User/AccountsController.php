<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountsController extends Controller
{
    //
    public function getAccounts()
    {
        $pageTitle = "Account Information";
        $topBarTitle = "Account Information";
        $topBarSubTitle = "Details about your account";
        return view('dashboard.user.accounts',compact('pageTitle','topBarTitle','topBarSubTitle'));
    }
}
