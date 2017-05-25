<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
class HomeController extends Controller
{
    //
	public function __construct(){
		$data['listcat'] = DB::table('vp_cat')->get();
		$data['featured'] = DB::table('vp_post')->where('post_featured',1)->orderBy('post_id','desc')->get();
		//phương thức view()->share() giúp truyền dữ liệu đến tất cả các view được tải lên
		view()->share($data);
	}

    public function getIndex(){
    	$data['listpost'] = DB::table('vp_post')->join('vp_cat','vp_post.post_cat','=','vp_cat.cat_id')->orderBy('post_id','desc')->paginate(2);
    	return view('frontend/index',$data);
    }
}
