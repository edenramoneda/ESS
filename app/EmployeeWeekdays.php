<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeWeekdays extends Model
{
    protected $table = "aerolink.tbl_hr3_weekdays";

    protected $fillable = [
        'employee_code','mon','tues','wed','thurs','fri'
    ];

    protected $hidden = [];
}
