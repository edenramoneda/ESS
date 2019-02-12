<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CivilStatus extends Model
{
    protected $table = "aerolink.tbl_hr1_civil_status";

    protected $fillable = [
        'id','civil_status'
    ];
}
