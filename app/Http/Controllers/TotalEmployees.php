<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee_Profiles;
use App\Dashboard as DashboardModel;
use App\Department;
use Auth;
use DB;
use App\CivilStatus;
use App\EmployeeMessage;

class TotalEmployees extends Controller
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

           $EmpMessage = EmployeeMessage::select(DB::raw("aerolink.tbl_hr4_employee_profiles.employee_code,CONCAT(aerolink.tbl_hr4_employee_profiles.firstname,' ',aerolink.tbl_hr4_employee_profiles.middlename,' ',aerolink.tbl_hr4_employee_profiles.lastname) AS sender"),
           'aerolink.tbl_hr4_jobs.title','aerolink.tbl_hr2_ess_message.message','aerolink.tbl_hr2_ess_message.date_sent')
           ->join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr2_ess_message.sender','=','aerolink.tbl_hr4_employee_profiles.employee_code')
           ->join('aerolink.tbl_hr4_employee_jobs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_jobs.employee_code')
           ->join('aerolink.tbl_hr4_jobs','aerolink.tbl_hr4_employee_jobs.job_id','=','aerolink.tbl_hr4_jobs.job_id')
           ->where('aerolink.tbl_hr2_ess_message.receiver', Auth::user()->employee_code)
           ->latest('aerolink.tbl_hr2_ess_message.created_at')
           ->paginate(5);

           $AllEmployees = Employee_Profiles::select(DB::raw("*,CONCAT(aerolink.tbl_hr4_employee_profiles.firstname,' ',aerolink.tbl_hr4_employee_profiles.middlename,' ',aerolink.tbl_hr4_employee_profiles.lastname) as fullname"))
           ->join('aerolink.tbl_hr4_employee_jobs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_jobs.employee_code')
           ->join('aerolink.tbl_hr4_jobs','aerolink.tbl_hr4_employee_jobs.job_id','=','aerolink.tbl_hr4_jobs.job_id')
           ->join('aerolink.tbl_hr4_job_classifications','aerolink.tbl_hr4_jobs.classification_id','=','aerolink.tbl_hr4_job_classifications.id')
           ->join('aerolink.tbl_hr4_department','aerolink.tbl_hr4_jobs.dept_id','=','aerolink.tbl_hr4_department.id')
           ->join('aerolink.tbl_hr4_employees','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employees.employee_code')
           ->join('aerolink.tbl_hr4_employeeTypes','aerolink.tbl_hr4_employees.type_id','=','aerolink.tbl_hr4_employeeTypes.type_id')
           ->join('aerolink.tbl_hr4_job_designations','aerolink.tbl_hr4_jobs.designation_id','=','aerolink.tbl_hr4_job_designations.id')
           ->orderBy('aerolink.tbl_hr4_job_classifications.id','asc')
           ->orderBy('aerolink.tbl_hr4_department.dept_name','asc')
           ->get();

           $CountEP = Employee_Profiles::select(DB::raw("COUNT(*)as total_employees"))
           ->get();

           $CountRankAndFile = Employee_Profiles::select(DB::raw("*,aerolink.tbl_hr4_employee_FB.contact_number as EmergCN,
           CONCAT('CS00',aerolink.tbl_hr1_civil_status.id,' - ',aerolink.tbl_hr1_civil_status.civil_status) as csName,
           aerolink.tbl_hr4_employee_profiles.contact_number as epCN,CONCAT(aerolink.tbl_hr4_employee_profiles.firstname,' ',aerolink.tbl_hr4_employee_profiles.middlename,' ',aerolink.tbl_hr4_employee_profiles.lastname) as fullname"))
           ->join('aerolink.tbl_hr4_employee_FB','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_FB.employee_code')
           ->join('aerolink.tbl_hr1_civil_status','aerolink.tbl_hr4_employee_profiles.civil_status_id','=','aerolink.tbl_hr1_civil_status.id')
           ->join('aerolink.tbl_hr4_employee_jobs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_jobs.employee_code')
           ->join('aerolink.tbl_hr4_jobs','aerolink.tbl_hr4_employee_jobs.job_id','=','aerolink.tbl_hr4_jobs.job_id')
           ->join('aerolink.tbl_hr4_job_classifications','aerolink.tbl_hr4_jobs.classification_id','=','aerolink.tbl_hr4_job_classifications.id')
           ->join('aerolink.tbl_hr4_department','aerolink.tbl_hr4_jobs.dept_id','=','aerolink.tbl_hr4_department.id')
           ->join('aerolink.tbl_hr4_employees','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employees.employee_code')
           ->join('aerolink.tbl_hr4_employeeTypes','aerolink.tbl_hr4_employees.type_id','=','aerolink.tbl_hr4_employeeTypes.type_id')
           ->join('aerolink.tbl_hr4_job_designations','aerolink.tbl_hr4_jobs.designation_id','=','aerolink.tbl_hr4_job_designations.id')
           ->orderBy('aerolink.tbl_hr4_department.dept_name','asc')
           ->orderBy('aerolink.tbl_hr4_job_classifications.id','asc')
           ->where([
            ['aerolink.tbl_hr4_employee_FB.isEC','1'],
            ['aerolink.tbl_hr4_job_classifications.id','3'],
            ['aerolink.tbl_hr4_department.dept_name','Human Resources']
           ])
           ->get();

           $CivilStatus = CivilStatus::select(DB::raw(" CONCAT('CS00',aerolink.tbl_hr1_civil_status.id,' - ',aerolink.tbl_hr1_civil_status.civil_status) as csName"))
           ->get();
           //filter employee by department
           $FilterEmployee = Department::all();
          
           $ComposeMessage = Employee_Profiles::select(DB::raw("CONCAT(employee_code,' - ',lastname,' ',firstname,' ',middlename) as employee"))
           ->orderBy('lastname','ASC')->get();
            
           return view('/Employee/modules/employees',compact('Employee_Profiles','CountMessage','EmpMessage','AllEmployees','CountRankAndFile','CivilStatus','FilterEmployee','CountEP','ComposeMessage'));
    }
    public function update(Request $request, $id)
    {
        
        
    }

    public function updateEmp(Request $request, $id)
    {
        $UpdateEU = Employee_Profiles::where("employee_code",$id)->update([
            "firstname" => $request->input("firstname"),
            "middlename" => $request->input("middlename"),
            "lastname" => $request->input("lastname"),
            "height" => $request->input("height"),
            "weight" => $request->input("weight"),    
            "civil_status_id" => substr(explode(" - ", $request->input("cs"))[0], 4),
            "contact_number" => $request->input("cn"),
            "email" => $request->input("email"),
            "address" => $request->input("address"),
        ]);
        return redirect("/Employee/modules/employees/");
    }
    public function filterEmployeeByDept(){
        $AllEmployees = Employee_Profiles::select(DB::raw("*,CONCAT(aerolink.tbl_hr4_employee_profiles.firstname,' ',aerolink.tbl_hr4_employee_profiles.middlename,' ',aerolink.tbl_hr4_employee_profiles.lastname) as fullname"))
        ->join('aerolink.tbl_hr4_employee_jobs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_jobs.employee_code')
        ->join('aerolink.tbl_hr4_jobs','aerolink.tbl_hr4_employee_jobs.job_id','=','aerolink.tbl_hr4_jobs.job_id')
        ->join('aerolink.tbl_hr4_job_classifications','aerolink.tbl_hr4_jobs.classification_id','=','aerolink.tbl_hr4_job_classifications.id')
        ->join('aerolink.tbl_hr4_department','aerolink.tbl_hr4_jobs.dept_id','=','aerolink.tbl_hr4_department.id')
        ->join('aerolink.tbl_hr4_employees','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employees.employee_code')
        ->join('aerolink.tbl_hr4_employeeTypes','aerolink.tbl_hr4_employees.type_id','=','aerolink.tbl_hr4_employeeTypes.type_id')
        ->join('aerolink.tbl_hr4_job_designations','aerolink.tbl_hr4_jobs.designation_id','=','aerolink.tbl_hr4_job_designations.id')
        ->orderBy('aerolink.tbl_hr4_job_classifications.id','asc')
        ->orderBy('aerolink.tbl_hr4_department.dept_name','asc')
        ->get();

        return response($AllEmployees);
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
