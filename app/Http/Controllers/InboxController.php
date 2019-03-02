<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee_Profiles;
use App\Dashboard as DashboardModel;
use App\Department;
use Auth;
use DB;
use App\PDSInbox;
use App\EmployeeMessage;
use App\RequestStatus;

class InboxController extends Controller
{
    public function index(){
        $Employee_Profiles = Employee_Profiles::
        //   join('aerolink.tbl_hr2_announcement','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr2_announcement.posted_by')
           join('aerolink.tbl_hr4_employee_jobs', 'aerolink.tbl_hr4_employee_profiles.employee_code', '=', 'aerolink.tbl_hr4_employee_jobs.employee_code')
           ->join('aerolink.tbl_hr4_jobs', 'aerolink.tbl_hr4_employee_jobs.job_id', '=', 'aerolink.tbl_hr4_jobs.job_id')
           ->join('aerolink.tbl_hr4_job_classifications', 'aerolink.tbl_hr4_jobs.classification_id', '=', 'aerolink.tbl_hr4_job_classifications.id')
           ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)->get();
           \ACL::newACL($Employee_Profiles);
   
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

           $EmpMessage = EmployeeMessage::select(DB::raw("CONCAT(aerolink.tbl_hr4_employee_profiles.firstname,' ',aerolink.tbl_hr4_employee_profiles.middlename,' ',aerolink.tbl_hr4_employee_profiles.lastname) AS sender"),
           'aerolink.tbl_hr4_jobs.title','aerolink.tbl_hr2_ess_message.message','aerolink.tbl_hr2_ess_message.date_sent')
           ->join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr2_ess_message.sender','=','aerolink.tbl_hr4_employee_profiles.employee_code')
           ->join('aerolink.tbl_hr4_employee_jobs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_jobs.employee_code')
           ->join('aerolink.tbl_hr4_jobs','aerolink.tbl_hr4_employee_jobs.job_id','=','aerolink.tbl_hr4_jobs.job_id')
           ->where('aerolink.tbl_hr2_ess_message.receiver', Auth::user()->employee_code)
           ->latest('aerolink.tbl_hr2_ess_message.created_at')
           ->paginate(5);

           $PDSReq = PDSInbox::select(DB::raw("*,CONCAT('S00',aerolink.tbl_eis_request_status.req_status_id,' - ',aerolink.tbl_eis_request_status.req_status)as req_status,
           aerolink.tbl_hr4_employee_profiles.employee_code,CONCAT(aerolink.tbl_hr4_employee_profiles.firstname,' ',aerolink.tbl_hr4_employee_profiles.middlename,' ',aerolink.tbl_hr4_employee_profiles.lastname) AS fullname"),
           'aerolink.tbl_hr2_ess_req_inbox.field_want_to_change as fc','aerolink.tbl_hr2_ess_req_inbox.data_want_to_change_to as content',
           'aerolink.tbl_hr2_ess_req_inbox.reason','aerolink.tbl_hr2_ess_req_inbox.date_req')
           ->join('aerolink.tbl_eis_request_status','aerolink.tbl_hr2_ess_req_inbox.req_status_id','=','aerolink.tbl_eis_request_status.req_status_id')
           ->join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr2_ess_req_inbox.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
           ->join('aerolink.tbl_hr4_employee_jobs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_jobs.employee_code')
           ->join('aerolink.tbl_hr4_jobs','aerolink.tbl_hr4_employee_jobs.job_id','=','aerolink.tbl_hr4_jobs.job_id')
           ->join('aerolink.tbl_hr4_job_classifications','aerolink.tbl_hr4_jobs.classification_id','=','aerolink.tbl_hr4_job_classifications.id')
           ->join('aerolink.tbl_hr4_department','aerolink.tbl_hr4_jobs.dept_id','=','aerolink.tbl_hr4_department.id')
           ->where([
            ['aerolink.tbl_hr4_job_classifications.id','3'],
            ['aerolink.tbl_hr4_department.dept_name','Human Resources'],
            ['aerolink.tbl_hr2_ess_req_inbox.req_status_id','3']

           ])
           ->orderBy('aerolink.tbl_hr2_ess_req_inbox.req_status_id','desc')
           ->get();

           $PDSReqArchive = PDSInbox::select(DB::raw("*,CONCAT('S00',aerolink.tbl_eis_request_status.req_status_id,' - ',aerolink.tbl_eis_request_status.req_status)as req_status,
           aerolink.tbl_hr4_employee_profiles.employee_code,CONCAT(aerolink.tbl_hr4_employee_profiles.firstname,' ',aerolink.tbl_hr4_employee_profiles.middlename,' ',aerolink.tbl_hr4_employee_profiles.lastname) AS fullname"),
           'aerolink.tbl_hr2_ess_req_inbox.field_want_to_change as fc','aerolink.tbl_hr2_ess_req_inbox.data_want_to_change_to as content',
           'aerolink.tbl_hr2_ess_req_inbox.reason','aerolink.tbl_hr2_ess_req_inbox.date_req')
           ->join('aerolink.tbl_eis_request_status','aerolink.tbl_hr2_ess_req_inbox.req_status_id','=','aerolink.tbl_eis_request_status.req_status_id')
           ->join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr2_ess_req_inbox.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
           ->join('aerolink.tbl_hr4_employee_jobs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_jobs.employee_code')
           ->join('aerolink.tbl_hr4_jobs','aerolink.tbl_hr4_employee_jobs.job_id','=','aerolink.tbl_hr4_jobs.job_id')
           ->join('aerolink.tbl_hr4_job_classifications','aerolink.tbl_hr4_jobs.classification_id','=','aerolink.tbl_hr4_job_classifications.id')
           ->join('aerolink.tbl_hr4_department','aerolink.tbl_hr4_jobs.dept_id','=','aerolink.tbl_hr4_department.id')
           ->where([
            ['aerolink.tbl_hr4_job_classifications.id','3'],
            ['aerolink.tbl_hr4_department.dept_name','Human Resources'],
            ['aerolink.tbl_hr2_ess_req_inbox.req_status_id','<>','3']

           ])
           ->orderBy('aerolink.tbl_hr2_ess_req_inbox.req_status_id','desc')
           ->get();

           $ComposeMessage = Employee_Profiles::select(DB::raw("CONCAT(employee_code,' - ',lastname,' ',firstname,' ',middlename)"))
            ->orderBy('lastname','ASC')->get();

           $ReqStatus = RequestStatus::select(DB::raw("CONCAT('S00',aerolink.tbl_eis_request_status.req_status_id,' - ',aerolink.tbl_eis_request_status.req_status)as req_status"))->get();
           return view('/Employee/modules/inbox',compact('Employee_Profiles','CountMessage','EmpMessage','PDSReq','PDSReqArchive','ReqStatus','ComposeMessage'));
    }
    //For Message
    public function store(Request $request){
        $this->validate($request, [
            'message' => 'required',
        ]); 
        $m = new EmployeeMessage;
        $m->message = $request->input('message');
        $m->sender =  Auth::user()->employee_code;
        $m->receiver = $request->input('empcode');
        $m->save();
    }
    //For Editing Status
    public function updateStatus(Request $request, $id){
        $ChangeStatus = PDSInbox::where("pds_id",$id)->update([ 
            "req_status_id" => substr(explode(" - ", $request->input("req_status"))[0], 3)
        ]);
        return redirect("/Employee/modules/inbox/");
    }
}
