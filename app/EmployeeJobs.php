<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeJobs extends Model
{
    protected $table = "aerolink.tbl_hr4_employee_jobs";

    protected $fillable = [
        'id','employee_code',
        'job_id',
    ];

    protected $hidden = [];
}
