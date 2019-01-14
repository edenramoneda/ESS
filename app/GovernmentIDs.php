<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GovernmentIDs extends Model
{
    protected $table = "aerolink.tbl_hr4_employee_governmentIDs";

    protected $fillable = [
        'employee_code','SSS_num','TIN_num',
        'Pagibig_num','Philhealth_num'
    ];

    protected $hidden = [];
}
