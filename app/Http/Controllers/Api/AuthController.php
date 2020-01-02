<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;


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


    public function testApi()
    {
        $http = new Client();
        $accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzZiZjk1MGE5ZGUyYzBhNDQ3ZTJlNGVlY2FhMjg5NGU5MzJhMTM5YWViZThlYjBkOTY1OTFkMmZkM2MzZGNhZWM1YmNmZTA1MTFmZTY4MmUiLCJpYXQiOjE1Nzc5NzU1MzEsIm5iZiI6MTU3Nzk3NTUzMSwiZXhwIjoxNjA5NTk3OTMxLCJzdWIiOiIzNjUzYjdhYy00ZjM2LTQ0MjUtYWEwZi00Zjg2OGQxNGNlZjIiLCJzY29wZXMiOltdfQ.KNmQZ0725fkzYCUmaXEst_5puTSXW96oCfvzBnINOqIRJI0_KA94jlX4rXjj02XtKvYnEbuIPNC3COPKLSTSzAp6cLwVGsqUkXWAuBLudeM9sKfltpyne6KdOezhSv9HcVoR5Ka-cA681HFqHHEG3UwN16mV-XCjHBovaRn16LeU56FoBetFKpT1XKsPQozgQBOSwLRK3w1veSm0J0nDKbnzAC8Y1W9B_oKalzJLE2sQ4OK88oUuclNyKzIOTuCwcNvqM4MknzQyBgSFXK-Cg_PIrNl3rCuEy95oUHA2vXFR2HG7_Iim8AMVSrRHKTcd0_sbtaM9Vg-i0XAjMUCe5RR1JRDx53lZBZ6JE4Xt5ddeGrnT9lUxV19XHnsXKfEt2H0kSybu8yB9CF50XhU763Rh7cExpQEkzw5e8OgvIOFw1RwgztWmnI0SIF3JS9DcbyJFadZsm21QczXdOscvKg26fu0J5LRGIO0pBq8R_D4unp1tFsNeqzO1Ta49LGSqqP_B1cAyx65LDinNabrA7cSQf7ryysfMqJJFrFMmOuW56w0H_W1-AfiHrQEeuvv0pY91q0-8jYSXDjWL_rm1xu2h8ibRgwspiStObbNCBbyJveNxOaM3flaxMXiIm4JhIKB2kgxO6YXrbqrR8uzkJRkqZ970FsHKO7tm6rcfuNA';

        $response = $http->request('GET', 'https://doctorapp.devouterbox.com/api/user', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$accessToken,
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }


}
