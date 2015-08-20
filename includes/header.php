<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>This is title</title>
	
	<meta content="width=device-width, initial-scale=1" name="viewport">
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="../css/bootstrap.css" />
	<link rel="stylesheet" href="../css/bootstrap.min.css" />

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	
	<!-- Fonts Icons -->
	<link rel="stylesheet" href="../css/font-awesome.min.css" />

	<link rel="stylesheet" href="../css/a-activities.css" />

	<!-- main css -->
	<link rel="stylesheet" href="../css/main.css" />
	
	<!-- jquery -->
	<script src="../js/jquery-1.11.3.min.js"></script>
	
	<!--[if IE 7]>
		<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome-ie7.min.css">
	<![endif]-->

</head>
<body>
	
	<div id="main_area">		
		
		<div class="container-fluid" id="header_area">
		
			<div class="row">
			
				<div class="col-sm-12" id="header_top">
	
					
					<div class="col-sm-1" id="logo_area">
					
						<div class="logo">
							
							<h1><a href="<?php echo url('/'); ?>">Linker</a></h1>
						
						</div>
						
					</div>
							
					<div class="col-sm-11" id="top_menu">
					
						

						<nav class="navbar navbar-default">

							<div class="container-fluid" id="main_menu">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
								  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								  </button>
								</div>

								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

									<div class="row">
										
										<div class="col-sm-7">
										    <ul class="nav navbar-nav">
												<li class=""><a href="<?php echo url('/'); ?>"><i class="fa fa-home"></i> Home</a></li>
												<li class=""><a href="<?php echo url('/'); ?>"><i class="fa fa-comments-o"></i> Space </a></li>
												<li class="menu_two"><a href="<?php echo url('/users/people.php'); ?>"><i class="fa fa-users"></i> People </a></li>
												<li class="menu_three"><a href="<?php echo url('/tasks'); ?>"><i class="fa fa-tasks"></i> Tasks</a></li>
												<li class="menu_four"><a href="<?php echo url('/calendar'); ?>"><i class="fa fa-calendar"></i> Calender</a></li>
										    </ul>
										</div> <!-- end col7 -->
										
										<div class="col-sm-1">
											<div id="processing" class="processing"></div>
										</div> <!-- end col1 -->

										<div class="col-sm-2">
										    <form class="navbar-form navbar-left" role="search">
												<div class="form-group">
											  		<input id="search-box" class="form-control" type="text" placeholder="Search">
												</div>
										  	</form>
									  	</div> <!-- end col2 -->

									  	<div class="col-sm-2">

										    <ul class="nav navbar-nav navbar-right">
									
												<li><a href=""><i class="fa fa-envelope"></i></a></li>
												
											
												<li class="right-toggle-menu">
													<a class="dropdown-toggle" data-toggle="dropdown" href=""><i class="fa fa-user"></i><span class="caret"></span></a>
													<ul class="dropdown-menu" aria-expanded="false" >
														<li>
															<a href="<?php echo url('/users/myprofile.php');?>"> My profile</a>
														</li>
														<li class="divider"></li>
														<li>
															<a href="<?php echo url('/users/signout.php'); ?>">Logout</a>
														</li>
													</ul>
												</li>
									
										    </ul>

										</div> <!-- end col2 -->

									</div><!-- end row -->

								</div><!-- /.navbar-collapse -->

							</div><!-- /.container-fluid -->

						</nav>	<!-- end nav default -->
					
					</div> <!-- end col 11 -->

					<div id="notification" class="notification"></div> <!-- end notifications -->

				</div> <!-- end col 12 --> <!-- end header top -->

<script>
	//show the right toggle menu
	$(document).ready(function(){
		$('.right-toggle-menu').click(function(){
			$('.dropdown-menu').slideToggle(100);
		});
	});
</script>