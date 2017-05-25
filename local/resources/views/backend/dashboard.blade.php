@extends('backend/master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main ">
        <div class="text-justify jumbotron">
          @include('errors/alert')
          <h1>Xin chào!</h1>
          <p>Chào mừng bạn đến với trang quản trị của Huyqha Blog. </p>
         
          
          <p><a class="btn btn-primary btn-lg" href="" role="button" target="_blank">Learn more &raquo;</a></p>
        </div>
</div>
@stop