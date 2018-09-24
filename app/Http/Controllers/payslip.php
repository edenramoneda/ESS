<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class payslip extends Controller
{
    public function emp_payslip()
    {
        return view('Employee/modules/payslip');
    }
}
