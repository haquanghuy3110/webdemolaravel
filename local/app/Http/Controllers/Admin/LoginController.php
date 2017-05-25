<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Session;
class LoginController extends Controller
{
    //
    public function createUser(){
    	$arr = [
    		'user_name'=>'k31',
    		'user_password'=>md5('123456'),
    		'user_level'=>1,
    		'user_created'=>gmdate('Y-m-d H:i:s',time()+7*3600)
    	];
    	DB::table('vp_user')->insert($arr);
    }

    public function getLogin(){
    	return view('backend/login/login');
    }

    public function postLogin(Request $request){
    	$arr = [
    		'user_name'=>$request->username,
    		'user_password'=>md5($request->password)
    	];
    	if(DB::table('vp_user')->where($arr)->count()>=1){
    		Session::flash('success','Đăng nhập thành công');
    		$data = DB::table('vp_user')->where($arr)->first();
    		Session::put('login',$data);
    		return redirect()->intended('admin/home');
    	}else{
    		Session::flash('error','Tài khoản hoặc mật khẩu không đúng!');
    		return redirect()->back();
    	}
    }
}