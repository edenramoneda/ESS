<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee_Profiles;
use Auth;
use App\leave_managementstatus;
use App\TypeOfLeaves;

class RequestLeave extends Controller
{
    public function index()
    {
        $Employee_Profiles = Employee_Profiles::
     //   join('aerolink.tbl_hr2_announcement','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr2_announcement.posted_by')
        join('aerolink.tbl_hr4_employee_jobs', 'aerolink.tbl_hr4_employee_profiles.employee_code', '=', 'aerolink.tbl_hr4_employee_jobs.employee_code')
        ->join('aerolink.tbl_hr4_jobs', 'aerolink.tbl_hr4_employee_jobs.job_id', '=', 'aerolink.tbl_hr4_jobs.job_id')
        ->join('aerolink.tbl_hr4_job_classifications', 'aerolink.tbl_hr4_jobs.classification_id', '=', 'aerolink.tbl_hr4_job_classifications.id')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)->get();

        $LeaveRequest = leave_managementstatus::
        join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_leave_management_status.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code)->get();
       
       $TypeOfLeaves = TypeOfLeaves::get();
       
        return view('Employee/modules/leave', compact('TypeOfLeaves','LeaveRequest','Employee_Profiles'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'type_leaves' => 'required',
            'reason' => 'required',
            'leave_days' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]); 
        $leave_stats = new leave_managementstatus;
        $leave_stats->date_requested = date('l Y-m-d');
        $leave_stats->employee_code = Auth::user()->employee_code;
        $leave_stats->type_of_leave = $request->input('type_leaves');
        $leave_stats->reason = $request->input('reason');
        $leave_stats->day_of_leave = $request->input('leave_days');
        $leave_stats->start_date = $request->input('start_date');
        $leave_stats->end_date = $request->input('end_date');
        $leave_stats->status = "Pending";
        $leave_stats->save();

  //   echo $leave_stats->type_of_leave = $request->input('type_leaves');
    }
}
