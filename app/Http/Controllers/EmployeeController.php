<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee_Profiles;
use Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        //personal data sheet
        Employee_Profiles::j­oin('tbl_hr4_employe­e_jobs', 'tbl_hr4_employee_pr­ofiles.employee_code­', '=', 'tbl_hr4_employee_jo­bs.employee_code', 'inner')
        ->join('tbl_hr4_jobs­', 'tbl_hr4_employee_jo­bs.job_id', '=', 'tbl_hr4_jobs.job_id­', 'inner')
        ->join('tbl_hr4_employees','tbl_hr4_employees.employee_code', '=' , 'tbl_hr4_employee_profiles.employee_code','inner')
        ->where('tbl­_hr4_employee_profil­es.employee_code', Auth::user()->employ­ee_code)->get();
        
        return view('Employee/­home', compact('Employee_Pr­ofiles'));

    }
    public function info()
    {
        $Employee_Profiles = Employee_Profiles::where('employee_code', Auth::user()->employee_code)->get();
        return view('Employee/modules/info', compact('Employee_Profiles'));
    }
    public function pds()
    {
        $Employee_Profiles = Employee_Profiles::where('employee_code', Auth::user()->employee_code)->get();
        return view('Employee/modules/pds', compact('Employee_Profiles'));
    }

}
