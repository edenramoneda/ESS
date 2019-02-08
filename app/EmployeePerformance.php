<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePerformance extends Model
{
    protected $table = "aerolink.tbl_hr1_perfGrading";

    protected $fillable = [
        'id','employee_code',
        'productivity','qualityofwork','Initiative',
        'teamwork','problemsolving','attendance'
    ];

    protected $hidden = [];
}
