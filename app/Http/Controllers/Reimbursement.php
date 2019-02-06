<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee_Profiles;
use Auth;
use App\ReimbursementModel;

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

        $Reimbursement = ReimbursementModel::
        join('aerolink.tbl_hr4_employee_profiles','aerolink.tbl_hr3_reimbursement_request.employee_code','=','aerolink.tbl_hr4_employee_profiles.employee_code')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code ', '=', Auth::user()->employee_code)->get();
        return view('Employee/modules/reimbursement', compact('Reimbursement','Employee_Profiles'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'or_no' => 'required',
            'cash_received' => 'required',
            'particulars' => 'required',
            'attachment' => 'required',
            'total_amount' => 'required'
        ]); 
        $reimburse = new ReimbursementModel;
        $reimburse->date_requested = date('l Y-m-d');
        $reimburse->employee_code = Auth::user()->employee_code;
        $reimburse->or_no = $request->input('or_no');
        $reimburse->recieved = $request->input('cash_received');
        $reimburse->particulars = $request->input('particulars');
        $reimburse->attachment = $request->input('attachment');
        $reimburse->total_amount = $request->input('total_amount');
        $reimburse->status = "Pending";
        $reimburse->save();

    }
}
