<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeMessage extends Model
{
    protected $table = "aerolink.tbl_hr2_ess_message";

    protected $fillable = [
        'id','employee_code',
        'sender','receiver','isUnread'
    ];

    protected $hidden = [];
}
