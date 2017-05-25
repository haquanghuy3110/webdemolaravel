<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
Use Session,DB;
class HomeController extends Controller
{
    //
    public function getHome(){
    	return view('backend/dashboard');
    }

    public function getLogout(){
    	Session::forget('login');
    	return redirect()->intended('login');
    }
}
