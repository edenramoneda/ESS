<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee_Profiles;
use Auth;
use App\leave_managementstatus;
use App\TypeOfLeaves;
use App\EmployeeMessage;
use DB;
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
        join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_leave_request_new.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code)->get();
        
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

       $TypeOfLeaves = TypeOfLeaves::get();
       
        return view('Employee/modules/leave', compact('CountMessage','EmpMessage','TypeOfLeaves','LeaveRequest','Employee_Profiles'));
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
