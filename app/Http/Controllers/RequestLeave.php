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

        $LeaveRequestNew = leave_managementstatus::
        join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_leave_request_new.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where([
            ['aerolink.tbl_hr3_leave_request_new.isCurrent', '=','1'],
            ['aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code],
            ])
            ->orderBy("aerolink.tbl_hr3_leave_request_new.created_at","desc")
            ->get();
        
        $LeaveRequestHistory = leave_managementstatus::
        join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_leave_request_new.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where([
            ['aerolink.tbl_hr3_leave_request_new.isCurrent', '=','0'],
            ['aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code],
            ])
            ->orderBy("aerolink.tbl_hr3_leave_request_new.created_at","desc")
            ->get();
        
        $EmpMessage = EmployeeMessage::select(DB::raw("aerolink.tbl_hr4_employee_profiles.employee_code,CONCAT(aerolink.tbl_hr4_employee_profiles.firstname,' ',aerolink.tbl_hr4_employee_profiles.middlename,' ',aerolink.tbl_hr4_employee_profiles.lastname) AS sender"),
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

      $ComposeMessage = Employee_Profiles::select(DB::raw("CONCAT(employee_code,' - ',lastname,' ',firstname,' ',middlename) as employee"))
           ->orderBy('lastname','ASC')->get();
       
        return view('Employee/modules/leave', compact('LeaveRequestHistory','CountMessage','EmpMessage','TypeOfLeaves','LeaveRequestNew','Employee_Profiles','ComposeMessage'));
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
        $leave_stats->date = date('l Y-m-d');
        $leave_stats->employee_code = Auth::user()->employee_code;
        $leave_stats->leave_name = $request->input('type_leaves');
        $leave_stats->reason = $request->input('reason');
        $leave_stats->range_leave = $request->input('leave_days');
        $leave_stats->date_start = $request->input('start_date');
        $leave_stats->date_end = $request->input('end_date');
        $leave_stats->save();

  //   echo $leave_stats->type_of_leave = $request->input('type_leaves');
    }
    public function filterLeaveHistory(){
        $LeaveRequestHistoryData =  DB::table('aerolink.tbl_hr3_leave_request_new')
        ->join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_leave_request_new.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where([
            ['aerolink.tbl_hr3_leave_request_new.isCurrent', '=','0'],
            ['aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code],
            ])
            ->orderBy("aerolink.tbl_hr3_leave_request_new.created_at","desc")
            ->get();
        return response($LeaveRequestHistoryData);
    }
    public function composeMessage(Request $request){
        $this->validate($request, [
            'send_to' => 'required',
            'send_message' => 'required'
        ]);
        $SendMessage = new EmployeeMessage;
        $SendMessage->receiver = $request->input("send_to");
        $SendMessage->message = $request->input("send_message");
        $SendMessage->sender = Auth::user()->employee_code;
        $SendMessage->save();

    }
}
