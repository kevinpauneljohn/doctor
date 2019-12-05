<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Dec. 06, 2019
     * @author john kevin paunel
     * display custom login form
     * */
    public function login()
    {
        return view('vendor.adminlte.login');
    }
}
