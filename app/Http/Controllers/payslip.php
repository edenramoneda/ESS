<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Employee_Profiles;
use App\EmployeeMessage;
use DB;
class payslip extends Controller
{
    public function emp_payslip()
    {
        $Employee_Profiles = Employee_Profiles::
        join('aerolink.tbl_hr4_employee_jobs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_jobs.employee_code')
        ->join('aerolink.tbl_hr4_employees','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employees.employee_code')
        ->join('aerolink.tbl_hr4_jobs','aerolink.tbl_hr4_employee_jobs.job_id','=','aerolink.tbl_hr4_jobs.job_id')
        ->join('aerolink.tbl_hr4_department','aerolink.tbl_hr4_jobs.dept_id','=','aerolink.tbl_hr4_department.id')
        ->join('aerolink.tbl_hr4_employeeTypes','aerolink.tbl_hr4_employees.type_id','=','aerolink.tbl_hr4_employeeTypes.type_id')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)
        ->get();

        $EmpMessage = EmployeeMessage::select(DB::raw("CONCAT(aerolink.tbl_hr4_employee_profiles.firstname,' ',aerolink.tbl_hr4_employee_profiles.middlename,' ',aerolink.tbl_hr4_employee_profiles.lastname) AS sender"),
        'aerolink.tbl_hr4_jobs.title','aerolink.tbl_hr2_ess_message.message','aerolink.tbl_hr2_ess_message.date_sent')
        ->join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr2_ess_message.sender','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->join('aerolink.tbl_hr4_employee_jobs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_jobs.employee_code')
        ->join('aerolink.tbl_hr4_jobs','aerolink.tbl_hr4_employee_jobs.job_id','=','aerolink.tbl_hr4_jobs.job_id')
        ->where('aerolink.tbl_hr2_ess_message.receiver', Auth::user()->employee_code)
        ->latest('aerolink.tbl_hr2_ess_message.created_at')
        ->paginate(5);

        $CountMessage = EmployeeMessage::select(DB::raw("COUNT(*) as Message"))
        ->where([
            ['aerolink.tbl_hr2_ess_message.receiver', '=',Auth::user()->employee_code],
            ['aerolink.tbl_hr2_ess_message.isUnread', '=',1]
            ])
        ->get();
        return view('Employee/modules/payslip', compact('CountMessage','EmpMessage','Employee_Profiles'));
    }
}
