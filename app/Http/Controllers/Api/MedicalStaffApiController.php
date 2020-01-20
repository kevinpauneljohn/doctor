<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicalStaffApiController extends Controller
{
    public function createMedicalStaff(Request $request)
    {
        $medicalStaff = json_encode($request->medical_staff);
        return $medicalStaff[0];

    }
}
