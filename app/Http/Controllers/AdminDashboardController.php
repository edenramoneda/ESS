<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee_Profiles;
use App\Dashboard as DashboardModel;
use App\leave_managementstatus;
use App\Department;
use Auth;
use DB;
use App\EmployeeMessage;
use App\EmployeePerformance;
use App\EmployeeWeekdays;
class AdminDashboardController extends Controller
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

           $Schedule = EmployeeWeekdays::join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_weekdays.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
           ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)
           ->get();
           
       /*    $EmpPerformance = EmployeePerformance::join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr1_perfGrading.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
           ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)->get();*/
           $EmpPerformance = EmployeePerformance::select(DB::raw("*,(productivity + qualityofwork + Initiative + teamwork + 
           problemsolving + attendance/6)as average"))
           //->table('aerolink.tbl_hr1_perfGrading')
           ->join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr1_perfGrading.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
           ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)
           ->get();
          //  response()->json($EmpPerformance);
           
           $Announcement = DashboardModel::
           join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr2_announcement.posted_by','=','aerolink.tbl_hr4_employee_profiles.employee_code')
           ->orderBY('aerolink.tbl_hr2_announcement.date','desc')
           ->get();
   
           $CountLeaveRequests = leave_managementstatus::select(DB::raw("COUNT(*) as count_leave"))
           ->join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_leave_request_new.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
           ->where([
           ['aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code],
           ['aerolink.tbl_hr3_leave_request_new.isCurrent', "1"],
           ])
           ->get();

           $CountEmployees = Employee_Profiles::select(DB::raw("COUNT(*) as no_of_employees, aerolink.tbl_hr4_department.dept_name"))
           ->join('aerolink.tbl_hr4_employee_jobs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_jobs.employee_code')
           ->join('aerolink.tbl_hr4_jobs','aerolink.tbl_hr4_employee_jobs.job_id','=','aerolink.tbl_hr4_jobs.job_id')
           ->join('aerolink.tbl_hr4_department','aerolink.tbl_hr4_jobs.dept_id','=','aerolink.tbl_hr4_department.id')
           ->groupBy('aerolink.tbl_hr4_department.dept_name')
           ->get();

           $Department = Department::select(DB::raw("COUNT(*) as department"))
           ->get();

           $Employees = Employee_Profiles::select(DB::raw("COUNT(*) as employees"))
           ->get();

           $CountRankAndFile = Employee_Profiles::select(DB::raw("COUNT(*)as rank_and_files"))
           ->join('aerolink.tbl_hr4_employee_FB','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_FB.employee_code')
           ->join('aerolink.tbl_hr1_civil_status','aerolink.tbl_hr4_employee_profiles.civil_status_id','=','aerolink.tbl_hr1_civil_status.id')
           ->join('aerolink.tbl_hr4_employee_jobs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_jobs.employee_code')
           ->join('aerolink.tbl_hr4_jobs','aerolink.tbl_hr4_employee_jobs.job_id','=','aerolink.tbl_hr4_jobs.job_id')
           ->join('aerolink.tbl_hr4_job_classifications','aerolink.tbl_hr4_jobs.classification_id','=','aerolink.tbl_hr4_job_classifications.id')
           ->join('aerolink.tbl_hr4_department','aerolink.tbl_hr4_jobs.dept_id','=','aerolink.tbl_hr4_department.id')
           ->join('aerolink.tbl_hr4_employees','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employees.employee_code')
           ->join('aerolink.tbl_hr4_employeeTypes','aerolink.tbl_hr4_employees.type_id','=','aerolink.tbl_hr4_employeeTypes.type_id')
           ->join('aerolink.tbl_hr4_job_designations','aerolink.tbl_hr4_jobs.designation_id','=','aerolink.tbl_hr4_job_designations.id')
           ->where([
            ['aerolink.tbl_hr4_employee_FB.isEC','1'],
            ['aerolink.tbl_hr4_job_classifications.id','3'],
            ['aerolink.tbl_hr4_department.dept_name','Human Resources']
           ])
           ->get();
           //return $CountEmployees;
           return view('/Employee/modules/admin-dashboard', compact('EmpPerformance','Schedule','CountMessage','CountLeaveRequests','EmpMessage','Announcement','Employee_Profiles',
           'CountEmployees','Department','Employees','CountRankAndFile'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'announcement_title' => 'required',
            'announcement_content' => 'required',
        ]); 
        $a = new DashboardModel;
        $a->announcement_title= $request->input('announcement_title');
        $a->announcement_content= $request->input('announcement_content');
        $a->posted_by = Auth::user()->employee_code;  
        $a->save();
    }
}
