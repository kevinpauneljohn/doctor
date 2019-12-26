<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    /**
     * Dec. 26, 2019
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
            activity()->causedBy(auth()->user()->id)->withProperties(['username' => auth()->user()->username])->log('user logged in');
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            //activity()->causedBy(auth()->user()->id)->withProperties(['username' => auth()->user()->username])->log('user logged in');
            return response()->json([
                'user' => auth()->user(),
                'roles' => auth()->user()->getRoleNames(),
                'access_token' => $accessToken,
                'success'   => true,
                ]);
        }
        return response()->json(['message' => 'invalid credentials', 'success' => false]);
    }
}
