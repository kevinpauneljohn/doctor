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
        return User::find('def93d36-87e1-4f68-a8a9-4a3cc63a62ac');
    }
}
