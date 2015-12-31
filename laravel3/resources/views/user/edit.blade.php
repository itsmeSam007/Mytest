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
			{!! Form::model( $user, ['route' => ['user.update', $user->id], 'method' => 'put', 'role' => 'form','files'=>true] ) !!}
			  <fieldset>
				<legend>Registration</legend>
				<div class="control-group">
					<label class="control-label" for="input01">Name</label>
						<div class="controls">
							<input type="text" value="<?php echo $user->username; ?>" class="input-xlarge" id="username" name="username" rel="popover" data-content="Enter your first and last name." data-original-title="Full Name">
						</div>
				</div>
			
			<div class="control-group">
				<label class="control-label" for="input01">Email</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $user->email; ?>" id="email" name="email" rel="popover" data-content="What’s your email address?" data-original-title="Email">
				   
				  </div>
			</div>
			
			
			<div class="control-group">
				<label class="control-label" for="input01">Previous Image</label>
				  <div class="controls">
					<img src="<?php echo url(); ?>/public/images/<?php echo $user->image; ?>" class="thumb" alt="a picture" width="20%" height="60%">
				   
				  </div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="input01">Upload Image</label>
				  <div class="controls">
					<input type="file" class="input-xlarge" id="image" name="image" rel="popover" >
				   
				  </div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="input01">Gender</label>
				  <div class="controls">
					<select name="gender" id="gender" >
						<option value="">Gender</option>
						<option value="1" <?php if($user->gender == 1) {?> selected <?php }  ?>>Male</option>
						<option value="2" <?php if($user->gender == 2) {?> selected <?php }  ?>>Female</option>
						<option value="3" <?php if($user->gender == 3) {?> selected <?php }  ?>>Other</option>
								   
					</select>
				   
				  </div>
			
			</div>
			
			
			<div class="control-group">
				<label class="control-label" for="input01"></label>
				  <div class="controls">
				   <input type="hidden" name="image_name" value="<?php echo $user->image; ?>">
				   <button type="submit" class="btn btn-success" rel="tooltip" title="first tooltip">Update</button>
				   
				  </div>
			
			</div>
			
			
			   
			  </fieldset>
			  {!! Form::close() !!}
			<!-- </form> -->	
			</div>
	
		</div>
</div>    
@stop
