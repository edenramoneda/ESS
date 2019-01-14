<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicAwards extends Model
{
    protected $table = "aerolink.tbl_hr4_employee_academicAwards";

    protected $fillable = [
        'employee_code','title','date_awarded'
    ];

    protected $hidden = [];
}
