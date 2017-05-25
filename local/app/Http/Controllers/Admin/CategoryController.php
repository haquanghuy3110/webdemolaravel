<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Session;
class CategoryController extends Controller
{
    //
    public function getAddCat(){
    	return view('backend/cat/addcat');
    }

    public function postAddCat(Request $request){
    	$arr = [
    		'cat_name'=>$request->name,
    		'cat_slug'=>str_slug($request->name)
    	];
    	if(DB::table('vp_cat')->where('cat_name',$request->name)->count()>=1){
    		Session::flash('error','Tên danh mục bị trùng');
    		return redirect()->back();
    	}else{
    		Session::flash('success','Thêm danh mục thành công');
    		DB::table('vp_cat')->insert($arr);
    		return redirect()->back();
    	}
    }

    public function getViewCat(){
    	$data['listcat'] = DB::table('vp_cat')->paginate(2);
    	return view('backend/cat/listcat',$data);
    }

    public function getEditCat($id){
    	$data['cat'] = DB::table('vp_cat')->where('cat_id',$id)->first();
    	return view('backend/cat/editcat',$data);
    }

    public function postEditCat(Request $request,$id){
    	$arr = [
    		'cat_name'=>$request->name,
    		'cat_slug'=>str_slug($request->name)
    	];
    	DB::table('vp_cat')->where('cat_id',$id)->update($arr);
    	Session::flash('success','Cập nhật thành công');
    	return redirect()->intended('admin/cat/view');
    }

    public function getDelPost($id){
    	DB::table('vp_cat')->where('cat_id',$id)->delete();
    	Session::flash('success','Xóa thành công');
    	return redirect()->intended('admin/cat/view');
    }
}
