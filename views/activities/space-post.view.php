

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
									<li class=""><a href="<?php echo url('/'); ?>"><i class="fa fa-home"></i> Home</a></li>
									<li class=""><a href="<?php echo url('/'); ?>"><i class="fa fa-comments-o"></i> Space </a></li>
									<li class="menu_two"><a href="<?php echo url('/users/people.php'); ?>"><i class="fa fa-users"></i> People </a></li>
									<li class="menu_three"><a href="<?php echo url('/tasks'); ?>"><i class="fa fa-tasks"></i> Tasks</a></li>
									<li class="menu_four"><a href="<?php echo url('/calendar'); ?>"><i class="fa fa-calendar"></i> Calender</a></li>
								</ul>
								<form class="navbar-form navbar-left" role="search">
									<div class="form-group">
										<input id="search-box" class="form-control" type="text" placeholder="Search">
									</div>
								</form>
								<div class="load_image">
									<img src='../images/loader.gif' alt='processing' id="loader">
								</div>

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
												<a class="ng-binding" href="<?php echo url('/users/signout.php'); ?>">Logout</a>
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

				<h1><a href="#" style="font-size:20px;"><i class="fa fa-lock"></i> <?php
						if (isset($_SESSION['space_title'])) {
							echo $_SESSION['space_title'];
						}
						?>
					</a></h1>
				<?php

				echo checkSpaceOptions($conn, $_SESSION['space_title']);
				?>

			</div>
		</div>
	</div>
	<!--start space feed-->
	<div class="container-fluid" id="space-feed">
		<div class="row">
			<div class="col-sm-2 pad">
				<p>Tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</p>
				<h4>View</h4>
				<hr>
				<div class="btn-group btn-group-xs">
					<button type="button" class="btn btn-default">All</button>
					<button type="button" class="btn btn-default"><i class="fa fa-star fa-fw"></i></button>
					<button type="button" class="btn btn-default"><i class="fa fa-comment fa-fw"></i></button>
					<button type="button" class="btn btn-default"><i class="fa fa-link fa-fw"></i></button>
					<button type="button" class="btn btn-default"><i class="fa fa-table fa-fw"></i></button>
					<button type="button" class="btn btn-default"><i class="fa fa-bar-chart fa-fw"></i></button>
					<button type="button" class="btn btn-default"><i class="fa fa-check-square fa-fw"></i></button>
					<button type="button" class="btn btn-default"><i class="fa fa-calendar fa-fw"></i></button>
					<button type="button" class="btn btn-default"><i class="fa fa-map-marker fa-fw"></i></button>

				</div><!--end of button group-->
			</div><!--end of col sm 2-->

			<div class="col-sm-7 pad">
				<div class="post-group">
					<div class="feed-post-type">
						<ul class="feed-type">
							<li><a href=""> <i class="fa fa-comment"></i>  Message </a></li>
							<li><a href=""> <i class="fa fa-link"></i>  Link </a></li>
							<li><a href=""> <i class="fa fa-table"></i>  Table </a></li>
							<li><a href=""> <i class="fa fa-bar-chart"></i>  Chart </a></li>
							<li><a href=""> <i class="fa fa-check-square"></i>  Poll </a></li>
							<li><a href=""> <i class="fa fa-calendar"></i>  Event </a></li>
							<li><a href=""> <i class="fa fa-map-marker"></i>  Location </a></li>

						</ul>
					</div>

					<form action="" method="POST" role="form" enctype="multipart/form-data" id="post-in-space">
						<br>
						<textarea name="message" class="form-control post-message" id="message"></textarea>
						<div class="warn-div">
							<p class="warning">You can not make empty post</p>
						</div>


						<div class="fileUpload btn btn-primary">
							<span><i class="fa fa-link"></i>  Attach files</span>
							<input type="file" class="upload" id="picture" name="files" />
						</div>

						<input class="btn btn-primary" type="submit" value="Post" id="post">

						<div id="show-file-names">


						</div>

					</form><!--end of form posting-->

				</div>
				<div id="result">
					<!--checking is there is any post-->


					<?php if ($posts !== false): ?>
						<?php

						for ($i=0; $i < count($posts); $i++) { ?>
							<div class="feed-post post-group">
								<div class="profiler-info">
									<?php
									//querying profile pic and full name
									$proPic = query_rowcount_result($conn,
										"SELECT avatar, fullname FROM users WHERE id = :id",
										array('id' => $posts[$i]['posted_by']));
									if (count($proPic) > 0) {
										for ($e=0; $e <count($proPic) ; $e++) {
											$img = "<img class='member-pic' src='";
											$img.= $proPic[$e]['avatar'] . '\'' . '/>';
											if (empty($proPic[$e]['avatar'])) {
												echo url_return('/images/default-avatar.png');
											} else {
												echo $img;
											}
											echo '<a href="" class="">' . $proPic[$e]['fullname'] . '</a>';
											echo '<p>' .textDate($posts[$i]['posted_at']) . '</p>';
										}
									}
									?>


								</div>
								<br>
								<br>
								<p class="space-message"> <?php echo $posts[$i]['message']; ?></p>

								<?php
								$attachment = query_rowcount_result($conn,
									"SELECT file_name, file_desc FROM space_message_attachment WHERE post_id = :post_id",
									array('post_id' => $posts[$i]['row_id']));

								if (count($attachment[0]) > 0) {

									//looping attachments
									for ($j=0; $j <count($attachment) ; $j++) {

										//checking for image attachment and show
										if ( get_file_extension($attachment[$j]['file_name']) === 'jpg' ||
											get_file_extension($attachment[$j]['file_name']) === 'png' ||
											get_file_extension($attachment[$j]['file_name']) === 'gif' ||
											get_file_extension($attachment[$j]['file_name']) === 'jpeg') {

											$image  = '<figure class="list-img-item">';
											$image .= '';
											$image .= "<img class='attach-img popup' src='";
											$image .= url_return('/bin/uploads/') .$attachment[$j]['file_name'] . '\'' . '/>';
											$image .= '<figcaption class="list-img-title"><h5>';
											$image .= $attachment[$j]['file_desc'] . '</h5>';
											$image .= '</figcaption>';
											$image .= '</figure>';
											echo $image;

										} else {
											echo '<div style="clear:both;"></div><p>' . $attachment[$j]['file_desc'] . '</p>';
											//file icon load

											$fileIcon = getIcon($attachment[$j]['file_name']);
											echo '<i class="icon-file">'.$fileIcon.'</i><a href="' .
												url_return('/bin/uploads/') .$attachment[$j]['file_name'] . '" download>' .
												substr($attachment[$j]['file_name'], 8) .'</a> </br>';

										}


									}
								}


								?>
							</div> <!--end of post message with attahcment-->
							<div style="clear:both;"></div>
							<div class="reply-area">
								<ul class="reply-options">
									<li><i class="fa fa-comment"></i>  Comment</li>
									<li><i class="fa fa-thumbs-o-up"></i>  Like</li>
									<li><i class="fa fa-star-o"></i>  Starred</li>
									<li><i class="fa fa-search-plus"></i>  Zoom</li>
									<li><i class="fa fa-share"></i>  Share</li>
									<li><i class="fa fa-trash-ot"></i> Delete</li>
								</ul>
								<br>
								<form action="" role="form" class="comment">
									<textarea name="" id="reply-box" class="form-control reply-bx"></textarea>

									<div class="reply-hidden">
										<div class="fileUpload btn btn-primary" id="reply-attach">
											<span><i class="fa fa-link"></i>  Attach files</span>
											<input type="file" class="upload" id="picture-comment" name="file-comment" />
										</div>

										<input class="btn btn-primary" type="submit" value="Post" id="post-comment">
									</div>
								</form>
							</div><!--end of reply-->
						<?php } ?>
					<?php endif; ?>


				</div><!--end of result div-->





			</div><!--end of col sm 7-->

			<div class="col-sm-3 pad">
				<?php
				if ($posts !== false) { ?>

					<div class="latest-files">
						<h4>Latest files</h4>
						<br>
						<ul class="latest-files">
							<?php
							for ($i=0; $i < count($posts); $i++) {
								$attachment = query_rowcount_result($conn,
									"SELECT file_name, file_desc FROM space_message_attachment WHERE post_id = :post_id",
									array('post_id' => $posts[$i]['row_id']));
								if (count($attachment) > 0) {
									for ($j=0; $j <count($attachment) ; $j++) {
										//$fileIcon = getIcon($attachment[$j]['file_name']);
										$file_path2 = '../bin/uploads/'. $attachment[$j]['file_name'] ;
										echo '<li><i class="icon-file">'. getIcon($attachment[$j]['file_name']) .'</i><a href="' .$file_path2. '" download>' .
											substr($attachment[$j]['file_name'], 8) .'</a>(' .filesize($file_path2). ' bytes)</li>';
									}
								}
							}
							?>

						</ul>
					</div><!--end of latest files-->
				<?php } ?>
				<div class="members-list">
					<h4>Members</h4>
					<ul class="members">
						<li><a href=""><img src="<?php echo $proPicUser;?>" alt=""></a></li>


					</ul>
				</div>
			</div><!--end of col sm 3-->

		</div><!--end of row-->
	</div><!--end of space-feed-->


