<?php

namespace App\Http\Controllers;
use Validator; //validate form class
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Employee_Profiles;

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
            return redirect('/Employee');
        }else
        {
            return back()->with('error' , 'Incorrect Username or Password');
        }
    }

    function successLogin()
    {
        $Employee_Profiles = DB::table('aerolink.tbl_hr4_employee_profiles')
        ->where('employee_code', Auth::user()->employee_code)
        ->get();
        return view('Employee/home', compact('Employee_Profiles'));

    }
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
