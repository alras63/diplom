<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        // var_dump($user->password);
        // var_dump(Hash::make($credentials['password']));
        // die();

        if(!$user) {
            return redirect()->intended('/login')
                ->withErrors('Неверный логин или пароль!');
        }

        if ($user->password == md5($credentials['password'])) {
            Auth::login($user);
            return redirect()->intended('/')
            ->withSuccess('Signed in');
        }
        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('/')
        //                 ->withSuccess('Signed in');
        // }

        return redirect("login")->withSuccess('Login details are not valid');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
