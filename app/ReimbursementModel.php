<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReimbursementModel extends Model
{
    protected $table = "aerolink.tbl_hr3_reimbursement_request";

    protected $fillable = [
        'id','date_requested','employee_code','or_no','date','recieved','particulars','attachment','total_amount','status'
    ];
}
