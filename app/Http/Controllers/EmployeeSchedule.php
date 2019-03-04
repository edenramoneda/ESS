<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee_Profiles;
use App\employeeScheduleModel;
use App\timeSheetModel;
use App\EmployeeWeekdays;
use App\EmployeeMessage;
use App\ScheduleRequests;
use DB;
use Validator;
use Auth;
use Calendar;
class EmployeeSchedule extends Controller
{
    public function index(Request $request)
    {

        $Employee_Profiles = Employee_Profiles::
     //   join('aerolink.tbl_hr2_announcement','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr2_announcement.posted_by')
        join('aerolink.tbl_hr4_employee_jobs', 'aerolink.tbl_hr4_employee_profiles.employee_code', '=', 'aerolink.tbl_hr4_employee_jobs.employee_code')
        ->join('aerolink.tbl_hr4_jobs', 'aerolink.tbl_hr4_employee_jobs.job_id', '=', 'aerolink.tbl_hr4_jobs.job_id')
        ->join('aerolink.tbl_hr4_job_classifications', 'aerolink.tbl_hr4_jobs.classification_id', '=', 'aerolink.tbl_hr4_job_classifications.id')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)->get();

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

        $Schedule = EmployeeWeekdays::join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_weekdays.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)
        ->get();


        $TimeSheet = timesheetModel::join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_timesheet.employee_id','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code', '=',Auth::user()->employee_code)
        ->orderBy('aerolink.tbl_hr3_timesheet.created_at', 'desc')
        ->get();
        
    /*    $TimeSheetCB = timesheetModel::join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_timesheet.employee_id','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)
        ->get();*/
        //Schedule Requests
        $ScheduleRequests = ScheduleRequests:://join('aerolink.tbl_hr3_shift_status_new','aerolink.tbl_hr3_shifting_request.employee_code','=','aerolink.tbl_hr3_shift_status_new.employee_code')
        join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_shifting_request.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)
        ->orderBy("aerolink.tbl_hr3_shifting_request.created_at","desc")
        ->get();

        $ComposeMessage = Employee_Profiles::select(DB::raw("CONCAT(employee_code,' - ',lastname,' ',firstname,' ',middlename) as employee"))
        ->orderBy('lastname','ASC')->get();

        return view('Employee/modules/schedule', compact('TimeSheetCB','ScheduleRequests','CountMessage','EmpMessage','Schedule','TimeSheet','Employee_Profiles','ComposeMessage'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'sched_name' => 'required',
            'sched_reason' => 'required',
        ]); 
        $sr = new ScheduleRequests;
        $sr->date = date('l Y-m-d');
        $sr->employee_code = Auth::user()->employee_code;
        $sr->schedule = $request->input('sched_name');
        $sr->reason = $request->input('sched_reason');
        $sr->save();
    }

    public function reloadTable(){
        $data = DB::table('aerolink.tbl_hr3_timesheet')
        ->join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_timesheet.employee_id','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)
        ->orderBy('aerolink.tbl_hr3_timesheet.created_at', 'desc')
        ->get();
        return response($data);
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
    public function replyMessage(Request $request){
        $this->validate($request, [
            'replyempcode' => 'required',
            'reply_message' => 'required'
        ]);
        $SendMessage = new EmployeeMessage;
        $SendMessage->receiver = $request->input("replyempcode");
        $SendMessage->message = $request->input("reply_message");
        $SendMessage->sender = Auth::user()->employee_code;
        $SendMessage->save();

    }
}
