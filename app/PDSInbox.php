<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PDSInbox extends Model
{
    protected $table = "aerolink.tbl_hr2_ess_req_inbox";

    protected $fillable = [
        'pds_id',
        'employee_code',
        'field_want_to_change',
        'data_want_to_change_to',
        'reason',
        'req_status_id',
        'date_req'
    ];

}
