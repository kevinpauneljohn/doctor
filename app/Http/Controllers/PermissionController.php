<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PermissionController extends Controller
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
     * Dec. 08, 2019
     * @author john kevin paunel
     * display all roles
     * */
    public function permissionList()
    {
        $permissions = Permission::all();

        return DataTables::of($permissions)
            ->addColumn('counter',function(){
                return "";
            })
            ->addColumn('action', function ($permission) {
                $action = '<button class="btn btn-xs btn-primary edit-role" id="'.$permission->id.'"><i class="fa fa-edit"></i> Edit</button> &nbsp;';
                $action .= '<button class="btn btn-xs btn-danger delete-role" id="'.$permission->id.'"><i class="fa fa-trash"></i> Delete</a>';

                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
