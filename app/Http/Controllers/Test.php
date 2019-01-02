<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee_Profiles;
use Auth;
class Test extends Controller
{
    public function sample(){
    
    $Employee_Profiles = Employee_Profiles::all();

    echo $Employee_Profiles;//->employeeJobs->job_id;
    return view('/test', compact('Employee_Profiles'));
}

}
