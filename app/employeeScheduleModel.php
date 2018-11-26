<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeeScheduleModel extends Model
{
    protected $table = "tbl_temp_schedule";

    protected $fillable = [
        's_id','employee_code','sunday','monday',
        'tuesday','wednesday','thursday','friday'
    ];

    protected $hidden = [];
}
