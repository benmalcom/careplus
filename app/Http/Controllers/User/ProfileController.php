<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileFormRequest;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;



class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getProfile()
    {
        $pageTitle = "Profile";
        $topBarTitle = "Your Profile";
        $topBarSubTitle = "It is important to keep this up to date";
        $user = Auth::user();
         return view('dashboard.user.profile',compact('pageTitle','topBarTitle','topBarSubTitle','user'));
    }

    public function postProfile(ProfileFormRequest $request)
    {
        $inputs = $request->all();
        if($request->hasFile('avatar'))
        {
            if(!empty(Auth::user()->avatar))
            {
                unlink(public_path('/img/avatar/').Auth::user()->avatar);
            }
            $file = $request->file('avatar');
            $filename = "avatar_".Auth::user()->id."_.".$file->getClientOriginalExtension();
            $img = Image::make($file->getRealPath());
            $img->resize(600,500)->save(public_path('/img/avatar/'.$filename));
            $inputs['avatar'] = $filename;
        }

        $user = Auth::user();
        $user->first_name = $inputs['first_name'];
        $user->last_name = $inputs['last_name'];
        $user->mobile = $inputs['mobile'];
        $user->email = $inputs['email'];
        $user->email_alternate =  array_key_exists('email_alternate',$inputs) ? $inputs['email_alternate'] : '';
        $user->mobile_alternate =  array_key_exists('mobile_alternate',$inputs) ? $inputs['mobile_alternate'] : '';
        $user->religion =  array_key_exists('religion',$inputs) ? $inputs['religion'] : '';
        $user->avatar =  array_key_exists('avatar',$inputs) ? $inputs['avatar'] : '';
        $user->fax =  array_key_exists('fax',$inputs) ? $inputs['fax'] : '';
        $user->dob =  array_key_exists('dob',$inputs) ? $inputs['dob'] : '';
        $user->address =  array_key_exists('address',$inputs) ? $inputs['address'] : '';
        $user->website =  array_key_exists('website',$inputs) ? $inputs['website'] : '';
        $user->allergies =  array_key_exists('allergies',$inputs) ? $inputs['allergies'] : '';
        $user->medical_conditions =  array_key_exists('medical_conditions',$inputs) ? $inputs['medical_conditions'] : '';
        $boolean = $user->save();
        if($boolean)
        {
            $this->setFlashMessage('You have updated your profile!',1);
            return redirect()->back();
        }
        else
        {
            $this->setFlashMessage('There was a problem updating your profile',2);
            return redirect()->back();
        }

    }
}
