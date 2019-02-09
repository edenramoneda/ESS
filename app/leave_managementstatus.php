<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leave_managementstatus extends Model
{
    protected $table = "aerolink.tbl_hr3_leave_request_new";

    protected $fillable = [
        'id','date','employee_code','leave_name','range_leave','date_start','date_end','reason'
    ];

    protected $hidden = [];
}
