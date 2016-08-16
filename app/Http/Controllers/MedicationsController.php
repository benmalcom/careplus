<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MedicationsController extends Controller
{
    //
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $pageTitle = "Medications";
        $topBarTitle = "Medications";
        $topBarSubTitle = "Track prescriptions, dosage, schedule, reactions";
        return view('dashboard.medications.index',compact('pageTitle','topBarTitle','topBarSubTitle'));
    }

    public function getAddMedication()
    {
        $pageTitle = "Add Medications";
        $topBarTitle = "Add Medications";
        $topBarSubTitle = "Track prescriptions, dosage, schedule, reactions";
        return view('dashboard.medications.add',compact('pageTitle','topBarTitle','topBarSubTitle'));
    }

}
