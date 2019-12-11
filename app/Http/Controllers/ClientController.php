<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
        $region = DB::table('refregion')->get();
        return view('pages.Users.Client.index')->with([
            'regions'   => $region
        ]);
    }

    public function clientList()
    {
        $clients = User::where('category','client')->get();

        return DataTables::of($clients)
            ->addColumn('clinics',function($client){
                return "";
            })
            ->addColumn('action', function ($client) {
                $action ="";
                if(auth()->user()->hasPermissionTo('view client'))
                {
                    $action .= '<button class="btn btn-xs btn-success assign-client" id="'.$client->id.'"><i class="fa fa-id-badge"></i> Assign Roles</button> &nbsp;';
                }

                if(auth()->user()->hasPermissionTo('edit client'))
                {
                    $action .= '<button class="btn btn-xs btn-primary edit-client" id="'.$client->id.'"><i class="fa fa-edit"></i> Edit</button> &nbsp;';
                }
                if(auth()->user()->hasPermissionTo('delete client'))
                {
                    $action .= '<button class="btn btn-xs btn-danger delete-client" id="'.$client->id.'"><i class="fa fa-trash"></i> Delete</a>';
                }

                return $action;
            })
            ->rawColumns(['action','clinics'])
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
            'firstname'     => 'required',
            'lastname'      => 'required',
            'username'      => 'required|unique:users,username',
            'email'         => 'required|unique:users,email',
            'password'      => 'required|confirmed',
            'landline'      => 'required',
        ]);

        if($validator->passes())
        {
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
