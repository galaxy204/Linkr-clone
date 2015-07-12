<?php 
	// require_once ('../core/init.php');
	// $users = query($conn,
	// 				"SELECT * FROM mine WHERE id = :id",
	// 				array('id' => 1));

	// var_dump($users);
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title>This is title</title>
		
		<meta content="width=device-width, initial-scale=1" name="viewport">
		
		
		<link rel="stylesheet" href="../css/bootstrap.css" />
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/main.css" />
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		
		<link rel="stylesheet" href="../css/font-awesome.min.css" />
		
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
										
										<h1><a href="#">Linker</a></h1>
									
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
										  <ul class="nav navbar-nav">
												<li class=""><a href="#"><i class="fa fa-home"></i> Home</a></li>
												<li class="menu_two"><a href="#"><i class="fa fa-users"></i> People </a></li>
												<li class="menu_three"><a href="#"><i class="fa fa-tasks"></i> Tasks</a></li>
												<li class="menu_four"><a href="#"><i class="fa fa-calendar"></i> Calender</a></li>
										  </ul>
										  <form class="navbar-form navbar-left" role="search">
											<div class="form-group">
											  <input id="search-box" class="form-control" type="text" placeholder="Search">
											</div>
										  </form>
										  <ul class="nav navbar-nav navbar-right">
									
												<li><a href=""><i class="fa fa-envelope"></i></a></li>
												
											
												<li class="">
													<a class="dropdown-toggle" data-toggle="dropdown" href=""><i class="fa fa-user"></i><span class="caret"></span></a>
													<ul class="dropdown-menu " aria-expanded="false" >
														<li>
															<a class="ng-binding" href="#">My profile</a>
														</li>
														<li class="divider"></li>
														<li>
															<a class="ng-binding" href="#">Logout</a>
														</li>
													</ul>
												</li>
										

										
									
										  </ul>
										</div><!-- /.navbar-collapse -->
									  </div><!-- /.container-fluid -->
									</nav>									
		
								
								</div>
	
					
					</div>
					<div class="col-sm-12" id="header_bottom">
						
						<h1><a href="#"><i class="fa fa-home"></i> Home</a></h1>
					
					</div>				
				</div>
			</div>
			
			
			
			<div class="container-fluid" id="time-line-area">
			
				<div class="row">
				
					<div class="col-sm-12">
					
						
						<div class="col-sm-2" id="time-line-left">
						
							<div class="col-sm-12" id="time-line-left-one">
							
							
							
								<div class="info-top">
									
									<div class="col-sm-4 col-sm-offset-1" id="info-top-left">
										
										<img src="../images/1.jpg" alt="" />
									
									</div>
									
									<div class="col-sm-7" id="info-top-right">
									
										<h2>Normando Garay Lomeli</h2>
										<p><a href="#">My Profile</a></p>
										<p><a href="#">Logout</a></p>
									
									</div>
								
								</div>
								<div class="col-sm-12" id="info-middle">
								
									<button class="btn btn-default">Create a new space</button>
									
								</div>
								<div class="col-sm-12" id="info-bottom">
									
									<h5>Tasks</h5>
									
									<div class="info-bottom-inbox">
									
										<div class="col-sm-6 " id="info-bottom-inbox-left">
										
											<p><a href="#">Inbox</a></p>
										
										</div>
										<div class="col-sm-2 col-sm-offset-4" id="info-bottom-inbox-right">
											
											<p>1</p>
										
										</div>
										
									</div>
									
									<div class="info-bottom-mytasks">
									
										<div class="col-sm-6 " id="info-bottom-mytasks-left">
										
											<p><a href="#">My tasks</a></p>
										
										</div>
										<div class="col-sm-2 col-sm-offset-4" id="info-bottom-mytasks-right">
											
											<p>1</p>
										
										</div>									
										
									</div>
									
									<div class="col-sm-12 " id="info-bottom-delegated">
									
										<p><a href="">Delegated</a></p>
										
									</div>								
								
								</div>							
							
							
							
							
							
							
							
							
							
							
							</div>
							

						
						
						</div>
						
						
						<div class="col-sm-6" id="time-line-middle">
						
							<div class="time-line-middle-heading">
								
								<h5>Recent activity</h5>
							
							</div>
							
							<div class="col-sm-12" id="single-news">
							
								<div class="col-sm-4" id="single-news-left">
								
									<div class="col-sm-4 col-sm-offset-1" id="single-news-pic">
										
										<img src="../images/1.jpg" alt="" />
									
									</div>
									
									<div class="col-sm-7" id="single-news-info">
										
										<div class="col-sm-10" id="single-news-info-name">
										
											<h1>Tommy C. Hubbard</h1>
										
										</div>
										
										<div class="col-sm-10" id="single-news-info-post-time">
										
											<p>Today at 4:38 PM</p>
										
										</div>
										
										<div class="col-sm-10" id="single-news-info-post-type">
											
											<p>Posted a Link</p>
										
										</div>
										
										<div class="col-sm-10" id="single-news-info-post-privacy">
										
											<p><a href="#">@Public space</a></p>
										
										</div>
										
										
									
									</div>
								
								</div>
								
								
								<div class="col-sm-8" id="single-news-right">
								
									<div class="col-sm-12" id="single-news-right-top">
										
										<p>Hello everyone</p>
									
									</div>
									
									<div class="col-sm-12" class="single-news-right-middle">
									
										<a href="#"><i class="fa fa-fw fa-arrow-circle-right "></i></a>
									
									</div>
									
									<div class="col-sm-10" id="single-news-right-bottom">
									
										<div class="single-reply">
										
											<div class="col-sm-3" id="single-reply-left">
											
												<img src="../images/1.jpg" alt="" />
											
											</div>
											
											<div class="col-sm-8 col-sm-offset-1" id="single-reply-right">
											
												<div class="col-sm-12" id="reply-name-time">
												
													<p>Anna J. Gaona Yesterday at 10:30 AM</p>
												
												</div>
												
												<div class="col-sm-12" id="reply-text">
												
													<p>This is reply</p>
												
												</div>
											
											</div>
										
										</div>
									
									
									</div>
								
								
								</div>
							
							</div>
	

							<div class="col-sm-12" id="single-news">
							
								<div class="col-sm-4" id="single-news-left">
								
									<div class="col-sm-4 col-sm-offset-1" id="single-news-pic">
										
										<img src="../images/1.jpg" alt="" />
									
									</div>
									
									<div class="col-sm-7" id="single-news-info">
										
										<div class="col-sm-10" id="single-news-info-name">
										
											<h1>Tommy C. Hubbard</h1>
										
										</div>
										
										<div class="col-sm-10" id="single-news-info-post-time">
										
											<p>Today at 4:38 PM</p>
										
										</div>
										
										<div class="col-sm-10" id="single-news-info-post-type">
											
											<p>Posted a Link</p>
										
										</div>
										
										<div class="col-sm-10" id="single-news-info-post-privacy">
										
											<p><a href="#">@Public space</a></p>
										
										</div>
										
										
									
									</div>
								
								</div>
								
								
								<div class="col-sm-8" id="single-news-right">
								
									<div class="col-sm-12" id="single-news-right-top">
										
										<p>Hello everyone</p>
									
									</div>
									
									<div class="col-sm-12" class="single-news-right-middle">
									
										<a href="#"><i class="fa fa-fw fa-arrow-circle-right "></i></a>
									
									</div>
									
									<div class="col-sm-10" id="single-news-right-bottom">
									
										<div class="single-reply">
										
											<div class="col-sm-3" id="single-reply-left">
											
												<img src="../images/1.jpg" alt="" />
											
											</div>
											
											<div class="col-sm-8 col-sm-offset-1" id="single-reply-right">
											
												<div class="col-sm-12" id="reply-name-time">
												
													<p>Anna J. Gaona Yesterday at 10:30 AM</p>
												
												</div>
												
												<div class="col-sm-12" id="reply-text">
												
													<p>This is reply</p>
												
												</div>
											
											</div>
										
										</div>
									
									
									</div>
								
								
								</div>
							
							</div>	
						
						</div>
						
						
						<div class="col-sm-3"id="time-line-right">
						
							<div class="col-sm-12" id="time-line-right-top">
							
								
								<div class="single-time-line-right">
								
									<div class="col-sm-12" id="single-time-line-right-top">
									
										<div class="col-sm-4" id="single-time-line-right-top-left">
										
											<h2><a href="">Datacenter team </a></h2>
											<p>Last visit Today at 11:35 AM</p>
										
										</div>
										
										<div class="col-sm-5 col-sm-offset-2" id="single-time-line-right-top-rihgt">
										
											<img src="../images/2.png" alt="" />
										
										</div>
									
									</div>
									
									<div class="col-sm-12" id="single-time-line-right-bottom">
									
										<div class="col-sm-3" id="status-one">
										
											<i class="fa fa-user" style="font-size: 15px"></i>
											<h2>15</h2>
										
										</div>
										
										<div class="col-sm-3" id="status-two">
										
											<i class="fa fa-comments-o" style="font-size: 15px"></i>
											<h2>55</h2>
										
										</div>
										
										<div class="col-sm-3" id="status-three">
										
											<i class="fa fa-star-o" style="font-size: 15px"></i>
											<h2>5</h2>
										</div>
										
										<div class="col-sm-3" id="status-four">
										
											<i class="fa fa-lock"  style="font-size: 15px"></i>
											<h2>Public</h2>
										
										</div>
									
									
									</div>
								
								</div>
							
							
							</div>
							
							
							<div class="col-sm-12" id="time-line-right-bottom">
							
								<div class="col-sm-12" id="time-line-right-bottom-heading">
								
									<h2>Join a space</h2>
								
								</div>
								
								<div class="col-sm-12" id="single-right-bottom-team">
								
									<div class="col-sm-6" id="single-team-name">
									
										<h2><a href="">CSS</a></h2>
										
									</div>
									
									<div class="col-sm-6" id="single-team-privacy">
									
									
										<a href=""><i class="fa fa-fw fa-unlock" ></i></a>
									
									</div>
									
									
									<div class="col-sm-10" id="hide-option">
										
										<p>Hello linker</p>
										
										<button class="btn  btn-primary " >Join</button>
									
									</div>
									
								
								</div>
							
							
							</div>
						
						</div>
					
					
					</div>
				
				</div>
			
			</div>
			
			
		</div>
		

	<!-- bootstrap -->	
	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>			
	<!-- end_bootstrap -->			
		
		
	</body>
</html>