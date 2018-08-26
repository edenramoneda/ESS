<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function settings()
    {
        return view('Employee/modules/settings');
    }
}
