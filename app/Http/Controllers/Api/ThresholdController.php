<?php

namespace App\Http\Controllers\Api;

use App\ClinicUser;
use App\Http\Controllers\Controller;
use App\Terminal;
use App\User;
use http\Env\Response;
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
//    public function save(Request $request)
//    {
//        //return "working";
////        return $request->all();
//    }
    public function save(Request $request)
    {
        //return $request->causer_id;
        /*retrieve all receiver terminals*/
//        $terminals = Terminal::where([
//            ['user_id','=',$request->causer_id],
//            ['id','!=',$request->terminal_id],
//        ])->get();

        $terminals = Terminal::all();
//        return $terminals;
        //$threshold = 0;
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
        $user_data = array($request->data);
        $this->sync_to_server($user_data);
        return 1;
    }


    /**
     * Jan. 09, 2020
     * @author john kevin paunel
     * sync the data to server
     * @param array $user_data
     * @return Response
     * */
    public function sync_to_server($user_data)
    {
        foreach ($user_data as $data_column => $column)
        {
            $object = json_decode($column);
            /*users*/
            $user = DB::table('users')->insert([
                'id'    => $object->user_id,
                'firstname' => $object->firstname,
                'middlename' => $object->middlename,
                'lastname' => $object->lastname,
                'mobileNo' => $object->mobileNo,
                'address' => $object->address,
                'refprovince' => $object->refprovince,
                'refcitymun' => $object->refcitymun,
                'status' => $object->status,
                'category' => $object->category,
                'created_at'    => $object->created_at,
                'created_at'    => $object->created_at,
            ]);

            $user = User::find($object->user_id);
            foreach ($object->roles as $role)
            {
                $user->assignRole($role->name);
            }

            $clinic = new ClinicUser();
            $clinic->clinic_id = $object->clinic_id;
            $clinic->user_id = $object->user_id;
            $clinic->save();
        }
        return response()->json(['success' => true]);
    }
}
