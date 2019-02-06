<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfLeaves extends Model
{
    protected $table = "aerolink.tbl_hr3_typeofleaves";

    protected $fillable = [
        'leave_id','leave_name','limit_days','leave_limit'
    ];
}
