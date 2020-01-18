<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicalStaffApiController extends Controller
{
    public function createMedicalStaff(Request $request)
    {
        return $request->all();
    }
}
