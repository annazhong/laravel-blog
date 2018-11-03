@extends ('layout')

@section ('content')

	<div class="col-sm-6 blog-main">
		<h1>Register</h1>
		<hr>
		<form action="/register" method="POST">

			{{ csrf_field() }}

			<div class="form-group">
			    <label for="username"> Name : </label> 
				<input type="text" name="username" class="form-control">
			</div>

			<div class="form-group">
				<label for="email"> Email : </label> 
				<input type="text" name="email" class="form-control">
			</div>

			<div class="form-group">
				<label for="password"> Password : </label> 
				<input type="password" name="password" class="form-control">
			</div>


			<div class="form-group">
				<label for="password-confirmation"> Password Confirm : </label> 
				<input type="password" name="password_confirmation" class="form-control">
			</div>

			<div class="form-group">
			    <button class="btn btn-primary" type="submit" name="register"> Register </button> 
			    &nbsp; &nbsp; <a href="\login">Login</a>
			</div>

		    @include('layouts.errors')

		</form>
	</div>

@endsection
