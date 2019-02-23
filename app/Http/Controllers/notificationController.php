<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class notificationController extends Controller
{
    public function callNotifs() {
        $this->middleware('auth');
        $notifs = DB::select('EXEC CheckNotifs_HR2 ?', array(Auth::user()->employee_code));
        return response([
            "notifs" => $notifs
        ]);
    }
    
    public function callChangeNotifs(){
        $this->middleware('auth');
        $notifs = DB::select('EXEC getAllRequest_ESS ?', array(Auth::user()->employee_code));
        return response([
            "notifs" => $notifs
        ]);
    }
}
