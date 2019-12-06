<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Dec. 06, 2019
     * @author john kevin paunel
     * display custom login form
     * route: login
     * */
    public function login()
    {
        if(Auth::check())
        {
            return redirect(route('dashboard'));
        }
        return view('vendor.adminlte.login');
    }

    /**
     * Dec. 06, 2019
     * @author john kevin paunel
     * authenticated the username and password submitted
     * route: login.authenticate
     * @param Request $request
     * @return mixed
     * */
    public function authenticate(Request $request)
    {
        $request->validate([
            'username'      => 'required',
            'password'      => 'required',
        ],[
            'username.required' => 'Username is required',
            'password.required' => 'Password is required',
        ]);

        $credential = $request->only('username','password');

        if(Auth::attempt($credential))
        {
            return redirect(route('dashboard'));
        }
        return back()->with(['success' => false, 'message' => 'Error Occurred']);
    }

    /**
     * Dec. 06, 2019
     * @author john kevin paunel
     * @param Request $request
     * @return mixed
     * */
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect(route('login'));
    }
}
