@extends('backend/master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="sub-header">Thêm bài viết</h1>
	<div class="row">
        @include('errors/alert')
		<form method="post" enctype="multipart/form-data">
			<div class="row" style="margin-bottom:40px">
				<div class="col-xs-8">
					<div class="form-group" >
						<label>Tiêu đề</label>
						<input required type="text" name="name" class="form-control">
					</div>
					<div class="form-group" >
						<label>Mô tả ngắn</label>
						<input required type="text" name="sum" class="form-control">
					</div>
					<div class="form-group" >
						<label>Ảnh dại diện</label>
						<input required type="file" name="img" class="form-control">
					</div>
					<div class="form-group" >
						<label>Nội dung</label>
						<textarea required name="content" class="ckeditor"></textarea>
                        <script type="text/javascript">
                            var editor = CKEDITOR.replace('content',{
                                language:'vi',
                                filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
                                filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
                                filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                            });
                        </script>


					</div>
					<div class="form-group" >
						<label>Danh mục</label>
						<select required name="cat" class="form-control">
                        @foreach($listcat as $cat)
							<option value="{{$cat->cat_id}}">{{$cat->cat_name}}</option>
                        @endforeach
                        </select>
					</div>
					<div class="form-group" >
						<label>Bài viết nổi bật</label><br>
						Có: <input type="radio" name="featured" value="1">
						Không: <input type="radio" checked name="featured" value="0">
					</div>
					<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
				</div>
                {{csrf_field()}}
			</div>
		</form>
	</div>
</div>
@stop