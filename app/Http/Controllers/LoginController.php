<?php

namespace App\Http\Controllers;
use Validator; //validate form class
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Employee_Profiles;
use App\EmployeeJobs;
use ACL;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    function checkLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required | max:45',
            'password' => 'required | alphaNum | min:3'
        ]);

        $user_data = array(
            'username' => $request->get('username'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            return redirect('/Employee/modules/dashboard');
        }else
        {
            return back()->with('error' , 'Incorrect Username or Password');
        }
    }

   /* function successLogin()
    {
        if(!Auth::user()){
            return redirect()->route('empLog');
        }

        $Employee_Profiles = Employee_Profiles::
        join('aerolink.tbl_hr4_employee_jobs', 'aerolink.tbl_hr4_employee_profiles.employee_code', '=', 'aerolink.tbl_hr4_employee_jobs.employee_code')
        ->join('aerolink.tbl_hr4_jobs', 'aerolink.tbl_hr4_employee_jobs.job_id', '=', 'aerolink.tbl_hr4_jobs.job_id')
        ->join('aerolink.tbl_hr4_job_classifications', 'aerolink.tbl_hr4_jobs.classification_id', '=', 'aerolink.tbl_hr4_job_classifications.id')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)->get();
        
        ACL::newACL($Employee_Profiles);
    
        return view('Employee/modules/dashboard', compact('Employee_Profiles'));
   //  $ep = new Employee_Profiles();
    //   dd($ep->employeeJobs());
      //  $ep = Employee_Profiles::with('employeeJobs')->get();
     //   dd($Employee_Profiles);
      //  echo $Employee_Profiles;
      //  dd(EmployeeJobs::with('jobs')->get());
    }*/
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
