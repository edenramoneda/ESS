<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee_Profiles;
use App\Dashboard as DashboardModel;
use Auth;

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

        
        $Announcement = DashboardModel::
        join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr2_announcement.posted_by','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->get();
        //dd($Employee_Profiles);
        return view('/Employee/modules/dashboard', compact('Announcement','Employee_Profiles'));
    }
}
