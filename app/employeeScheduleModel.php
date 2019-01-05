<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeeScheduleModel extends Model
{
    protected $table = "aerolink.tbl_hr3_createSchedule";

    protected $fillable = [
        'ID','Monday','Tuesday',
        'Wednesday','Thursday','Friday'
    ];

    protected $hidden = [];
}
