<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="{{asset('public/Layout/backend')}}/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico"> 
    <title>Trang quản trị | Huyqha Blog</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/jquery.js')}}"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{asset('admin/home')}}">Huyqha Blog</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{asset('admin/home')}}" target="">Trang Chủ</a></li>
            <li><a href="{{asset('admin/logout')}}">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid ">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="{{asset('admin/home')}}"><span class="glyphicon glyphicon-home"></span> Trang Chủ <span class="sr-only"></span></a></li>
            <li class=""><a href="{{asset('admin/post/view')}}"><span class="glyphicon glyphicon-book"></span> Bài viết </a></li>
            <li class=""><a href="{{asset('admin/cat/view')}}"><span class="glyphicon glyphicon-list"></span> Danh mục</a></li>
           
          </ul>
        </div>
        
        <div style="clear: both"></div>
        <!--Main here-->
        @yield('content')
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
