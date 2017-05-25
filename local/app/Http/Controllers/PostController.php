<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
class PostController extends HomeController
{
    //
    public function getPost($id){
    	$data['listcmt'] = DB::table('vp_comment')->where('comment_post',$id)->orderBy('comment_id','desc')->get();
    	$data['post'] = DB::table('vp_post')->where('post_id',$id)->first();
    	return view('frontend/single',$data);
    }

    public function commentPost(Request $request, $id){
    	$arr = [
    		'comment_post'=>$id,
    		'comment_name'=>$request->name,
    		'comment_email'=>$request->email,
    		'comment_content'=>$request->message,
    		'comment_created'=>gmdate('Y-m-d H:i:s',time()+7*3600)
    	];
    	DB::table('vp_comment')->insert($arr);
    	return redirect()->back();
    }

    public function getCat($id){
        $data['listpost'] = DB::table('vp_post')->join('vp_cat','vp_post.post_cat','=','vp_cat.cat_id')->where('post_cat',$id)->orderBy('post_id','desc')->paginate(2);
        return view('frontend/index',$data);
    }
    public function getSearch(){
        //Nhận lại giá trị từ ajax truyền sang thông qua phương thức get
        $kw = $_GET['s'];
        $keyword = str_replace(' ','%',$kw);
        $listpost = DB::table('vp_post')->where('post_name','like','%'.$keyword.'%')->get();
        //Trả về kết quả cho ajax
        foreach($listpost as $post){
            echo '<div class="alert alert-info"><a target="_blank" href="'.asset('post/'.$post->post_id.'/'.$post->post_slug.'.html').'">'.$post->post_name.'</a></div>';
        }
    }
}
