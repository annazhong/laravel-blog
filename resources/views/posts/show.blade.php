
@extends('layout')

@section('content')
	<div class="blog-main col-sm-8">
		<h1> {{ $post->title }} </h1>

		{{ $post->body }}

		<hr>

		<br>
		<strong>Comments: </strong>
		@if ($post->comments)

		<ul class="list-group">

			@foreach ($post->comments as $comment)

			<li class="list-group-item">

				<strong>
					{{ $comment->created_at->diffForHumans() }} : &nbsp;
				</strong>

				{{ $comment->body }}

			</li>

			@endforeach

		</ul>

		@endif

		<hr>

		{{-- add a comment --}}

		<div class="card" >

			<div class="card-block">

				<form action="/posts/{{ $post->id }}" method="POST">

					{{ csrf_field() }}

				    <div class="form-group">

				    	<textarea class="form-control" id="comment" name="comment" placeholder="Your comment here." required></textarea>

				    	<!-- <input type="hidden" value="{{ $post->id }}" name="post_id"> -->

				    </div>

				    <div class="form-group">

				    	<button type="submit" class="btn btn-primary">Add Comment

				    	</button>

				    </div>

				    <br>

					@include("layouts.errors")

				</form>
			</div>
		</div>

	</div>

@endsection
