<?php

namespace App\Http\Controllers\Api;

use App\ClinicUser;
use App\Http\Controllers\Controller;
use App\Terminal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalStaffApiController extends Controller
{
    public function createMedicalStaff(Request $request)
    {
        $staff = new User();
        if($this->staff($staff, $request)->role($staff,$request)->assignToClinic($request)->threshold($request))
        {
            return 1;
        }

        return 0;

    }

    /**
     * Jan. 21, 2020
     * @author john kevin paunel
     * create new medical staff
     * @param object $request
     * @return mixed
     * */
    public function staff($staff, $request)
    {
        $staff->id = $request->user_id;
        $staff->firstname = $request->firstname;
        $staff->middlename = $request->middlename;
        $staff->lastname = $request->lastname;
        $staff->mobileNo = $request->mobileNo;
        $staff->address = $request->address;
        $staff->refprovince = $request->refprovince;
        $staff->refcitymun = $request->refcitymun;
        $staff->status = $request->status;
        $staff->category = $request->category;
        $staff->assignRole('medical staff');/*Default role for medical staff*/
        $staff->save();


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
            $staff->assignRole($role['name']);
        }
        return $this;
    }

    /**
     * Jan. 22, 2020
     * @author john kevin paunel
     * assign the medical staff to a specific clinic
     * @param $request
     * @return mixed
     * */
    public function assignToClinic($request)
    {
        $clinic = new ClinicUser();
        $clinic->clinic_id = $request->clinic_id;
        $clinic->user_id = $request->user_id;
        $clinic->save();

        return $this;
    }

    public function threshold($request)
    {
        /*retrieve all receiver terminals*/
        $terminals = Terminal::where([
            ['user_id','=',$request->causer_id],
            ['id','!=',$request->terminal_id],
        ]);

        /*check if there is available terminal who will receive*/
        if($terminals->count() > 0)
        {
            foreach ($terminals->get() as $terminal)
            {
                /*save the data to threshold*/
                $threshold = DB::table('thresholds')->insert([
                    'causer_id'     => $request->causer_id,
                    'table'         => 'medicalStaff',
                    'terminal_id'   => $request->terminal_id,
                    'data'          => json_encode($request->all()),
                    'action'        => $request->action,
                    'receiver_terminal'     => $terminal->id,
                    'created_at'     => $request->created_at,
                    'updated_at'     => $request->updated_at,
                ]);
            }
        }

        return $this;
    }
}
