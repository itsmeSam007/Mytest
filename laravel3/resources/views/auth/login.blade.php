@extends('layouts.master')
@section('title')
        Login
@stop		
@section('body') 
<div class="container">
	
		<div class="row">	
			<!-- ................................ LOGIN FORM ................................ -->
				<div class="col-sm-6 col-md-4 col-md-offset-4">
					<h1 class="text-center login-title">Sign in to continue to Site</h1>
					<div class="account-wall">
						<img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
							alt="">
						<form class="form-signin" role="form" method="POST" action="login">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
						<input type="password" name="password" class="form-control" placeholder="Password" required>
						<button class="btn btn-lg btn-primary btn-block" type="submit">
							Sign in</button>
						<label class="checkbox pull-left">
							<input type="checkbox" value="remember-me">
							Remember me
						</label>
						<a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
						{!! Form::close() !!}
						
					</div>
					<a href="<?php echo url(); ?>/user/create" class="text-center new-account">Create an account </a>
					
				</div>
			<!-- ................................ LOGIN FORM ................................ -->
		</div>
</div>    
@stop