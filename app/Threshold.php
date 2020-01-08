<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Threshold extends Model
{
    protected $fillable = [
        'causer_id','terminal_id','data','action','created_at','updated_at'
    ];
}
