<!-- Stored in resources/views/layouts/master.blade.php -->
<!doctype html>
<html>
    <head>
        <title>App Name - @yield('title')</title>
		<!-- Le styles -->
	<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<!-- <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap-responsive.css')}}"/> -->
	<!-- for view user -->
		<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/btstrpdtble.css')}}"/> 
		<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/datatable.css')}}"/> 
	<!-- for view user -->
	
    <!-- Le fav and touch icons -->
    </head>
    <body>
	<?php if(Session::has('User')){
		// ANOTHER PROCESS FOR LOGIN USER CHECK IS THAT 
		/*if(Auth::user())
			echo "login"
		else
			echo "logout";
			*/
		
		//$value = Session::get('User');		
	?>
			<a href="<?php echo url(); ?>/auth/logout">Log Out</a>
	<?php } else { ?>
			<a href="<?php echo url(); ?>">Log In</a>
	<?php } ?>
        @yield('body')    
		<!-- <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script> -->
		
		
	</body>
</html>