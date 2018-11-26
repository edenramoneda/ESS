<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "aerolink.tbl_hr4_department";

    protected $fillable = [
        'id','dept_name',
        'dept_desc',
    ];

    protected $hidden = [];
}
