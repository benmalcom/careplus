<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name','email', 'password','mobile','fax','email_alternate','mobile_alternate',
        'address','allergies','dob','website','religion','medical_conditions','verification_code','account_verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function full_name()
    {
        $full_name = Auth::user()->last_name.' '.Auth::user()->first_name;
        $full_name = strlen($full_name) > 20 ? substr($full_name,0,17).'...' : $full_name;
        return $full_name;
    }

}
