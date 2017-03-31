<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use \App\User;
use \App\Library;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

            /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // logic to retrieve first and last names
        $name = $user->name;
        $firstname = strstr($name, ' ', true);
        $lastname = false; 
        if ($firstname != false)
        {
            $lastname = strstr($name, ' ', false);
        }

        $nickname = $firstname;

        if ($user->nickname != null)
        {
            $nickname = $user->nickname;
        }

        $authUser = User::firstOrCreate([
            'username' => $nickname, 
            'firstName' => $firstname,
            'lastName' => $lastname,
            'email' => $user->email,
            //'avatar' => $user->avatar,
            ]);

        $library = Library::firstOrCreate([
            'user_id' => $authUser->id,
            ]);

        Auth::login($authUser);

        return redirect('/home');
        // $user->token;
    }
}
