@extends('backend/master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="sub-header">Sửa bài viết</h1>
	<div class="row">
		<form method="post" enctype="multipart/form-data">
			<div class="row" style="margin-bottom:40px">
				<div class="col-xs-8">
					<div class="form-group" >
						<label>Tiêu đề</label>
						<input required type="text" name="name" class="form-control" value="{{$post->post_name}}">
					</div>
					<div class="form-group" >
						<label>Mô tả ngắn</label>
						<input required type="text" name="sum" class="form-control" value="{{$post->post_sum}}">
					</div>
					<div class="form-group" >
						<label>Ảnh dại diện</label>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#featuredimg').click(function(){
                                    $('#uploadimg').click();
                                });
                            });
                        </script>
                        <style type="text/css">
                            #featuredimg{
                                cursor: pointer;
                            }
                        </style>
						<input type="file" id="uploadimg" name="img" class="form-control hidden">
                        <img id="featuredimg" width="300px" class="thumbnail" src="{{asset('public/upload/featured/'.$post->post_img)}}">
					</div>
					<div class="form-group" >
						<label>Nội dung</label>
						<textarea required name="content" class="ckeditor">{{$post->post_content}}</textarea>
					</div>
					<div class="form-group" >
						<label>Danh mục</label>
						<select required name="cat" class="form-control">
                        @foreach($listcat as $cat)
							<option
                            @if($post->post_cat == $cat->cat_id)
                                selected
                            @endif
                             value="{{$cat->cat_id}}">{{$cat->cat_name}}</option>
                        @endforeach
                        </select>
					</div>
					<div class="form-group" >
						<label>Bài viết nổi bật</label><br>
						Có: <input type="radio" name="featured" 
                        @if($post->post_featured == 1)
                            checked
                        @endif
                        value="1">
						Không: <input type="radio" name="featured"
                        @if($post->post_featured == 0)
                            checked
                        @endif
                        value="0">
					</div>
					<input type="submit" name="submit" value="Sửa" class="btn btn-primary">
				</div>
                {{csrf_field()}}
			</div>
		</form>
	</div>
</div>
@stop