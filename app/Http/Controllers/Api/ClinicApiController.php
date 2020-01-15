<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClinicApiController extends Controller
{
    public function store(Request $request)
    {
        return $request->all();
    }
}
