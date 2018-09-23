<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function info()
    {
        return view('Employee/modules/info');
    }
    public function pds()
    {
        return view('Employee/modules/pds');
    }

}
