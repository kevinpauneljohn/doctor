<?php

namespace App\Http\Controllers\Api;

use App\Clinic;
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
        if($this->save($request)->threshold($request))
        {
            return 1;
        }
        return 0;
    }

    /**
     * Jan. 17, 2020
     * @author john kevin paunel
     * save the clinic data to clinics table
     * */
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

    /**
     * Jan. 17, 2020
     * @author john kevin paunel
     * save the data to threshold for all the receiver terminals
     * */
    public function threshold($request)
    {
        /*retrieve all receiver terminals*/
        $terminals = Terminal::where([
            ['user_id','=',$request->user_id],
            ['id','!=',$request->terminal_id],
        ]);

        /*check if there is available terminal who will receive*/
        if($terminals->count() > 0)
        {
            foreach ($terminals->get() as $terminal)
            {
                /*save the data to threshold*/
                $threshold = DB::table('thresholds')->insert([
                    'causer_id'     => $request->user_id,
                    'table'         => 'clinics',
                    'terminal_id'   => $request->terminal_id,
                    'data'          => json_encode($request->all()),
                    'action'        => $request->action,
                    'receiver_terminal'     => $terminal->id,
                    'created_at'     => $request->created_at,
                    'updated_at'     => $request->updated_at,
                ]);
            }
        }

        return $this;
    }


    /**
     * Jan. 17, 2020
     * @author john kevin paunel
     * this will process the update
     * @param Request $request
     * @return int
     * */
    public function updateClinic(Request $request)
    {
        if($this->update($request)->threshold($request))
        {
            return 1;
        }
        return 0;
    }

    /**
     * Jan. 17, 2020
     * @author john kevin paunel
     * update the clinic data
     * */
    public function update($request)
    {
        DB::table('clinics')->where('id',$request->id)
            ->update([
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

    public function deleteClinic(Request $request)
    {
        if($this->delete($request)->threshold($request))
        {
            return 1;
        }
        return 0;
    }

    public function delete($request)
    {
        $clinic = Clinic::find($request->id);
        $clinic->delete();
        return $this;
    }
}
