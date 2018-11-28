<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee_Profiles;
use Auth;

class EmployeeDTR extends Controller
{
    public function index()
    {
        $Employee_Profiles = Employee_Profiles::where('employee_code', Auth::user()->employee_code)->get();
        return view('Employee/modules/dtr', compact('Employee_Profiles'));
    }
}