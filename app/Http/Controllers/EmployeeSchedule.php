<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee_Profiles;
use App\employeeScheduleModel;
use App\timeSheetModel;
use App\EmployeeWeekdays;
use App\EmployeeMessage;
use DB;
use Validator;
use Auth;
use Calendar;
class EmployeeSchedule extends Controller
{
    public function index()
    {

        $Employee_Profiles = Employee_Profiles::
        //   join('aerolink.tbl_hr2_announcement','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr2_announcement.posted_by')
           join('aerolink.tbl_hr4_employee_jobs', 'aerolink.tbl_hr4_employee_profiles.employee_code', '=', 'aerolink.tbl_hr4_employee_jobs.employee_code')
           ->join('aerolink.tbl_hr4_jobs', 'aerolink.tbl_hr4_employee_jobs.job_id', '=', 'aerolink.tbl_hr4_jobs.job_id')
           ->join('aerolink.tbl_hr4_job_classifications', 'aerolink.tbl_hr4_jobs.classification_id', '=', 'aerolink.tbl_hr4_job_classifications.id')
           ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)->get();

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


        $TimeSheet = timesheetModel::join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr2_temp_timesheet.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)
        ->get();
        return view('Employee/modules/schedule', compact('CountMessage','EmpMessage','Schedule','TimeSheet','Employee_Profiles'));
    }
}
