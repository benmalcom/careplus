<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Twilio;
use Auth;
use Session;



class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/profile';
    protected $redirectAfterLogout = '/login';

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'mobile' => 'required|min:11',
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
        $user_data = $request->all();
        $rules = array(
            'mobile'=>'required|min:11',
            'password'=>'required|min:6',
        );
        $validator = Validator::make($user_data,$rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            if($this->isRegisteredButNotVerified($user_data['mobile']))
            {
                $this->flashData("unverified_mobile",$user_data['mobile']);
                $this->setFlashMessage("This mobile number is not yet verified, we've sent a verification code to it.",2);
                return redirect('/auth/v-code');
            }
            $check_user =  Auth::attempt(['mobile'=>$user_data['mobile'],'password'=>$user_data['password'],'account_verified' => 1]);
            if($check_user)
            {
                return redirect()->intended('/user/profile');
            }
            else
            {
                $this->setFlashMessage('Incorrect username/password combination',2);
                return redirect()->back();
            }
        }
    }



    public function register(Request $request)
    {
        $user_data = $request->all();
        $validator = $this->validator($user_data);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $this->flashData("unverified_mobile",$user_data['mobile']);
            // generate a pin based on 2 * 7 digits + a random character
            $code = str_shuffle(mt_rand(100000,999999));
            $existing_user = User::where('mobile',$user_data['mobile'])->first();
            if(!is_null($existing_user))
            {
                if($existing_user->account_verified)
                {
                    $this->setFlashMessage("There's a verified user using this mobile number, if it's you then login. ",1);
                    return redirect('/login');
                }
                elseif(!$existing_user->account_verified)
                {
                    $this->setFlashMessage("This number has been registered but not verified, please enter the code sent to you for verification",2);
                    return redirect()->back();
                }
                else
                {
                    $this->flashData("unverified_mobile",$existing_user->mobile);
                    $message = "Enter this code to complete your registration,".$existing_user->verification_code;
                    $sms_response = $this->sendTwilioSMS($existing_user->mobile,$message);
                    if($sms_response)
                    {
                        $this->setFlashMessage("Your mobile number needs to be verified, we've sent you your verification code! ",2);
                        return redirect('/auth/v-code');
                    }
                    else
                    {
                        $this->setFlashMessage("We are experiencing difficulty sending your verification code to your mobile, please contact support!",1);
                        return redirect()->back();
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
                            $this->setFlashMessage("We've sent a verification code to your phone!", 1);
                            return redirect('/auth/v-code');
                        } else {
                            $this->setFlashMessage("We are experiencing difficulty sending a verification to your mobile, please contact support!", 2);
                            return redirect()->back();
                        }
                    }
                }
            }
        }
    }


    /**
     * Send confirmation code form.
     *
     */
    public function getVerificationCode()
    {
        return view('auth.code')->with('pageTitle','Confirm verification code and register.');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\JsonResponse
     */
    public function postVerificationCode(Request $request)
    {
        $rules = array(
            'verification_code'=>'required|size:6',
            'password'=>'required|min:6|confirmed',
            'password_confirmation'=>'required'
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        else
        {
            $inputs = $request->all();
            $user = User::where('verification_code',$inputs['verification_code'])->first();
            if(is_null($user))
            {
                $this->setFlashMessage('Incorrect verification code',2);
                return redirect()->back()->withErrors($validator);
            }
            else
            {
                $user->verification_code = '';
                $user->account_verified = 1;
                $user->password = bcrypt($inputs['password']);
                if($user->save())
                {
                    Auth::loginUsingId($user->id);
                    return redirect('/user/profile');
                }
            }

        }

    }

    public function resendVerificationCode()
    {
        if(Session::has('unverified_mobile'))
        {
            $mobile = Session::get('unverified_mobile');
            $existing_user = User::where('mobile',$mobile)->first();
            if(!is_null($existing_user))
            {
                $this->flashData("unverified_mobile",$existing_user->mobile);
                if(!$existing_user->account_verified && $existing_user->verification_code =="")
                {
                    $existing_user->verification_code = str_shuffle(mt_rand(100000,999999));
                    $existing_user->save();
                }
                $message = "Enter this code to complete your registration,".$existing_user->verification_code;
                $sms_response = $this->sendTwilioSMS($existing_user->mobile,$message);
                if($sms_response)
                {
                    $this->setFlashMessage("Use the verification code sent to you to complete your registration, or contact <a class='alert-link'>support</a> if you experience any difficulty",1);
                    return redirect('/auth/v-code');
                }
                else
                {
                    $this->setFlashMessage("We are experiencing difficulty sending a verification to your mobile, please <a class='alert-link'>contact us</a> for support!",2);
                    return redirect()->back();
                }
            }
            else
            {
                $this->setFlashMessage("We can't find your number in our database, please register again!",2);
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back();
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
        catch(\Services_Twilio_RestException $e)
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