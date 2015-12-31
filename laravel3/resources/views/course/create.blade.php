@extends('layouts.master')
@section('title')
        Course
@stop		
@section('body') 
<div class="container">
	
		<div class="row">			
	
		  <div class="span8">
			<div class="alert alert-success" style="display:none">
			  Well done! You successfully read this important alert message.
			</div>

			<!-- <form class="form-horizontal" id="registerHere" method='post' action=''> -->
			{!! Form::open(['route' => 'CourseStore']) !!}
			
			@if($errors->any())
				<ul class="alert alert-danger">
					@foreach($errors->all() as $error)
						<li>{!! $error !!}</li>
					@endforeach
				</ul>
			@endif
			  <fieldset>
				<legend>Course</legend>
				<div class="control-group">
					<label class="control-label" for="input01">Course Name</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="course_name" name="course_name" rel="popover" data-content="Enter your first and last name." data-original-title="Course Name">
						</div>
				</div>
			
				<div class="control-group">
					<label class="control-label" for="input01"></label>
					  <div class="controls">
					   <button type="submit" class="btn btn-success" rel="tooltip" title="first tooltip">Create Course</button>
					   
					  </div>
				
				</div>
			
			
			   
			  </fieldset>
			  {!! Form::close() !!}
			<!-- </form> -->	
			</div>		
		</div>
</div>    
@stop
