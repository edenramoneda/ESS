<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobClassifications extends Model
{
    protected $table = "aerolink.tbl_hr4_job_classifications";

    protected $fillable = [
        'id','class_name','class_desc','class_level'
    ];

    protected $hidden = [];
}
