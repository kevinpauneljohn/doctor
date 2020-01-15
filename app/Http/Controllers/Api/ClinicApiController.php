<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClinicApiController extends Controller
{
    public function store(Request $request)
    {
        //return $request->all();
        $clinic = DB::table('clinics')->insert($request->all());
    }
}
