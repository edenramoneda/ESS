<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestStatus extends Model
{
    protected $table = "aerolink.tbl_eis_request_status";

    protected $fillable = [
        'req_status_id','req_status'
    ];
}
