<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;

use App\User;
use Socialite;


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
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        // dd($user);
        // $user->token;

        $token = $user->token;
        $expiresIn = $user->expiresIn;

        $logedUser = User::where('email', $user->getEmail())->first();
        if($logedUser)
        {
            Auth::login($logedUser);
            return redirect('/');
        }
        else
        {
            User::create([
                'provider_id' => $user->getId(),
                'provider' => $provider,
                'name' => $user->getNickname(),
                'email' => $user->getEmail(),
                'image' => $user->getAvatar(),
                'password' => 'password'
            ]);
            Auth::login($logedUser);
            return redirect()->route('home');
        }


    }


}
