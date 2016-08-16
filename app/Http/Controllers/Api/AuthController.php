<?php

namespace App\Http\Controllers\Api;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Twilio;
use Auth;

class AuthController extends Controller
{
    //
    public function __construct()
    {

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'mobile' => 'required|numeric|min:11',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
        ]);
    }
    public function login(Request $request)
    {
        $response = ['success'=>false,'statusCode'=>200];
        $rules = array(
            'mobile'=>'required',
            'password'=>'required|min:6',
        );
        $user_data = $request->all();
        $validator = Validator::make($user_data,$rules);

        if($validator->fails())
        {

            $response['message'] = "There are some problems with your inputs";
            $response['errors'] = $validator->errors()->all();
            return response()->json(toResponseFormat($response));

        }
        else
        {
            if($this->isRegisteredButNotVerified($user_data['mobile']))
            {
                $response['message'] = "This number needs to be verified first, we've sent a verification code to it.";
                return response()->json(toResponseFormat($response));
            }

            $check_user =  Auth::attempt(['mobile'=>$user_data['mobile'],'password'=>$user_data['password'],'account_verified' => 1]);
            if($check_user)
            {
                $response['success'] = true;
                $response['message'] = "User logged in!";
                return response()->json(toResponseFormat($response,Auth::user()));
            }
            else
            {
                $response['message'] = "User with this details does not exist";
                return response()->json(toResponseFormat($response));
            }

        }
    }


    public function register(Request $request)
    {
        $response = ['success'=>false,'statusCode'=>200];

        $user_data = $request->all();
        $validator = $this->validator($user_data);
        if($validator->fails())
        {
            $response['message'] = "There are some problems with your inputs";
            $response['errors'] = $validator->errors()->all();
            return response()->json(toResponseFormat($response));
        }
        else
        {
           // generate a pin based on 2 * 7 digits + a random character
            $code = str_shuffle(mt_rand(100000,999999));
            $existing_user = User::where('mobile',$user_data['mobile'])->first();
            if(!is_null($existing_user))
            {
                if($existing_user->account_verified)
                {
                    $response['message'] = "There's a verified user using this mobile number, if it's you then login";
                    return response()->json(toResponseFormat($response));
                }
                else
                {
                    $v_code = empty($existing_user->verification_code) ? $code : $existing_user->verification_code;
                    $message = "Enter this code to complete your registration,".$v_code;
                    $sms_response = $this->sendTwilioSMS($existing_user->mobile,$message);
                    if($sms_response)
                    {
                        $response['message'] = "Your mobile number needs to be verified, we've sent you your verification code!";
                        return response()->json(toResponseFormat($response));
                    }
                    else
                    {
                        $response['message'] = "We are experiencing difficulty sending your verification code to your mobile, please contact support!";
                        return response()->json(toResponseFormat($response));
                    }

                }
            }
            else
            {
                while(!User::where('verification_code',$code)->exists())
                {
                    $user = new User();
                    $user->first_name = $user_data['first_name'];
                    $user->last_name = $user_data['last_name'];
                    $user->email = $user_data['email'];
                    $user->mobile = $user_data['mobile'];
                    $user->verification_code = $code;
                    $boolean = $user->save();

                    if($boolean) {
                        $message = "Enter this code to complete your registration," . $code;
                        $sms_response = $this->sendTwilioSMS($user->mobile,$message);

                        if ($sms_response) {
                            $response['success'] = true;
                            $response['message'] = "We've sent a verification code to your phone!";
                            return response()->json(toResponseFormat($response));

                        } else {
                            $response['success'] = false;
                            $response['message'] = "We are experiencing difficulty sending a verification to your mobile, please try again or contact us for support!";
                            $user->delete();
                            return response()->json(toResponseFormat($response));
                        }
                    }
                }
            }


        }
    }



    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\JsonResponse
     */
    public function postVerificationCode(Request $request)
    {
        $response = ['success'=>false,'statusCode'=>200];

        $rules = array(
            'verification_code'=>'required|size:6',
            'password'=>'required|min:6'
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $response['message'] = "There are some problems with your inputs";
            $response['errors'] = $validator->errors()->all();
            return response()->json(toResponseFormat($response));

        }
        else
        {
            $inputs = $request->all();
            $user = User::where('verification_code',$inputs['verification_code'])->first();
            if(is_null($user))
            {
                $response['message'] = "The verification code you entered is incorrect!";
                return response()->json(toResponseFormat($response));
            }
            else
            {
                $user->verification_code = '';
                $user->account_verified = 1;
                $user->password = bcrypt($inputs['password']);
                if($user->save())
                {
                    $response['success'] = true;
                    $response['message'] = "Code verification successful!";
                    return response()->json(toResponseFormat($response,$user));

                }
            }

        }

    }
    public function resendVerificationCode(Request $request)
    {
        $response = ['success'=>false,'statusCode'=>200];
        $rules = array(
            'mobile'=>'required'
        );
        $user_data = $request->all();
        $validator = Validator::make($user_data,$rules);

        if($validator->fails())
        {
            $response['message'] = "There are some problems with your inputs";
            $response['errors'] = $validator->errors()->all();
            return response()->json(toResponseFormat($response));
        }
        else
        {
            $existing_user = User::where('mobile',$user_data['mobile'])->first();
            if(!is_null($existing_user))
            {
                if(!$existing_user->account_verified && $existing_user->verification_code =="")
                {
                    $existing_user->verification_code = str_shuffle(mt_rand(100000,999999));
                    $existing_user->save();
                }
                $message = "Enter this code to complete your registration,".$existing_user->verification_code;
                $sms_response = $this->sendTwilioSMS($existing_user->mobile,$message);
                if($sms_response)
                {
                    $response['success'] = true;
                    $response['message'] = "Use the verification code sent to you to complete your registration";
                    return response()->json(toResponseFormat($response));
                }
                else
                {
                    $response['message'] = "We are experiencing difficulty sending a verification to your mobile, please contact us for support!";
                    return response()->json(toResponseFormat($response));
                }
            }
            else
            {
                $response['message'] = "We can't find your number in our database, please register again!";
                return response()->json(toResponseFormat($response));
            }
        }


    }


    protected function sendTwilioSMS($mobile,$message)
    {
        $return = null;
        try
        {
            Twilio::message($mobile, $message);
            $return = true;
        }
        catch(\Exception $e)
        {
            $return = $e->getMessage();
        }

        return $return;
    }

    protected function isRegisteredButNotVerified($mobile)
    {
        $boolean = User::where('mobile','=',$mobile)->where('account_verified','=',0)->exists();
        return $boolean;
    }
}