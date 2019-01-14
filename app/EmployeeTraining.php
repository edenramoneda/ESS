<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeTraining extends Model
{
    protected $table = "aerolink.tbl_hr4_employee_trainingSeminars";

    protected $fillable = [
        'title','duration','type',
        'conducted_by'
    ];

    protected $hidden = [];
}
