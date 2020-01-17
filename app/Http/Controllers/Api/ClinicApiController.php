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

//        $this->save($request);
//            $this->threshold($request);

        $threshold = new Threshold();
        $threshold->causer_id = $request->user_id;
        $threshold->terminal_id = $request->terminal_id;
        $threshold->data = $request->all();
        $threshold->action = "created";
        $threshold->receiver_terminal = $request->terminal_id;
        $threshold->save();

        return $request->all();
    }

    protected function save($request)
    {
//        DB::table('clinics')->insert([
//            'id'            => $request->id,
//            'name'          => $request->name,
//            'address'       => $request->address,
//            'state'         => $request->state,
//            'city'          => $request->city,
//            'landline'      => $request->landline,
//            'mobile'        => $request->mobile,
//            'user_id'       => $request->user_id,
//            'status'        => $request->status,
//            'created_at'    => $request->created_at,
//            'updated_at'    => $request->updated_at,
//        ]);

//        $threshold = new Threshold();
//        $threshold->causer_id = $request->user_id;
//        $threshold->table = "clinics";
//        $threshold->terminal_id = $request->terminal_id;
//        $threshold->data = $request->all();
//        $threshold->action = "created";
//        $threshold->receiver_terminal = $request->terminal_id;
//        $threshold->save();

        return $this;
    }

    protected function threshold($request)
    {
        /*retrieve all receiver terminals*/
//        $terminals = Terminal::where([
//            ['user_id','=',$request->causer_id],
//            ['id','!=',$request->terminal_id],
//        ])->get();

//        $threshold = new Threshold();
//        $threshold->causer_id = $request->user_id;
//        $threshold->table = "clinics";
//        $threshold->terminal_id = $request->terminal_id;
//        $threshold->data = $request->all();
//        $threshold->action = "created";
//        $threshold->receiver_terminal = $request->terminal_id;
//        $threshold->save();

        return $this;
    }
}
