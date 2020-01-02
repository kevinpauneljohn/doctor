<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /**
     * Dec. 06, 2019
     * @author john kevin paunel
     * display dashboard pages
     * */
    public function dashboard()
    {
//        return view('pages.dashboard');
        return User::find('ea25402f-6dc8-4960-a062-18a98b65674c')->createToken('authToken')->accessToken;
    }
}
