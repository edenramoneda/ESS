<?php

namespace App\Http\Controllers;


class ACL {

    public static function newACL($user) {
        session(['user' => $user]);
        return true;
    }
    
    public static function userACL(){
        return session('user') !== null ? ( (object) session('user'))[0] : false;
    }
    
    public static function logout(){
        session()->forget('user');
    }

}

?>