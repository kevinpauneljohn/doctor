<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThresholdController extends Controller
{
    public function save(Request $request)
    {
        $threshold = DB::table('thresholds')->insert($request->all());
        return response()->json(['success' => $threshold]);
//        return response()->json(['success' => $request->all()]);
    }
}
