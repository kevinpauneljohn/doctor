<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
//            'clinic'    => 'required',
            'position'  => 'required',
            'firstname' => 'required',
            'lastname'  => 'required',
            'mobileNo'  => 'required',
            'address'  => 'required',
            'province'  => 'required',
            'city'  => 'required',
        ]);

        if($validator->passes())
        {
            $medical_staff = new User();
            $medical_staff->firstname = $request->firstname;
            $medical_staff->middlename = $request->middlename;
            $medical_staff->lastname = $request->lastname;
            $medical_staff->mobileNo = $request->mobileNo;
            $medical_staff->address = $request->address;
            $medical_staff->refprovince = $request->province;
            $medical_staff->refcitymun = $request->city;
            $medical_staff->status = 'offline';
            $medical_staff->category = 'client';
//            $medical_staff->assignRole('medical staff');
//            foreach ($request->position as $role)
//            {
//                $medical_staff->assignRole($role);
//            }

            if($medical_staff->save())
            {
                return response()->json(['success' => true]);
            }
        }
        return response()->json($validator->errors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
