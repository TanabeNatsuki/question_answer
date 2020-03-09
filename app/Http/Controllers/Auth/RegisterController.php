<?php

namespace App\Http\Controllers\Auth;

use App\Mail\EmailVerification;
use App\Http\Controllers\DbController;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\MainRequest;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Point;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Mail\RegisterShipped;
use App\Mail\OrderMail;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('guest');
     }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function pre_check(RegisterRequest $request)
    {
      $request->flashOnly( 'email');
      $bridge_request = $request->all();
      $bridge_request['password_mask'] = '*******';
      return view('auth.register_check')->with($bridge_request);
    }

    protected function create(array $data)
    {
      $user = User::create([
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'email_verify_token' => base64_encode($data['email']),
      ]);

      $email = new EmailVerification($user);
      Mail::to($user->email)->send($email);

      return $user;
    }

    public function register(Request $request)
    {
        event(new Registered($user = $this->create( $request->all() )));

        return view('auth.registered');
    }

   public function showForm($email_token)
   {

    if ( !User::where('email_verify_token',$email_token)->exists() )
    {
       $msg = '無効なトークンです';
    } else {
      $user = User::where('email_verify_token', $email_token)->first();
    }
      if ($user->status == config('const.USER_STATUS.REGISTER'))
      {
        logger("status". $user->status );
         $msg='すでに本登録されています。ログインして利用してください。';
      }

      $user->status = config('const.USER_STATUS.MAIL_AUTHED');
      if($user->save()) {
        return view('auth.main.main_register', compact('email_token'));
      } else{
        $msg= 'メール認証に失敗しました。再度、メールからリンクをクリックしてください。';
      }
    return view('auth.main.main_register')->with($msg);
   }

   public function mainCheck(MainRequest $request)
   {
     $email_token = $request->email_token;

     $user = new User();
     $user->name = $request->name;

     return view('auth.main.main_register_check', compact('user','email_token'));
   }

   public function mainRegister(Request $request)
   {
     $user = User::where('email_verify_token',$request->email_token)->first();
     $point = new Point;
     $point->user_id = $user->id;
     $point->save();
     $user->point_id = $point->id;
     $user->status = config('const.USER_STATUS.REGISTER');
     $user->name = $request->name;
     $user->save();

     return view('auth.main.main_registered',compact('user','email_token'));
   }
}
