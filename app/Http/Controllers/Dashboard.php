<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee_Profiles;
use App\Dashboard as DashboardModel;
use App\leave_managementstatus;
use Auth;
use DB;
use App\EmployeeMessage;
use App\EmployeePerformance;
use App\EmployeeWeekdays;
class Dashboard extends Controller
{
    public function __construct(){
        $this->middleware('restrict');
    }

    public function index()
    {
        if(!Auth::user()){
            return redirect()->route('empLog');
        }

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
        ->where('aerolink.tbl_hr2_announcement.isDeleted','0')
        ->get();

        $CountLeaveRequests = leave_managementstatus::select(DB::raw("COUNT(*) as count_leave"))
        ->join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_leave_request_new.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where([
            ['aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code],
            ['aerolink.tbl_hr3_leave_request_new.isCurrent', "1"],
            ])
        ->get();
        //dd($Employee_Profiles);
        return view('/Employee/modules/dashboard', compact('EmpPerformance','Schedule','CountMessage','CountLeaveRequests','EmpMessage','Announcement','Employee_Profiles'));
    }
}
