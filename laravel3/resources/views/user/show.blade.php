@extends('layouts.master')
@section('title')
View User
@stop
@section('body')

<script type="text/javascript" src="{{asset('bootstrap/js/jquery-1.11.3.js')}}"></script>
<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bootstrap/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bootstrap/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bootstrap/js/jquery-validate.js')}}"></script>
<script type="text/javascript">
<!-- JS WORK START HERE -->
		
	  	$(document).ready(function() {
			$('#example').DataTable();
			
			
		/* ...................... AJAX WORK FOR DELETION .......................*/	
			$('.delete').on('click',function(){
			var dataId = {id:$(this).data('id')};
			//alert(dataId.id);return false;
			$.ajax({
				type:'GET',
				url:'{!!URL::route('del')!!}', // del define in routing like Route::get('/delete',array('as'=>'del','uses'=>'UsersController@delete'));
				async:false,
				data:dataId,
				success:function(data){
					alert(data.sms);
				}
			
				});
				$(this).parent().parent().remove();
			});
		/* ...................... AJAX WORK FOR DELETION .......................*/
		
		/* ...................... MODAL OPENING CALL ...........................*/
		$("#modal_open").on("click", function(e) {
			//alert(1);
			$('#myModal').modal('show');
			/*
			var link = $(e.relatedTarget);
			$(this).find(".modal-body").load(link.attr("href"));
			*/
		});
		/* ...................... MODAL OPENING CALL ...........................*/
		
			
		});
		<!-- JS WORK ENDS HERE -->
</script>
<?php 
	//echo "<pre>";
					//print_r($users);
?>
<div class="container">
	<div class="row">	
		<div class="span8">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Gender</th>
						<th>Is Admin</th>
						<th>Created At</th>
						<th>Status</th>
						<th>Action</th>	
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Name</th>
						<th>Gender</th>
						<th>Is Admin</th>
						<th>Created At</th>
						<th>Status</th>
						<th>Action</th>	
					</tr>
				</tfoot>
				<tbody>
				<?php 
					foreach($users as $row){
					?>
					<tr>
						<td><?php echo $row->username; ?></td>
						<td><?php echo ($row->gender == 1)?"Male":"Female"; ?></td>
						<td><?php echo ($row->is_admin == 0)?"No":"Yes"; ?></td>
						<td><?php echo date("Y-m-d h:i:s",strtotime($row->created_at)); ?></td>
						<td>Active</td>
						<td><!-- <a href="javascript:void(0)" id="modal_open" data-toggle="modal" data-target="#myModal" data-remote="false" class="btn btn-default">
    Launch Modal
</a>  |--><a href="{{route('user.edit',$row->id)}}">Edit</a> | <a class="delete" href="javascript:void(0)" data-id="<?php echo $row->id; ?>">Delete</a> 
						<!--
						{!!Form::open(array('route' => ['user.destroy',$row->id], 'class'=>'form-horizental','method' =>'delete'))!!}
						{!!Form::hidden('id',$row->id)!!}
						{!!Form::submit('Delete',['class' => 'btn btn-danger'])!!}
						{!!Form::close()!!}
						-->
						</td>
					</tr>
					<?php					
					}
				?>
					
					
				</tbody>
			</table>	
		</div>
		<!-- <a href="{{route('user.create')}}" class="btn btn-info" role="button">Create New User</a> -->
		<a href="<?php echo url(); ?>/course/create" class="btn btn-info">Create a course </a>
	</div>		
</div>	


<!--  .................. FOR OPENING DATA IN MODAL FOR AJAX WORK ..................... -->

<!-- Default bootstrap modal example -->
<!-- Modal -->
<!-- Default bootstrap modal example -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--  .................. FOR OPENING DATA IN MODAL FOR AJAX WORK ..................... -->

@stop	
