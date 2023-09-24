<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function ChangePassword(){
        return view('admin.body.CPassword');
    }

    public function ChangeProfile(){
       
        return view('admin.body.CProfile');
    }
}
