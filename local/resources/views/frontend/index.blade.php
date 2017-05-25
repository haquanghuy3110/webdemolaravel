@extends('frontend/master')
@section('title','Trang chủ')
@section('content')
<!-- Post -->
@foreach($listpost as $post)
<article class="post">
	<header>
		<div class="title">
			<h2><a href="{{asset('post/'.$post->post_id.'/'.$post->post_slug.'.html')}}">{{$post->post_name}}</a></h2>
		</div>
		<div class="meta">
			<time class="published" datetime="11-01-2015">{{date('d-m-Y H:i',strtotime($post->post_created))}}</time>
			<span class="author"><span class="name">Huyqha</span><img src="images/logo.png" alt="" /></span>
		</div>
	</header>
	<a href="{{asset('post/'.$post->post_id.'/'.$post->post_slug.'.html')}}" class="image featured"><img src="{{asset('public/upload/featured/'.$post->post_img)}}" alt="" /></a>
	<p>{{$post->post_sum}}</p>
	<footer>
		<ul class="actions">
			<li><a href="{{asset('post/'.$post->post_id.'/'.$post->post_slug.'.html')}}" class="button big">Đọc tiếp</a></li>
		</ul>
		<ul class="stats">
			<li><a href="{{asset('cat/'.$post->cat_id.'/'.$post->cat_slug.'.html')}}">{{$post->cat_name}}</a></li>
		</ul>
	</footer>
</article>
@endforeach
<!-- Pagination -->

<ul class="actions pagination">
	{{$listpost->links()}}
</ul>
@stop