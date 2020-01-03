<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Terminal extends Model
{
    use SoftDeletes, LogsActivity, UsesUuid;

    protected $fillable = ['user_id','device'];
    protected static $logAttributes = ['user_id','device'];

    /**
     * Jan. 03, 2020
     * @author john kevin paunel
     * retrieve user terminal details
     * */
    public function users()
    {

    }
}
