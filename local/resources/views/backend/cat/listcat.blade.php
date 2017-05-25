@extends('backend/master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="sub-header">Danh mục bài viết</h1>
  <a href="{{asset('admin/cat/add')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Thêm</a>
  <div class="table-responsive">
    @include('errors/alert')
    <table class="table table-bordered">
      <thead>
        <tr class="bg-primary">
          <th>#</th>
          <th>Tên danh mục</th>
          <th style="width:16%">Tùy chọn</th>
        </tr>
      </thead>
      <tbody>
      @foreach($listcat as $value)
        <tr>
          <td>{{$value->cat_id}}</td>
          <td>{{$value->cat_name}}</td>
          <td>
            <a href="{{asset('admin/cat/edit/'.$value->cat_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
            <a href="{{asset('admin/cat/del/'.$value->cat_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    {{$listcat->links()}}
  </div>
</div>
@stop