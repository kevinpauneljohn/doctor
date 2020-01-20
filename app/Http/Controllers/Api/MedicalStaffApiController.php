<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalStaffApiController extends Controller
{
    public function createMedicalStaff(Request $request)
    {
        $this->staff($request)->role($request);
    }

    /**
     * Jan. 21, 2020
     * @author john kevin paunel
     * create new medical staff
     * @param object $request
     * @return mixed
     * */
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
            'category'    => $request->category,
            'created_at'    => $request->created_at,
            'updated_at'    => $request->updated_at,
        ]);

        return $this;
    }

    /**
     * Jan. 121, 2020
     * @author john kevin paunel
     * add role to medical staff
     * @param object $medical_staff
     * @param Request $request
     * @return mixed
     * */
    public function role($request)
    {
        $medical_staff = User::find($request->user_id);
        foreach ($request->position as $role)
        {
            $medical_staff->assignRole($role);
        }
        return $this;
    }
}
