<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = "aerolink.tbl_hr4_jobs";

    protected $fillable = [
        'job_id','department_id',
        'title','description',
        'classification_id', 'designation_id'
    ];

    protected $hidden = [];
}
