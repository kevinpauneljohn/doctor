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
        $staff = DB::table('users')->insert([
            'id'    => $request->user_id,
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

        return User::find($request->user_id);
//        $staff = new User();
//        $staff->id = $request->user_id;
//        $staff->firstname = $request->firstname;
//        $staff->middlename = $request->middlename;
//        $staff->lastname = $request->lastname;
//        $staff->mobileNo = $request->mobileNo;
//        $staff->address = $request->address;
//        $staff->refprovince = $request->refprovince;
//        $staff->refcitymun = $request->refcitymun;
//        $staff->status = $request->status;
//        $staff->category = $request->category;
//        $staff->created_at = $request->created_at;
//        $staff->updated_at = $request->updated_at;
//        $staff->save();
        return $this;
    }

    /**
     * Jan. 121, 2020
     * @author john kevin paunel
     * add role to medical staff
     * @param Request $request
     * @return mixed
     * */
    public function role($staff,$request)
    {
        foreach ($request->roles as $role)
        {
            $staff->assignRole($role);
        }
        return $this;
    }
}
