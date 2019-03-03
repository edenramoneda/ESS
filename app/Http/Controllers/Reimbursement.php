<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee_Profiles;
use Auth;
use App\ReimbursementModel;
use App\EmployeeMessage;
use DB;
class Reimbursement extends Controller
{
    public function index()
    {
        $Employee_Profiles = Employee_Profiles::
        // select("concat('aerolink.tbl_hr4_employee_profiles.firstname,' ',aerolink.tbl_hr4_employee_profiles.middlename,' ',aerolink.tbl_hr4_employee_profiles.lastname') as fullname")
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

        $Reimbursement = ReimbursementModel::
        join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_reimbursement_request.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where([
            ['aerolink.tbl_hr3_reimbursement_request.isCurrent','=','1'],
            ['aerolink.tbl_hr4_employee_profiles.employee_code', '=', Auth::user()->employee_code]
            ])
        ->orderBy('aerolink.tbl_hr3_reimbursement_request.created_at','desc')
        ->get();

        $ReimbursementHistory = ReimbursementModel::
        join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_reimbursement_request.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where([
            ['aerolink.tbl_hr3_reimbursement_request.isCurrent','=','0'],
            ['aerolink.tbl_hr4_employee_profiles.employee_code', '=', Auth::user()->employee_code]
            ])
        ->orderBy('aerolink.tbl_hr3_reimbursement_request.created_at','desc')
        ->get();
        
        $ComposeMessage = Employee_Profiles::select(DB::raw("CONCAT(employee_code,' - ',lastname,' ',firstname,' ',middlename) as employee"))
        ->orderBy('lastname','ASC')->get();

        return view('Employee/modules/reimbursement', compact('CountMessage','EmpMessage','Reimbursement','ReimbursementHistory','Employee_Profiles','ComposeMessage'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'expenses' => 'required',
            'particulars' => 'required',
            'attachment' => 'required',
        ]); 
        $reimburse = new ReimbursementModel;
        $reimburse->date = date('l Y-m-d');
        $reimburse->employee_code = Auth::user()->employee_code;
        $reimburse->expenses = $request->input('expenses');
        $reimburse->particulars = $request->input('particulars');
        $reimburse->attachment = $request->input('attachment');
        $reimburse->status = "Pending";
        $reimburse->save();
    }
    public function filterReimburseHData(){
        $ReimbursementHData =  DB::table('aerolink.tbl_hr3_reimbursement_request')
        ->join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_reimbursement_request.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where([
            ['aerolink.tbl_hr3_reimbursement_request.isCurrent','=','0'],
            ['aerolink.tbl_hr4_employee_profiles.employee_code', '=', Auth::user()->employee_code]
            ])
        ->orderBy('aerolink.tbl_hr3_reimbursement_request.created_at','desc')
        ->get();
        return response($ReimbursementHData);
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
