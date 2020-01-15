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
//        $clinic = DB::table('clinics')->insert([
//            'id'    => $request->id,
//            'name'    => $request->name,
//            'address'    => $request->address,
//            'landline'    => $request->landline,
//            'mobile'    => $request->mobile,
//            'status'    => $request->status,
//            'created_at'    => $request->created_at,
//            'updated_at'    => $request->updated_at,
//        ]);
        $clinic = DB::table('clinics')->insert($request->all());
        return $request->all();
    }
}
