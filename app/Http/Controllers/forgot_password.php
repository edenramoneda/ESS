<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class forgot_password extends Controller
{
    public function fp()
    {
        return view('forgot-password');
    }
}
