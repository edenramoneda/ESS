<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = "aerolink.tbl_hr2_announcement";

    protected $fillable = [
        'announcement_id','announcement_title',
        'announcement_content','date','posted_by','isDeleted'
    ];

    protected $hidden = [];
}
