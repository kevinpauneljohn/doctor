<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalStaffApiController extends Controller
{
    public function createMedicalStaff(Request $request)
    {
        return $request->firstname;

    }

    public function staff($request)
    {
//        DB::table('users')->insert([
//            'id'
//        ]);
    }
}
