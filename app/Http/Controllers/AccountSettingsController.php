<?php

namespace App\Http\Controllers;
use App\Employee_Profiles;
use App\AccountSettings;
use App\EmployeeMessage;
use DB;
use Auth;
use Illuminate\Http\Request;

class AccountSettingsController extends Controller
{
    //
    public function account_settings(){

        //for sidebar
        $Employee_Profiles = Employee_Profiles::
        //   join('aerolink.tbl_hr2_announcement','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr2_announcement.posted_by')
           join('aerolink.tbl_hr4_employee_jobs', 'aerolink.tbl_hr4_employee_profiles.employee_code', '=', 'aerolink.tbl_hr4_employee_jobs.employee_code')
           ->join('aerolink.tbl_hr4_jobs', 'aerolink.tbl_hr4_employee_jobs.job_id', '=', 'aerolink.tbl_hr4_jobs.job_id')
           ->join('aerolink.tbl_hr4_job_classifications', 'aerolink.tbl_hr4_jobs.classification_id', '=', 'aerolink.tbl_hr4_job_classifications.id')
           ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)->get();
        
        $CountMessage = EmployeeMessage::select(DB::raw("COUNT(*) as Message"))
        ->where([
            ['aerolink.tbl_hr2_ess_message.receiver', '=',Auth::user()->employee_code],
            ['aerolink.tbl_hr2_ess_message.isUnread', '=',1]
            ])
        ->get();

        $EmpMessage = EmployeeMessage::select(DB::raw("aerolink.tbl_hr4_employee_profiles.employee_code,CONCAT(aerolink.tbl_hr4_employee_profiles.firstname,' ',aerolink.tbl_hr4_employee_profiles.middlename,' ',aerolink.tbl_hr4_employee_profiles.lastname) AS sender"),
        'aerolink.tbl_hr4_jobs.title','aerolink.tbl_hr2_ess_message.message','aerolink.tbl_hr2_ess_message.date_sent')
        ->join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr2_ess_message.sender','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->join('aerolink.tbl_hr4_employee_jobs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_jobs.employee_code')
        ->join('aerolink.tbl_hr4_jobs','aerolink.tbl_hr4_employee_jobs.job_id','=','aerolink.tbl_hr4_jobs.job_id')
        ->where('aerolink.tbl_hr2_ess_message.receiver', Auth::user()->employee_code)
        ->latest('aerolink.tbl_hr2_ess_message.created_at')
        ->paginate(5);


        $AccountSettings = AccountSettings::
        join('aerolink.tbl_hr4_employee_profiles','dbo.ess_users.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)->get();

        $ComposeMessage = Employee_Profiles::select(DB::raw("CONCAT(employee_code,' - ',lastname,' ',firstname,' ',middlename) as employee"))
        ->orderBy('lastname','ASC')->get();

        return view('/Employee/AccountSettings',compact('Employee_Profiles','CountMessage','EmpMessage','AccountSettings','ComposeMessage'));
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
