@extends('layouts.master')
@section('title')
        Registration
@stop		
@section('body') 
<div class="container">
	
		<div class="row">			
	
		  <div class="span8">
			<div class="alert alert-success" style="display:none">
			  Well done! You successfully read this important alert message.
			</div>

			<!-- <form class="form-horizontal" id="registerHere" method='post' action=''> -->
			{!! Form::open(['route' => 'user.store']) !!}
			
			@if($errors->any())
				<ul class="alert alert-danger">
					@foreach($errors->all() as $error)
						<li>{!! $error !!}</li>
					@endforeach
				</ul>
			@endif
			  <fieldset>
				<legend>Registration</legend>
				<div class="control-group">
					<label class="control-label" for="input01">Name</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="username" name="username" rel="popover" data-content="Enter your first and last name." data-original-title="Full Name">
						</div>
				</div>
			
			<div class="control-group">
				<label class="control-label" for="input01">Email</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="email" name="email" rel="popover" data-content="What’s your email address?" data-original-title="Email">
				   
				  </div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="input01">Password</label>
				  <div class="controls">
					<input type="password" class="input-xlarge" id="password" name="password" rel="popover" data-content="6 characters or more! Be tricky" data-original-title="Password" >
				   
				  </div>
			</div>
			<div class="control-group">
				<label class="control-label" for="input01">Confirm Password</label>
				  <div class="controls">
					<input type="password" class="input-xlarge" id="cpwd" name="password_confirmation" rel="popover" data-content="Re-enter your password for confirmation." data-original-title="Re-Password" >
				   
				  </div>
			</div>
			
			
			 <div class="control-group">
				<label class="control-label" for="input01">Gender</label>
				  <div class="controls">
					<select name="gender" id="gender" >
						<option value="">Gender</option>
						<option value="1">Male</option>
						<option value="2">Female</option>
						<option value="3">Other</option>
								   
					</select>
				   
				  </div>
			
			</div>
			
			
			<div class="control-group">
				<label class="control-label" for="input01"></label>
				  <div class="controls">
				   <button type="submit" class="btn btn-success" rel="tooltip" title="first tooltip">Create My Account</button>
				   
				  </div>
			
			</div>
			
			
			   
			  </fieldset>
			  {!! Form::close() !!}
			<!-- </form> -->	
			</div>
			
			<!-- ................................ LOGIN FORM ................................ -->
				<div class="col-sm-6 col-md-4 col-md-offset-4">
					<h1 class="text-center login-title">Sign in to continue to Site</h1>
					<div class="account-wall">
						<img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
							alt="">
						{!! Form::open(['route' => 'user.index'],'class'=>'form-signin') !!}
						<input type="text" class="form-control" placeholder="Email" required autofocus>
						<input type="password" class="form-control" placeholder="Password" required>
						<button class="btn btn-lg btn-primary btn-block" type="submit">
							Sign in</button>
						<label class="checkbox pull-left">
							<input type="checkbox" value="remember-me">
							Remember me
						</label>
						<a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
						{!! Form::close() !!}
					</div>
					<!-- <a href="#" class="text-center new-account">Create an account </a> -->
				</div>
			<!-- ................................ LOGIN FORM ................................ -->
		</div>
</div>    
@stop
