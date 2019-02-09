<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payslipModel extends Model
{
    protected $table = 'aerolink.tbl_hr2_dummy_payroll';

    protected $fillable = [
        'payroll_id','employee_code','basic','overtime','allowance','sss','pag_ibig','philhealth','sss_loan',
      'pag_ibig_loan','tax','late','date_period','date_released'];

    protected $hidden = [];
}
