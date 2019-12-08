<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
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
        return view('Pages.Permissions.index')->with([
            'roles' => Role::all()
        ]);
    }

    /**
     * Dec. 08, 2019
     * @author john kevin paunel
     * display all roles
     * */
    public function permissionList()
    {
        $permissions = \App\Permission::all();

        return DataTables::of($permissions)
            ->addColumn('roles',function($permission){
                $permission_roles = Permission::whereName($permission->name)->first()->roles->pluck('name');
                $roles = "";
                    foreach( $permission_roles as $roleName){
                        $roles .= '<span class="badge badge-info">'.$roleName.'</span>&nbsp;';
                    }
                return $roles;
            })
            ->addColumn('action', function ($permission) {
                $action = '<button class="btn btn-xs btn-primary edit-permission" id="'.$permission->id.'"><i class="fa fa-edit"></i> Edit</button> &nbsp;';
                $action .= '<button class="btn btn-xs btn-danger delete-permission" id="'.$permission->id.'"><i class="fa fa-trash"></i> Delete</a>';

                return $action;
            })
            ->rawColumns(['action','roles'])
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
        $validator = Validator::make($request->all(), [
            'permission' => 'required|unique:permissions,name'
        ]);

        if($validator->passes())
        {
            $permission = Permission::create(['name' => $request->permission]);
            if(isset($request->roles))
            {
                foreach ($request->roles as $role){
                    $permission->assignRole($role);
                }
            }

            return response()->json(['success' => true]);
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
        $permission_roles = Permission::find($id)->roles->pluck('name');

        return $permission_roles;
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
        $validator = Validator::make($request->all(),[
            'editPermission' => 'required||unique:permissions,name'
        ],[
            'editPermission.unique' => $request->editPermission.' has been already taken'
        ]);

        if($validator->passes())
        {
            $permission = Permission::find($id);
            $permission->name = $request->editPermission;
            if($permission->save())
            {
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false]);
        }
        return response()->json($validator->errors());
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