</div><!--end of main area-->

<script src="../js/main.js"></script>
<script>

	//Ajax post to show messages
	$(document).ready(function (e) {
		$("#picture").on('change',(function(e) {

			//using baseName function to get only the file name
			var fileName = baseName($('#picture').val());
			var html = '<br><span class"group-files-n-icon" id="power"><i class="fa fa-spinner hide-spinner"></i><i class="fa fa-check sky-color"></i>' + fileName + '&nbsp;&nbsp;-<i id="remove">Remove</i></br><input type="text" placeholder="File file-description" class="file-description form-control" name="file_desc[]"/></span>';
			$("#show-file-names").append(html);
			//console.log($(this));
			$("i#remove").click(function() {
				$(this).parent().prev().remove();
				$(this).parent().remove();
			});

			var fd = new FormData(document.getElementById('post-in-space'));
			$.ajax({
				url: "../ajax-server/upload-attachment-space.php", // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: fd, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,        // To send DOMDocument or non processed data file it is set to false
				success: function(data)   // A function to be called if request succeeds
				{

					dIns = '<input id="filename" type="hidden" name="filename[]"/>';
					$('i.hide-spinner').hide();
					$('i.sky-color').show();
					$("#power:last-child").append(dIns);
					$("#power:last-child input#filename").val(data);

				},
				error: function() {
					$("#show-file-names").append("there is an error uploading your file");
				}
			});
		}));
//end of picture submission

//start submitting the actual form with post body and attahced files

		$("#post-in-space").submit(function(e) {

			e.preventDefault();
			//warning message
			var loader = $("#loader");
			var warnMsg = $("p.warning");
			var result = $("div#result");
			//message
			var msg = $("#message");
			//attachment span
			var attchSpan = $("span#power");
			//show file div br tags
			var brTags = $("#show-file-names br");
			//function to get ajax results globally
			function runOnComplete() {
				data = dataHolder.split("||");
				var postMsgOnly = '<div class="feed-post post-group"><div class="profiler-info"><img class="member-pic" src="<?php echo $proPicUser;?>" alt=""><a href="" class=""><?php echo $fullName;?></a><p class="">' + formatAMPM() + '</p></div><br><p class="space-message">' + data[0]+ '</p></div><div class="reply-area"><ul class="reply-options"><li><i class="fa fa-comment"></i>  Comment</li><li><i class="fa fa-thumbs-o-up"></i>  Like</li><li><i class="fa fa-star-o"></i>  Starred</li><li><i class="fa fa-search-plus"></i>  Zoom</li><li><i class="fa fa-share"></i>  Share</li><li><i class="fa fa-trash-ot"></i> Delete</li></ul><br><form action="" role="form" class="comment"><textarea name="" id="reply-bx" class="form-control"></textarea><div class="reply-hidden"><div class="fileUpload btn btn-primary" id="reply-attach"><span><i class="fa fa-link"></i>  Attach files</span><input type="file" class="upload" id="picture-comment" name="file-comment" /></div><input class="btn btn-primary" type="submit" value="Post" id="post-comment"></div></form></div>';

				var postMsgAttch ='<div class="feed-post post-group"><div class="profiler-info"><img class="member-pic" src="<?php echo $proPicUser;;?>" alt=""><a href="" class=""><?php echo $fullName;?></a><p class="">' + formatAMPM() + '</p></div><br><p class="space-message">' + data[0] + '</p></br>'+data[1]+'</div><div class="reply-area"><ul class="reply-options"><li><i class="fa fa-comment"></i>  Comment</li><li><i class="fa fa-thumbs-o-up"></i>  Like</li><li><i class="fa fa-star-o"></i>  Starred</li><li><i class="fa fa-search-plus"></i>  Zoom</li><li><i class="fa fa-share"></i>  Share</li><li><i class="fa fa-trash-ot"></i> Delete</li></ul><br><form action="" role="form" class="comment"><textarea name="" class="reply-bx form-control"></textarea><div class="reply-hidden"><div class="fileUpload btn btn-primary" id="reply-attach"><span><i class="fa fa-link"></i>  Attach files</span><input type="file" class="upload" id="picture-comment" name="file-comment" /></div><input class="btn btn-primary" type="submit" value="Post" id="post-comment"></div></form></div>';
				//we check and detemine the data items
				if (data.length == 2) {
					result.prepend(postMsgAttch);
				} else {
					result.prepend(postMsgOnly);
				}
				//show the textarea		
				$("textarea.reply-bx").click(function() {
					var $this = $(this);
					$this.next().slideDown(300);

				});

				//click for comments
				$('input.upload').on('change',(function(e) {
					var attachName = baseName($('input.upload').val());
					var frag = '<br><span class"group-files-n-icon" id="power"><i class="fa fa-spinner hide-spinner"></i><i class="fa fa-check sky-color"></i>' + attachName + '&nbsp;&nbsp;-<i id="remove">Remove</i></br><input type="text" placeholder="File file-description" class="file-description form-control" name="file_desc[]"/></span>';
					$('form.comment').append(frag);
				}));

			}//end of runOnComplete Function

			if ( msg.val().length === 0 ) {
				warnMsg.fadeIn();
			} else {
				warnMsg.hide();
				//show the processing icon
				loader.fadeIn();
				//serialize form data

				var values = $(this).serialize();
				//to send data globally
				var dataHolder = '';
				$.ajax({
					url: "../ajax-server/post-message-space.php",
					type: "post",
					data: values,
					success: function(data){
						//emptying and removing different elements
						loader.fadeOut();
						msg.val('');
						attchSpan.remove();
						brTags.remove();

						dataHolder += data;
						//sending data to runOnComplete Function
						runOnComplete();
						//prepend the result with html as post feed
					},
					error:function(){
						console.log('there is an error');
					}


				});
			}

		});

//showing comment options
		$("textarea.reply-bx").click(function() {
			var $this = $(this);
			$this.next().slideDown(300);

		});


		// $("div.fileUpload").on('change',(function(e) {

		// 		$(this).hide();
		// 	}));

	});




</script>




