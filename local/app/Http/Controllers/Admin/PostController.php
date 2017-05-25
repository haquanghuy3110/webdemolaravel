<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Session;
class PostController extends Controller
{
    //
    public function getAddPost(){
    	$data['listcat'] = DB::table('vp_cat')->get();
    	return view('backend/post/addpost',$data);
    }

    public function postAddPost(Request $request){
    	$arr = [
    		'post_name'=>$request->name,
    		'post_slug'=>str_slug($request->name),
    		'post_cat'=>$request->cat,
    		'post_content'=>$request->content,
    		'post_sum'=>$request->sum,
    		'post_featured'=>$request->featured,
    		'post_created'=>gmdate('Y-m-d H:i:s',time()+7*3600),
    	];
    	$file_name = $_FILES['img']['name'];
    	$tmp_name = $_FILES['img']['tmp_name'];
    	$file_path = 'public/upload/featured/'.$file_name;
    	move_uploaded_file($tmp_name,$file_path);
    	$arr['post_img'] = $file_name;
    	Session::flash('success','Thêm thành công');
    	DB::table('vp_post')->insert($arr);
    	return redirect()->intended('admin/post/view');
    }

    public function getViewPost(){
    	$data['listpost'] = DB::table('vp_post')->join('vp_cat','vp_post.post_cat','=','vp_cat.cat_id')->paginate(1);
    	return view('backend/post/listpost',$data);
    }

    public function getEditPost($id){
        $data['listcat'] = DB::table('vp_cat')->get();
        $data['post'] = DB::table('vp_post')->where('post_id',$id)->first();
        return view('backend/post/editpost',$data);
    }

    public function postEditPost(Request $request,$id){
        $arr = [
            'post_name'=>$request->name,
            'post_slug'=>str_slug($request->name),
            'post_cat'=>$request->cat,
            'post_content'=>$request->content,
            'post_sum'=>$request->sum,
            'post_featured'=>$request->featured,
            'post_created'=>gmdate('Y-m-d H:i:s',time()+7*3600),
        ];
        if($_FILES['img']['name'] == ''){
            //Chọn ảnh cũ
            $img_name = DB::table('vp_post')->select('post_img')->where('post_id',$id)->first();
            $file_name = $img_name->post_img;
        }else{
            //Chọn và upload ảnh mới
            $file_name = $_FILES['img']['name'];
            $tmp_name = $_FILES['img']['tmp_name'];
            $file_path = 'public/upload/featured/'.$file_name;
            move_uploaded_file($tmp_name,$file_path);
        }
        $arr['post_img'] = $file_name;
        Session::flash('success','Sửa thành công');
        DB::table('vp_post')->where('post_id',$id)->update($arr);
        return redirect()->intended('admin/post/view');
    }

    public function getDelPost($id){
        DB::table('vp_post')->where('post_id',$id)->delete();
        Session::flash('success','Xóa thành công');
        return redirect()->intended('admin/post/view');
    }
}