<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.Users.Client.index');
    }

//    public function clientList()
//    {
//        $clients = User::where('category','client')->get();
//
//        return DataTables::of($clients)
//            ->addColumn('roles',function($client){
//                $permission_roles = Permission::whereName($client->name)->first()->roles->pluck('name');
//                $roles = '<div id="data-cell-'.$permission->id.'">';
//                foreach( $permission_roles as $roleName){
//                    $roles .= '<span class="badge badge-primary">'.$roleName.'</span>';
//                }
//                $roles .= '</div>';
//                return $roles;
//            })
//            ->addColumn('action', function ($permission) {
//                $action ="";
//                if(auth()->user()->hasPermissionTo('assign role to permission'))
//                {
//                    $action .= '<button class="btn btn-xs btn-success assign-role" id="'.$permission->id.'"><i class="fa fa-id-badge"></i> Assign Roles</button> &nbsp;';
//                }
//
//                if(auth()->user()->hasPermissionTo('edit permission'))
//                {
//                    $action .= '<button class="btn btn-xs btn-primary edit-permission" id="'.$permission->id.'"><i class="fa fa-edit"></i> Edit</button> &nbsp;';
//                }
//                if(auth()->user()->hasPermissionTo('delete permission'))
//                {
//                    $action .= '<button class="btn btn-xs btn-danger delete-permission" id="'.$permission->id.'"><i class="fa fa-trash"></i> Delete</a>';
//                }
//
//                return $action;
//            })
//            ->rawColumns(['action','roles'])
//            ->make(true);
//    }

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
