<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $table = "aerolink.tbl_hr4_employee_workExp";

    protected $fillable = [
        'duration','position','company',
        'employment_status'
    ];

    protected $hidden = [];
}
