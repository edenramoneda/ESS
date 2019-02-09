<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class timeSheetModel extends Model
{
    protected $table = "aerolink.tbl_hr3_timesheet";

    protected $fillable = [
        'id','date','employee_id','date','time_in','time_out','total_hours','undertime','overtime','late'
    ];
}
