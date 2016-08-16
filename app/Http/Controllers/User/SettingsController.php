<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getSettings()
    {
        $pageTitle = "Settings";
        $topBarTitle = "Your Settings";
        return view('dashboard.user.settings',compact('pageTitle','topBarTitle'));
    }
}
