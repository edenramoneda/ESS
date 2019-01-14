<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee_Profiles;
use App\FamilyBackground;
use App\EmployeeTraining;
use App\EducationalAttainment;
use App\WorkExperience;
use App\AcademicAwards;
use App\GovernmentIDs;
use Auth;
use DB;

class EmployeeController extends Controller
{

    public function __construct(){
        $this->middleware('restrict');
    }
   /* public function info()
    {
        $Employee_Profiles = Employee_Profiles::where('employee_code', Auth::user()->employee_code)->get();
        return view('Employee/modules/info', compact('Employee_Profiles'));
    }*/
    public function pds()
    {
        $Employee_Profiles = Employee_Profiles::
     //   join('aerolink.tbl_hr2_announcement','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr2_announcement.posted_by')
        join('aerolink.tbl_hr4_employee_jobs', 'aerolink.tbl_hr4_employee_profiles.employee_code', '=', 'aerolink.tbl_hr4_employee_jobs.employee_code')
        ->join('aerolink.tbl_hr4_jobs', 'aerolink.tbl_hr4_employee_jobs.job_id', '=', 'aerolink.tbl_hr4_jobs.job_id')
        ->join('aerolink.tbl_hr4_job_classifications', 'aerolink.tbl_hr4_jobs.classification_id', '=', 'aerolink.tbl_hr4_job_classifications.id')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)->get();
        

        $temp_PDS = Employee_Profiles::
        select('aerolink.tbl_hr4_employee_profiles.employee_code',
        'aerolink.tbl_hr4_employee_profiles.firstname',
        'aerolink.tbl_hr4_employee_profiles.middlename',
        'aerolink.tbl_hr4_employee_profiles.lastname',
        'aerolink.tbl_hr4_employee_profiles.date_of_birth',
        'aerolink.tbl_hr4_employee_profiles.place_of_birth',
        'aerolink.tbl_hr4_employee_profiles.height',
        'aerolink.tbl_hr4_employee_profiles.weight',
        'aerolink.tbl_hr4_employee_profiles.contact_number as epCN',
        'aerolink.tbl_hr4_employee_profiles.email as epE',
        'aerolink.tbl_hr4_employees.datehired as datehired',
        'aerolink.tbl_hr4_jobs.title as jobTitle',
        'aerolink.tbl_hr4_department.dept_name',
        'aerolink.tbl_hr4_job_designations.designation',
        'aerolink.tbl_hr4_employeeTypes.type_name',
        'aerolink.tbl_hr1_suffix.suffix_name',
        'aerolink.tbl_hr1_civil_status.civil_status',
        'aerolink.tbl_hr4_employee_FB.complete_name as fbcomname',
        'aerolink.tbl_hr4_employee_FB.relationship as fbr',
        'aerolink.tbl_hr4_employee_FB.contact_number as fbcn',
        'aerolink.tbl_hr4_employee_FB.isEC as EmCon')
        ->join('aerolink.tbl_hr4_employee_jobs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_jobs.employee_code')
        ->join('aerolink.tbl_hr4_jobs','aerolink.tbl_hr4_employee_jobs.job_id','=','aerolink.tbl_hr4_jobs.job_id')
        ->join('aerolink.tbl_hr4_department','aerolink.tbl_hr4_jobs.dept_id','=','aerolink.tbl_hr4_department.id')
        ->join('aerolink.tbl_hr4_job_designations','aerolink.tbl_hr4_jobs.designation_id','=','aerolink.tbl_hr4_job_designations.id')
        ->join('aerolink.tbl_hr4_employees','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employees.employee_code')
        ->join('aerolink.tbl_hr4_employeeTypes','aerolink.tbl_hr4_employees.type_id','=','aerolink.tbl_hr4_employeeTypes.type_id')
        ->join('aerolink.tbl_hr1_suffix','aerolink.tbl_hr4_employee_profiles.suffix_id','=','aerolink.tbl_hr1_suffix.id')
        ->join('aerolink.tbl_hr1_civil_status','aerolink.tbl_hr4_employee_profiles.civil_status_id','=','aerolink.tbl_hr1_civil_status.id')
        ->join('aerolink.tbl_hr4_employee_FB','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_FB.employee_code')
        ->where([
                ['aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code],
                ['aerolink.tbl_hr4_employee_FB.isEC ', '=', '1']
            ])->get();

        $FamilyBackground = FamilyBackground::
        join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr4_employee_FB.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code)->get();

        $EducationalAttainment = EducationalAttainment::
        join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr4_employee_educAttain.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code)->get();

        $EmployeeTraining = EmployeeTraining::
        join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr4_employee_trainingSeminars.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code)->get();

        $EmployeeWorkExp = WorkExperience::
        join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr4_employee_workExp.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code)->get();

        $AcademicAwards = AcademicAwards::
        join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr4_employee_academicAwards.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code)->get();

        $GovIDs = GovernmentIDs::
        join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr4_employee_governmentIDs.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code)->get();

      //  $employee = $temp_PDS[0];
        return view('Employee/modules/pds', compact('Employee_Profiles', 'temp_PDS','FamilyBackground','EmployeeTraining'
    ,'EducationalAttainment','EmployeeWorkExp','AcademicAwards','GovIDs'));
    }

}
