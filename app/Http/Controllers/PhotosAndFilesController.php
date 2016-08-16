<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PhotosAndFilesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $pageTitle = "Photos and Files";
        $topBarTitle = "Photos and Files";
        $topBarSubTitle = "A place to store important files for future access or reference.";
        return view('dashboard.uploads.index',compact('pageTitle','topBarTitle','topBarSubTitle'));
    }

    public function getAddUpload()
    {
        $pageTitle = "Photos and Files";
        $topBarTitle = "Photos and Files";
        $topBarSubTitle = "A place to store important files for future access or reference.";
        return view('dashboard.uploads.add',compact('pageTitle','topBarTitle','topBarSubTitle'));
    }
}
