<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleRequests extends Model
{
    protected $table = "aerolink.tbl_hr3_shifting_request";

    protected $fillable = [
        'employee_code','date','schedule','reason'];
}
