<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class ProfileFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !is_null(Auth::user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'email'=>'required|email',
            'mobile' => 'required',
            'first_name' => 'required',
            'last_name' => 'required'
        ];
    }
}
