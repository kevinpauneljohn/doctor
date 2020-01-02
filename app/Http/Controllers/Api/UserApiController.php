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
        $validator = Validator::make($request->all(), [
            'firstname'     => 'required',
            'lastname'      => 'required',
            'birthday'      => 'required',
            'landline'      => 'required',
            'username'      => 'required|unique:users,username',
            'email'         => 'required|unique:users,email|email',
            'password'      => 'required|confirmed',
            'mobileNo'      => 'required',
            'address'      => 'required',
            'region'      => 'required',
            'state'      => 'required',
            'city'      => 'required',
        ]);

        if($validator->passes())
        {
            $user = new User();
            $user->firstname = $request->firstname;
            $user->middlename = $request->middlename;
            $user->lastname = $request->lastname;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->mobileNo = $request->mobileNo;
            $user->landline = $request->landline;
            $user->birthday = $request->birthday;
            $user->address = $request->address;
            $user->refregion = $request->region;
            $user->refprovince = $request->state;
            $user->refcitymun = $request->city;
            $user->postalcode = $request->postalcode;
            $user->status = 'offline';
            $user->category = 'client';
            $user->owner = 1;
            $user->assignRole(['owner','admin']);


            if($user->save())
            {
                $accessToken = $user->createToken('authToken')->accessToken;
                return response()->json([
                    'user' => $user,
                    'roles' => $user->getRoleNames(),
                    'access_token' => $accessToken,
                    'success'   => true,
                ]);
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
