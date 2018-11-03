
@extends('layout')

@section('content')

	<div class="col-xs-12 col-sm-6 col-md-8 blog-main">

	@if (session('notice'))
    <div class="alert alert-success">
        {{ session('notice') }}
    </div>
	@endif 

	<ul>
	@foreach ($posts as $post)
		<li>
			<h1> 
				<a href="/posts/{{ $post->id }}"> {{ $post->title }} </a> </h1>
			<span>
				<div> <strong> Auth: </strong> {{ $post->user->name }} 
				on <span> {{ $post->created_at->diffForHumans() }} </span>
				</div>
				{{ $post->body }}
			</span>
		</li>
		<hr>
	@endforeach
	</ul>

	</div>

    @include("layouts.sidebar")


@endsection

