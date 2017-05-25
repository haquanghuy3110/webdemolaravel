@extends('backend/master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="sub-header">Danh sách bài viết</h1>
  <a href="{{asset('admin/post/add')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Thêm</a>
  @include('errors/alert')
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr class="bg-primary">
          <th>#</th>
          <th>Tên bài viết</th>
          <th>Danh mục</th>
          <th>Ảnh đại diện</th>
          <th>Ngày tạo</th>
          <th>Ngày sửa</th>
          <th style="width:16%">Tùy chọn</th>
        </tr>
      </thead>
      <tbody>
      @foreach($listpost as $post)
        <tr>
          <td>{{$post->post_id}}</td>
          <td>{{$post->post_name}}</td>
          <td>{{$post->cat_name}}</td>
          <td><img width="150px" class="img-thumbnail" src="{{asset('public/upload/featured/'.$post->post_img)}}"></td>
          <td>{{$post->post_created}}</td>
          <td>{{$post->post_updated}}</td>
          <td>
            <a href="{{asset('admin/post/edit/'.$post->post_id)}}" class="btn btn-warning ">Sửa</a>
            <a onclick="return confirm('Bạn có thật lòng muốn xóa!?')" href="{{asset('admin/post/del/'.$post->post_id)}}" class="btn btn-danger ">Xóa</a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    {{$listpost->links()}}
  </div>
</div>
@stop