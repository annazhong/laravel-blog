@extends ('layout')

@section ('content')

	<div class="col-sm-6 blog-main">
		<h1>Login</h1>
		<hr>
		<form action="/login" method="POST">

			{{ csrf_field() }}

			<div class="form-group">
			    <label for="name"> Name : </label> 
				<input type="text" name="name" class="form-control">
			</div>

			<div class="form-group">
				<label for="password"> Password : </label> 
				<input type="password" name="password" class="form-control">
			</div>

			<div class="form-group">
			    <button class="btn btn-primary" type="submit" name="login"> Login </button>
				&nbsp; &nbsp; <a href="\register">Register</a>
			</div>

		    @include('layouts.errors')

		</form>
	</div>

@endsection
