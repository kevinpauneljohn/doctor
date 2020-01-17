<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Terminal;
use App\Threshold;
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
//        $threshold = new Threshold();
//        $threshold->causer_id = $request->user_id;
//        $threshold->terminal_id = $request->terminal_id;
//        $threshold->data = $request->all();
//        $threshold->action = 'created';
//        $threshold->receiver_terminal = $request->terminal_id;
//        $threshold->save();
        //$this->threshold($request)->save($request);
            print_r($request->all());
        //return $request->all();
    }

    public function save($request)
    {
        DB::table('clinics')->insert([
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

        return $this;
    }

    public function threshold($request)
    {
        /*retrieve all receiver terminals*/
//        $terminals = Terminal::where([
//            ['user_id','=',$request->causer_id],
//            ['id','!=',$request->terminal_id],
//        ])->get();

        $threshold = new Threshold();
        $threshold->causer_id = $request->user_id;
        $threshold->terminal_id = $request->terminal_id;
        $threshold->data = json_decode($request->all());
        $threshold->action = 'created';
        $threshold->receiver_terminal = $request->terminal_id;
        $threshold->save();

        return $this;
    }
}
