<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Terminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThresholdController extends Controller
{
    public function save(Request $request)
    {
        $terminals = Terminal::where([
            ['user_id','=',$request->causer_id],
            ['terminal_id','!=',$request->terminal_id],
        ])->get();

        foreach($terminals as $terminal)
        {

        }
        $threshold = DB::table('thresholds')->insert($request->all());
        if($threshold)
        {
            return 1;
        }else{
            return 2;
        }
    }
}
