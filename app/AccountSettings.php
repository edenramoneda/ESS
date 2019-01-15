<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountSettings extends Model
{
    protected $table = "dbo.ess_users";

    protected $fillable = [
        'employee_code','username','password'
    ];

    protected $hidden = [];
}
