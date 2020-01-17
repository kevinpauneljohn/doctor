<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Terminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClinicApiController extends Controller
{

    /**
     * Jan. 17, 2019
     * @author john kevin paunel
     * save to clinics table
     * @param Request $request
     * @return mixed
     * */
    public function store(Request $request)
    {
        $clinic = DB::table('clinics')->insert([
            'id'            => $request->id,
            'name'          => $request->name,
            'address'       => $request->address,
            'state'         => $request->state,
            'city'          => $request->city,
            'landline'      => $request->landline,
            'mobile'        => $request->mobile,
            'user_id'       => $request->user_id,
            'status'        => $request->status,
            'created_at'    => $request->created_at,
            'updated_at'    => $request->updated_at,
        ]);
        return $request->all();
    }

    public function threshold(Request $request)
    {
        /*retrieve all receiver terminals*/
        $terminals = Terminal::where([
            ['user_id','=',$request->causer_id],
            ['id','!=',$request->terminal_id],
        ])->get();
    }
}
