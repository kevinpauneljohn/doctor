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
        DB::table('users')->insert([
            'id'    => $request->id,
            'firstname'    => $request->firstname,
            'middlename'    => $request->middlename,
            'lastname'    => $request->lastname,
            'mobileNo'    => $request->mobileNo,
            'address'    => $request->address,
            'refprovince'    => $request->refprovince,
            'refcitymun'    => $request->refcitymun,
            'status'    => $request->status,
            'created_at'    => $request->created_at,
            'updated_at'    => $request->updated_at,
        ]);

        return $this;
    }
}
