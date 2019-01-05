<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee_Profiles;
use App\employeeScheduleModel;
use Validator;
use Auth;
use Calendar;
class EmployeeSchedule extends Controller
{
    public function index()
    {

     //   $schedule = employeeScheduleModel::get();
       // $schedule_list = [];
        /*foreach($schedule as $key => $s){
            $schedule_list[] = Calendar::s(
                $s->monday,true,
                tuesday,true,
                wednesday,true,
                thursday,true,
                friday,true
            );
        }
        $calendar_details = Calendar::addEvents( $schedule_list);
        */
        $Employee_Profiles = Employee_Profiles::
        select('aerolink.tbl_hr4_employee_profiles.employee_code',
        'aerolink.tbl_hr3_CreateSchedule.Monday as Mon',
        'aerolink.tbl_hr3_CreateSchedule.Tuesday as Tue',
        'aerolink.tbl_hr3_CreateSchedule.Wednesday as Wed',
        'aerolink.tbl_hr3_CreateSchedule.Thursday as Thurs',
        'aerolink.tbl_hr3_CreateSchedule.Friday as Fri'
        )
        ->join('aerolink.tbl_hr3_CreateSchedule','aerolink.tbl_hr4_employee_profiles.employee_code','=','aerolink.tbl_hr3_CreateSchedule.ID')
        ->where('aerolink.tbl_hr4_employee_profiles.employee_code', Auth::user()->employee_code)
        ->get();
        return view('Employee/modules/schedule', compact('Employee_Profiles'));
    }
}
