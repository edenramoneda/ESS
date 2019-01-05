<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee_Profiles;
use Auth;

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
        'aerolink.tbl_hr4_employee_FB.complete_name as cn',
        'aerolink.tbl_hr4_employee_FB.relationship as fbr',
        'aerolink.tbl_hr4_employee_FB.contact_number as fbcn',
        'aerolink.tbl_hr4_employee_educAttain.educ_level as el',
        'aerolink.tbl_hr4_employee_educAttain.school as s',
        'aerolink.tbl_hr4_employee_educAttain.course as c',
        'aerolink.tbl_hr4_employee_educAttain.duration as ead',
        'aerolink.tbl_hr4_employee_trainingSeminars.title as tsTitle',
        'aerolink.tbl_hr4_employee_trainingSeminars.duration as tsD',
        'aerolink.tbl_hr4_employee_trainingSeminars.type as tsT',
        'aerolink.tbl_hr4_employee_trainingSeminars.conducted_by as tsCB',
        'aerolink.tbl_hr4_employee_workExp.duration as ewD',
        'aerolink.tbl_hr4_employee_workExp.position as ewP',
        'aerolink.tbl_hr4_employee_workExp.company as ewC',
        'aerolink.tbl_hr4_employee_workExp.employment_status as ewES',
        'aerolink.tbl_hr4_employee_certifications.certification_title as ecC',
        'aerolink.tbl_hr4_employee_certifications.date_acquired as ecDA',
        'aerolink.tbl_hr4_employee_certifications.date_expiration as ecDE',
        'aerolink.tbl_hr4_employee_academicAwards.title as aaT',
        'aerolink.tbl_hr4_employee_academicAwards.date_awarded as aaDA',
        'aerolink.tbl_hr4_employee_governmentIDs.SSS_num as egSSS',
        'aerolink.tbl_hr4_employee_governmentIDs.TIN_num as egTIN',
        'aerolink.tbl_hr4_employee_governmentIDs.Pagibig_num as egPAGIBIG',
        'aerolink.tbl_hr4_employee_governmentIDs.Philhealth_num as egPhilHealth')
        ->join('aerolink.tbl_hr4_employee_jobs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_jobs.employee_code')
        ->join('aerolink.tbl_hr4_jobs','aerolink.tbl_hr4_employee_jobs.job_id','=','aerolink.tbl_hr4_jobs.job_id')
        ->join('aerolink.tbl_hr4_department','aerolink.tbl_hr4_jobs.dept_id','=','aerolink.tbl_hr4_department.id')
        ->join('aerolink.tbl_hr4_job_designations','aerolink.tbl_hr4_jobs.designation_id','=','aerolink.tbl_hr4_job_designations.id')
        ->join('aerolink.tbl_hr4_employees','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employees.employee_code')
        ->join('aerolink.tbl_hr4_employeeTypes','aerolink.tbl_hr4_employees.type_id','=','aerolink.tbl_hr4_employeeTypes.type_id')
        ->join('aerolink.tbl_hr1_suffix','aerolink.tbl_hr4_employee_profiles.suffix_id','=','aerolink.tbl_hr1_suffix.id')
        ->join('aerolink.tbl_hr1_civil_status','aerolink.tbl_hr4_employee_profiles.civil_status_id','=','aerolink.tbl_hr1_civil_status.id')
        ->join('aerolink.tbl_hr4_employee_FB','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_FB.employee_code')
        ->join('aerolink.tbl_hr4_employee_educAttain','aerolink.tbl_hr4_employee_profiles.employee_code','=','tbl_hr4_employee_educAttain.employee_code')
        ->join('aerolink.tbl_hr4_employee_trainingSeminars','aerolink.tbl_hr4_employee_profiles.employee_code','=','tbl_hr4_employee_trainingSeminars.employee_code')
        ->join('aerolink.tbl_hr4_employee_workExp','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_workExp.employee_code')
        ->join('aerolink.tbl_hr4_employee_certifications','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_certifications.employee_code')
        ->join('aerolink.tbl_hr4_employee_academicAwards','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_academicAwards.employee_code')
        ->join('aerolink.tbl_hr4_employee_governmentIDs','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr4_employee_governmentIDs.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code ', Auth::user()->employee_code)
        ->get();
        return view('Employee/modules/pds', compact('Employee_Profiles'));
    }

}
