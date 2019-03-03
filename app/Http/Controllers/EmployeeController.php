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
use App\EmployeeMessage;
use App\AdminReqInbox;
use Auth;
use DB;
use PDF;
class EmployeeController extends Controller
{

    public function __construct(){
        $this->middleware('restrict');
    }
    public function index()
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
        'aerolink.tbl_hr4_employee_profiles.address',
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
           // return $temp_PDS;
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
        $ComposeMessage = Employee_Profiles::select(DB::raw("CONCAT(employee_code,' - ',lastname,' ',firstname,' ',middlename) as employee"))
        ->orderBy('lastname','ASC')->get();
        
        return view('Employee/modules/pds', compact('CountMessage','Employee_Profiles','EmpMessage', 'temp_PDS','FamilyBackground','EmployeeTraining'
    ,'EducationalAttainment','EmployeeWorkExp','AcademicAwards','GovIDs','ComposeMessage'));

    
  //  $temp_PDS = PDF::loadView('Employee/modules/pds',compact('temp_PDS'));
    return $temp_PDS->download('PDS.pdf');
    }
    public function generatePDS(){

        $pds = \App::make('dompdf.wrapper');
        $pds->loadHTML($this->convert_data_into_html());
        return $pds->stream();
    }
    public function convert_data_into_html(){
        $temp_PDS = $this->pds();
        $output = '
        <h3 align="center">Personal Data Sheet</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
            <tr>
            <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
            <th style="border: 1px solid; padding:12px;" width="30%">Date Hired</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Department</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Designation</th>
            <th style="border: 1px solid; padding:12px;" width="20%">Employee Type</th>
        </tr>
        ';

        foreach($temp_PDS as $EmpPDS){
            $output .= '
            <tr>
            <td style="border: 1px solid; padding:12px;">'. $EmpPDS->firstname .'</td>
            <td style="border: 1px solid; padding:12px;">'. $EmpPDS->datehired .'</td>
            <td style="border: 1px solid; padding:12px;">'. $EmpPDS->dept_name .'</td>
            <td style="border: 1px solid; padding:12px;">'. $EmpPDS->designation .'</td>
            <td style="border: 1px solid; padding:12px;">'. $EmpPDS->type_name .'</td>
           </tr>
            ';
        }
        $output .= '</table>';
        return $output;
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'field_name' => 'required',
            'change_data_to' => 'required',
            'pds_reason' => 'required',
        ]); 
        $req_pds = new AdminReqInbox;
        $req_pds->employee_code = Auth::user()->employee_code;
        $req_pds->field_want_to_change= $request->input('field_name');
        $req_pds->data_want_to_change_to = $request->input('change_data_to');
        $req_pds->reason = $request->input('pds_reason');
        $req_pds->date_req = date('l Y-m-d');  
        $req_pds->save();
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
