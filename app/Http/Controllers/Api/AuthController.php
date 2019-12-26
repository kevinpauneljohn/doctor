<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    /**
     * Dec. 26, 2019
     * @author john kevin paunel
     * authenticated the username and password submitted
     * api route: login
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
            $user = DB::table('users')->where('id',auth()->user()->id)->get();
            return response()->json([
                'user' => $user,
                'roles' => auth()->user()->getRoleNames(),
                'access_token' => $accessToken,
                'success'   => true,
                ]);
        }
        return response()->json(['message' => 'invalid credentials', 'success' => false]);
    }


}
