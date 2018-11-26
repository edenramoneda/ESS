<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Employee_Profiles;
class payslip extends Controller
{
    public function emp_payslip()
    {
        $Employee_Profiles = Employee_Profiles::where('employee_code', Auth::user()->employee_code)->get();
        return view('Employee/modules/payslip', compact('Employee_Profiles'));
    }
}
