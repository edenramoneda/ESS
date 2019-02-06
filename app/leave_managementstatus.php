<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leave_managementstatus extends Model
{
    protected $table = "aerolink.tbl_hr3_leave_management_status";

    protected $fillable = [
        'id','date_requested','employee_code','request_id','type_of_leave','reason','day_of_leave','start_date','end_date','status'
    ];

    protected $hidden = [];
}
