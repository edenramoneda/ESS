<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalAttainment extends Model
{
    protected $table = "aerolink.tbl_hr4_employee_educAttain";

    protected $fillable = [
        'educ_level','school','course',
        'duration'
    ];

    protected $hidden = [];
}
