<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EmployeeJobs;
class Employee_Profiles extends Model
{
    protected $table = "aerolink.tbl_hr4_employee_profiles";

    protected $fillable = [
        'employee_code','firstname',
        'lastname','middlename' ,
        'suffix_id','date_of_birth',
        'place_of_birth','gender',
        'email','civil_status_id',
        'height','weight',
        'contact_number','employment_contract',
    ];
    
    protected $hidden = [];
}
