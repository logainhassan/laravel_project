<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Carbon\Carbon;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }


    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $getUser = Socialite::driver('github')->user();
        $user = $this->createUser($getUser,'github');
        auth()->login($user);
        return redirect()->to('/home');

        // $user->token;
    }

    public function createUser($getUser,$provider){

        $user = User::where('provider_id', $getUser->id)->first();

        if (!$user) {

             $user = User::create([

                'name'     => $getUser->name,

                'email'    => $getUser->email,

                'remember_token' => $getUser->token,

                'email_verified_at' => Carbon::now(),

                'provider' => $provider,

                'provider_id' => $getUser->id

            ]);

        }


        return $user;

    }

    /**
    * Create a new controller instance.
    *
    * @return void
    */

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        
            $getUser = Socialite::driver('google')->user();
            $user = $this->createUser($getUser,'google');

            $expiresIn = Carbon::parse($getUser->expiresIn)->timestamp;
           
            if ($expiresIn > Carbon::now()->timestamp && $getUser->refreshToken) {
                $user->update([
                    'remember_token' => $getUser->refreshToken,

                ]);
            }
            
            auth()->login($user);
            
            return redirect()->to('/home');
            
    }
}
