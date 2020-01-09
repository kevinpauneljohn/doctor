<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Terminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThresholdController extends Controller
{
    /**
     * Jan. 09, 2020
     * @author john kevin paunel
     * save the threshold data from local to server
     * @param Request $request
     * @return mixed
     * */
    public function save(Request $request)
    {
        /*retrieve all receiver terminals*/
        $terminals = Terminal::where([
            ['user_id','=',$request->causer_id],
            ['id','!=',$request->terminal_id],
        ])->get();


        foreach($terminals as $terminal)
        {
            /*insert request data to each receiver terminal*/
            $threshold = DB::table('thresholds')->insert([
                'causer_id'     => $request->causer_id,
                'terminal_id'     => $request->terminal_id,
                'data'     => $request->data,
                'action'     => $request->action,
                'receiver_terminal'     => $terminal->id,
                'created_at'     => $request->created_at,
                'updated_at'     => $request->updated_at,
            ]);
        }
        if($threshold)
        {
            return 1;
        }else{
            return 0;
        }
    }
}
