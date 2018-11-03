@extends('layout')

@section("content")

    <div class="col-sm-8 blog-main">

	<h1>Publish a post</h1>
	<hr>

	<form action="/posts" method="POST">

	  {{ csrf_field() }}

	  <div class="form-group">
	    <label for="title">Title</label>
	    <input type="text" class="form-control" name="title">
	  </div>

	  <div class="form-group">
	    <label for="content">Content</label>
	    <textarea class="form-control" name="content"></textarea> 
	  </div>


	  <div class="form-group">
	  <button type="submit" class="btn btn-primary">Publish</button>
	  </div>

	  @include('layouts.errors')

	</form>

    </div>


@endsection
