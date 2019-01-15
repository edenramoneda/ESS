<?php

namespace App\Http\Controllers;
use App\Employee_Profiles;
use App\AccountSettings;
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
           
        $AccountSettings = AccountSettings::
        join('aerolink.tbl_hr4_employee_profiles','dbo.ess_users.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)->get();
        return view('/Employee/AccountSettings',compact('Employee_Profiles','AccountSettings'));
    }
}
