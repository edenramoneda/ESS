<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class timeSheetModel extends Model
{
    protected $table = "aerolink.tbl_hr2_temp_timesheet";

    protected $fillable = [
        'id','date','employee_code','time_in','time_out','ovetime_hours','hours_worked'
    ];
}
