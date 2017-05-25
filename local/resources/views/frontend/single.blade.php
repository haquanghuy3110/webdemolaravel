@extends('frontend/master')
@section('title','Bài viết')
@section('content')
<!-- Post -->
<article class="post">
	<header>
		<div class="title">
			<h2>{{$post->post_name}}</h2>
		</div>
		<div class="meta">
			<time class="published" datetime="2015-11-01">{{date('d-m-Y H:i',strtotime($post->post_created))}}</time>
			<span class="author"><span class="name">Huyqha</span><img src="images/logo.png" alt="" /></span>
		</div>
	</header>
	<img class="image featured" src="{{asset('public/upload/featured/'.$post->post_img)}}" alt="" />
	<p>
		{!!$post->post_content!!}
	</p>
	<h3>Bình luận</h3>
	<footer>
		<form method="post">
			<div class="row uniform">
				<div class="6u 12u$(xsmall)">
					<input required type="text" name="name" id="demo-name" value="" placeholder="Tên" />
				</div>
				<div class="6u$ 12u$(xsmall)">
					<input required type="email" name="email" id="demo-email" value="" placeholder="Email" />
				</div>
				<div class="12u$">
					<textarea required name="message" id="message" placeholder="Bình luận của bạn" rows="6"></textarea>
				</div>
				<div class="12u$">
					<ul class="actions">
						<li><input type="submit" value="Bình luận" /></li>
						<li><input type="reset" value="Làm mới" /></li>
					</ul>
				</div>
			</div>
			{{csrf_field()}}
		</form>
	</footer>
	@foreach($listcmt as $comment)
	<div class="row uniform">
		<h4>{{$comment->comment_name}}</h4>
		<blockquote>{{$comment->comment_content}}</blockquote>
	</div>
	@endforeach
</article>
@stop