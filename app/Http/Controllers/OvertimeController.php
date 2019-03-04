<?php

namespace App\Http\Controllers;
use App\Employee_Profiles;
use Auth;
use Illuminate\Http\Request;
use App\RequestOvertime;
use App\EmployeeMessage;
use DB;

class OvertimeController extends Controller
{
    public function index(){
        $Employee_Profiles = Employee_Profiles::
        // select("concat('aerolink.tbl_hr4_employee_profiles.firstname,' ',aerolink.tbl_hr4_employee_profiles.middlename,' ',aerolink.tbl_hr4_employee_profiles.lastname') as fullname")
         join('aerolink.tbl_hr4_employee_jobs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_jobs.employee_code')
         ->join('aerolink.tbl_hr4_employees','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employees.employee_code')
         ->join('aerolink.tbl_hr4_jobs','aerolink.tbl_hr4_employee_jobs.job_id','=','aerolink.tbl_hr4_jobs.job_id')
         ->join('aerolink.tbl_hr4_department','aerolink.tbl_hr4_jobs.dept_id','=','aerolink.tbl_hr4_department.id')
         ->join('aerolink.tbl_hr4_employeeTypes','aerolink.tbl_hr4_employees.type_id','=','aerolink.tbl_hr4_employeeTypes.type_id')
         ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)
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

        $Overtime = RequestOvertime::join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_overtime.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where([
            ['aerolink.tbl_hr3_overtime.isCurrent', '=','1'],
            ['aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code]
            ])
            ->orderBy("aerolink.tbl_hr3_overtime.created_at","desc")
            ->get();
        
         $OvertimeHistory = RequestOvertime::join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_overtime.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where([
            ['aerolink.tbl_hr3_overtime.isCurrent', '=','0'],
            ['aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code]
            ])
            ->orderBy("aerolink.tbl_hr3_overtime.created_at","desc")
            ->get();

            $ComposeMessage = Employee_Profiles::select(DB::raw("CONCAT(employee_code,' - ',lastname,' ',firstname,' ',middlename) as employee"))
            ->orderBy('lastname','ASC')->get();
       
         return view('/Employee/modules/overtime',compact('CountMessage','EmpMessage','Overtime','OvertimeHistory','Employee_Profiles','ComposeMessage'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'overtime_hours' => 'required',
            'overtime_reason' => 'required'
        ]); 
        $ot = new RequestOvertime;
        $ot->employee_code = Auth::user()->employee_code;
        $ot->date = date("l Y-m-d");
        $ot->overtime_hours = $request->input('overtime_hours');
        $ot->reason = $request->input('overtime_reason');
        $ot->status = "Pending";
        $ot->save();
    }
    public function filterOvertimeData(){
        $OvertimeData =  DB::table('aerolink.tbl_hr3_overtime')
        ->join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_overtime.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where([
            ['aerolink.tbl_hr3_overtime.isCurrent', '=','0'],
            ['aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code]
            ])
            ->orderBy("aerolink.tbl_hr3_overtime.created_at","desc")
            ->get();
       
        return response($OvertimeData);
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
