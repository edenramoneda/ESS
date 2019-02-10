<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestOvertime extends Model
{
    protected $table = "aerolink.tbl_hr3_overtime";

    protected $fillable = [
        'employee_code','date','overtime_hours','reason','status'
    ];
}
