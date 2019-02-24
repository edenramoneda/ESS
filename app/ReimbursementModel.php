<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReimbursementModel extends Model
{
    protected $table = "aerolink.tbl_hr3_reimbursement_request";

    protected $fillable = [
        'id','date_requested','employee_code','date','expenses','particulars','attachment','status'
    ];
}
