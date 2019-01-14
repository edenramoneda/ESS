<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyBackground extends Model
{
    protected $table = "aerolink.tbl_hr4_employee_FB";

    protected $fillable = [
        'employee_code','complete_name','relationship',
        'contact_number'
    ];

    protected $hidden = [];
}
