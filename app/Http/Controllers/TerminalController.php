<?php

namespace App\Http\Controllers;

use App\Terminal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class TerminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('category','client')->get();
        return view('pages.Terminals.index')->with([
            'users'     => $users,
        ]);
    }

    public function terminalList()
    {
        $terminals = Terminal::all();

        return DataTables::of($terminals)
            ->addColumn('username',function($terminal){
                $username = User::find($terminal->user_id)->username;
                return $username;
            })
            ->addColumn('action', function ($terminal) {
                $action ="";
                if(auth()->user()->hasPermissionTo('view terminal'))
                {
                    $action .= '<a href="'.route('clients.show',['client' => $terminal->id]).'"><button class="btn btn-xs btn-success view-client" id="'.$terminal->id.'"><i class="fa fa-eye"></i> View</button> </a>&nbsp;';
                }

                if(auth()->user()->hasPermissionTo('edit terminal'))
                {
                    $action .= '<button class="btn btn-xs btn-primary edit-client" id="'.$terminal->id.'" data-toggle="modal" data-target="#edit-new-client-modal"><i class="fa fa-edit"></i> Edit</button> &nbsp;';
                }
                if(auth()->user()->hasPermissionTo('delete terminal'))
                {
                    $action .= '<button class="btn btn-xs btn-danger delete-client" id="'.$terminal->id.'"><i class="fa fa-trash"></i> Delete</a>';
                }

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
        $validator = Validator::make($request->all(),[
            'user'      => 'required',
            'device'    => 'required',
        ]);

        if($validator->passes())
        {
            $response = response()->json(['success' => false]);
            $terminal = new Terminal();
            $terminal->user_id = $request->user;
            $terminal->device = $request->device;
            $terminal->description = $request->description;
            if($terminal->save())
            {
                $response = response()->json(['success' => true]);
            }
            return $response;
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
