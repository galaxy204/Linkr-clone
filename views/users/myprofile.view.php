					<div class="col-sm-12" id="header_bottom">
						
						<h1><a href="#"><i class="fa fa-user"></i> My Profile</a></h1>
					
					</div>				
				</div>
			</div>
			
			
			
			<!-- start my profile area -->
			<div class="container-fluid" id="myprofile_area">

				<!-- start my profile row -->
				<div class="row">

					<!-- start left menu -->
					<div class="col-md-2" id="left_menu_bar">
					
						<ul>
							
							<li><a id="scroll-personal_info" href="#">Personal information</a></li>
							<li><a id="scroll-password_area" href="#">Password</a></li>
							<li><a id="scroll-notification_area" href="#">Notifications</a></li>
						
						</ul>
					
					</div><!-- end  left menu  -->
					
					
					<!-- start  right_form  -->
					<div class="col-md-10 padding-20" id="right_form">
							
						<!-- AVATAR AREA -->	
						<div class="col-md-12" id="avatar_area">
		
							<h5>Avatar</h5>							
							
							<div class="row">
								<div class="col-sm-10 col-sm-offset-2 avatar-preview" id="avatar-preview">
									<img src="<?php echo ($data['avatar']) ? $data['avatar'] : '../images/default-avatar.png'; ?>" alt="Avatar" />
								</div><!--- end avater preview -->
							</div><!-- end row -->
							
							<div class="row">
								<div id="avatar-status" class="col-sm-2 avatar-status"><img src="../images/loader-black.gif" alt="Processing..."></div> <!-- end avatar loading status -->

								<div class="col-sm-10" id="avatar_upload_area" >
									<div class="col-sm-5">
										<form id="form-avatar" action="" class="form-avatar" method="post" enctype="multipart/form-data">
											<div class="btn btn-xs btn-primary ng-binding">
												<span class="btn-avatar"><i class="fa fa-upload"></i> Upload photo</span><input id="upload-avatar" type="file" name="file">
											</div>
										</form>
									</div>
								</div> <!--- end avater upload form -->
							</div> <!-- end row -->
		
						</div><!-- end avatar_area -->


							
						

<!-- UPDATE PROFILE INFO JS -->
<script src="../js/ajax.js"></script>
<script src="../js/main.js"></script>
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script>
/***********************************************************************************************/
/* 1. UPDATE AVATAR JS */
/***********************************************************************************************/
$(document).ready(function (e) {
	$("#upload-avatar").on('change',(function(e) {
		$('#avatar-status img').show();
		var fd = new FormData(document.getElementById('form-avatar'));
		$.ajax({
			url: "myprofile.php", // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: fd, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
				$('#avatar-status img').hide();
				
				if ( data == 'type_error' ) {
					notification('Only .jpg, .jpeg, .png file allowed!');
				} else if( data == 'size_error' ) {
					notification('Maximum file size is 300kb!');
				} else if ( data == 'file_error' ) {
					notification('Some error has been occured!');
				} else if(data == 'file_exist'){
					notification('File already exists!');
				} else {
					imageLoaded(data);
					notification('Photo has been updated successfully!');
				};
			}
		});
	}));

	function imageLoaded(url) {
		_('avatar-preview').innerHTML = '<img src="' + url + '" alt="">';
	};
});




/***********************************************************************************************/
/* 2. UPDATE PROFILE JS */
/***********************************************************************************************/

	function checkemail()
	{
		var e = _("email").value;
		if(e != ""){
			_("emailstatus").innerHTML = '<img src="../images/loader-black.gif">';

			var ajax = ajaxObj("POST", "myprofile.php");
	        ajax.onreadystatechange = function() {
		        if(ajaxReturn(ajax) == true) {
		            _("emailstatus").innerHTML = ajax.responseText;
		        }
	        }

	        ajax.send("emailcheck="+e);
		}
	}

	function personalInfo() 
	{
		var fl = _('fullname').value;
		var e = _('email').value;
		var ep = _('email_perm').checked;
		if ( ep == true ) {
			var ep = '1';
		} else {
			var ep = '0';
		}
		var o = _('organization').value;
		var ps = _('position').value;
		var ph = _('phone').value;
		var fb = _('facebook').value;
		var gp = _('googleplus').value;
		var sk = _('skype').value;
		var tw = _('twitter').value;
		var li = _('linkedin').value;
		var gh = _('github').value;
		var profileStatus = _('profileStatus');

		if ( fl == "" || e == "" || ps == "" ) {
			profileStatus.innerHTML = "<p style='color:red'>Asterisk fields are required!</p>";
		} else {
			_('updateProfileBtn').disabled = true;
			_('processing').innerHTML = "<img src='../images/loader.gif' alt='processing'>";

			var profile = ajaxObj("POST", "myprofile.php");
	        profile.onreadystatechange = function() {
		        if(ajaxReturn(profile) == true) {
		            if(profile.responseText != 'ok'){
		            	_('processing').innerHTML = "";
						notification(profile.responseText);
						_("updateProfileBtn").disabled = false;
					} else {
						_('processing').innerHTML = "";
						notification('Profile has been updated successfully!')
						_("updateProfileBtn").disabled = false;
					}
		        }
	        }
	        profile.send("fl="+fl+"&e="+e+"&ep="+ep+"&o="+o+"&ps="+ps+"&ph="+ph+"&fb="+fb+"&gp="+gp+"&sk="+sk+"&tw="+tw+"&li="+li+"&gh="+gh);
		}

	}




/***********************************************************************************************/
/* 3. UPDATE PASSWORD JS */
/***********************************************************************************************/
	function checkPassword()
	{
		var p1 = _("password").value;
		var p2 = _("password-again").value;

		if(p1 != ""){
			if ( p1.length < 6 ) {
				_('plstatus').innerHTML = '<p style="color: red">Password must be between 6-32 charecters!</p>';
			}
		}

		if ( p1 != "" && p2 != "") {
			if ( p1 !== p2 ) {
				_('pmstatus').innerHTML = '<p style="color: red">Password doesn\'t match!</p>';
			} else {
				_('pmstatus').innerHTML = '';
			}
		}
	}

	function updatePassword() 
	{
		var passOld 	= _('password-old').value;
		var pass		= _('password').value;
		var passAgain 	= _('password-again').value;
		var passStatus 	= _('password-status');

		if ( passOld == "" || pass == "" || passAgain == "" ) {
			passStatus.innerHTML = '<p style="color: red">All fields are required!</p>';
		} else if(passOld === pass) {
			passStatus.innerHTML = '<p style="color: red">Your old password and new password are same!</p>';
		} else {
			_('update-password-btn').disabled = true;
			_('processing').innerHTML = "<img src='../images/loader.gif' alt='processing'>";

			var password = ajaxObj("POST", "myprofile.php");
	        password.onreadystatechange = function() {
		        if(ajaxReturn(password) == true) {
		            if(password.responseText == 'ok'){
		            	_('processing').innerHTML = "";
						notification('Password has been updated successfully!');
						_("update-password-btn").disabled = false;	            	
					} else if(password.responseText == 'miss-matched') {
						_('processing').innerHTML = "";
						passStatus.innerHTML = "<p style='color: red'>Your old password doesn't match!</p>"
						_('update-password-btn').disabled = false;
					} else {
						_('processing').innerHTML = "";
						notification(password.responseText);
						_("update-password-btn").disabled = false;
					}
		        }
	        }
	        password.send("passOld="+passOld+"&pass="+pass+"&passAgain="+passAgain);
		}
	}




/***********************************************************************************************/
/* 4. UPDATE SETTINGS JS */
/***********************************************************************************************/


function btnUpdateSettings() {
	var npMsg = _('new-posts-msg').value;
	var npEmail = _('new-posts-email').value;
	var commPosMsg = checked('comments-posts-msg');
	var commPosEmail = checked('comments-posts-email');
	var commPosStarredMsg = checked('comments-starred-posts-msg');
	var commPosStarredEmail = checked('comments-starred-posts-email');
	var linksMsg = checked('links-msg');
	var linksEmail = checked('links-email');
	var menMsg = checked('mentions-msg');
	var menEmail = checked('mentions-email');
	var inviteMsg = checked('invitations-msg');
	var inviteEmail = checked('invitations-email');
	var privateEmail = checked('private-email');

	// send data by ajax to php
	_('btn-update-settings').disabled = true;
	_('processing').innerHTML = "<img src='../images/loader.gif' alt='processing'>";

	var settings = ajaxObj("POST", "myprofile.php");
    settings.onreadystatechange = function() {
        if(ajaxReturn(settings) == true) {
            if(settings.responseText == 'ok'){
            	_('processing').innerHTML = "";
				notification('Settings has been updated successfully!');
				_("btn-update-settings").disabled = false;	            	
			} else {
				_('processing').innerHTML = "";
				notification(settings.responseText);
				_("btn-update-settings").disabled = false;
			}
        }
    }
    settings.send("npMsg="+npMsg+"&npEmail="+npEmail+"&commPosMsg="+commPosMsg+"&commPosEmail="+commPosEmail+"&commPosStarredMsg="+commPosStarredMsg+"&commPosStarredEmail="+commPosStarredEmail+"&linksMsg="+linksMsg+"&linksEmail="+linksEmail+"&menMsg="+menMsg+"&menEmail="+menEmail+"&inviteMsg="+inviteMsg+"&inviteEmail="+inviteEmail+"&privateEmail="+privateEmail);
}



/***********************************************************************************************/
/* 5. SECTION SCROLLING JS */
/***********************************************************************************************/
$(document).ready(function() {
	$("#scroll-personal_info").click(function(e) {
		e.preventDefault();
	    $('html, body').animate({
	        scrollTop: $("#personal_info").offset().top - 60
	    }, 400);
	});

	$("#scroll-password_area").click(function(e) {
		e.preventDefault();
	    $('html, body').animate({
	        scrollTop: $("#password_area").offset().top - 60
	    }, 400);
	});

	$("#scroll-notification_area").click(function(e) {
		e.preventDefault();
	    $('html, body').animate({
	        scrollTop: $("#notification_area").offset().top - 60
	    }, 400);
	});

});


</script>

						<!-- PERSONAL INFO -->	
						<div class="col-md-12" id="personal_info">
						
							<h5>Personal Information</h5>
								
							<!-- start form_type_one -->	
							<div class="form_type_one">
								
								<form class="form-horizontal" style="padding: 5px" role="form" onsubmit="return false">
	
									<div class="col-sm-12 form-group">
									
										<label class="col-sm-2">Full name *</label>
										<div class="col-sm-3 ">
											<input id="fullname" class="form-control" type="text" placeholder="enter full name" onfocus="emptyElement('profileStatus')" onkeyup="restrict('fullname')" value="<?php echo isset($data['fullname']) ? $data['fullname'] : ''; ?>">
										</div>

									</div>
									
									<div class="col-sm-12 form-group">
									
										<label class="col-sm-2">eMail *</label>
										<div class="col-sm-3">
											<input id="email" class="form-control" type="text" placeholder="enter email" onblur="checkemail()" onfocus="emptyElement('profileStatus')" onkeyup="restrict('email')" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
										</div>
										<div id="emailstatus" class="col-sm-1"></div>
									</div>

									<div class="col-sm-12 form-group">
									
										<label class="col-sm-2"></label>
										<div class="col-sm-3">
											<label class="checkbox">
												<input id="email_perm" type="checkbox" value="remember-me" 
													<?php 
														if( isset($data['email_perm']) ) {
															if ( $data['email_perm'] === '1' ) {
																echo "checked";
															}
														}
													?>
												>Show my eMail to other members 
											</label>
										</div>
									</div> <!-- end checkbox -->


									<div class="col-sm-12 form-group">
									
										<label class="col-sm-2">Organization or Dept.</label>
										<div class="col-sm-3">
											<input id="organization" class="form-control" type="text" placeholder="enter O. of Dept." onkeyup="restrict('organization')"  value="<?php echo isset($data['organization']) ? $data['organization'] : ''; ?>" >
										</div>
									</div> <!-- end organization -->
									
									<div class="col-sm-12 form-group">
									
										<label class="col-sm-2">Position *</label>
										<div class="col-sm-3">
											<input id="position" class="form-control" type="text" placeholder="enter position" onfocus="emptyElement('profileStatus')" onkeyup="restrict('position')"  value="<?php echo isset($data['position']) ? $data['position'] : ''; ?>" >
										</div>
									</div> <!-- end position -->

									<div class="col-sm-12 form-group">
									
										<label class="col-sm-2">Phone</label>
										<div class="col-sm-3">
											<input id="phone" class="form-control" type="text" placeholder="enter phone number" onkeyup="restrict('phone')"  value="<?php echo isset($data['phone']) ? $data['phone'] : ''; ?>" >
										</div>
									</div> <!-- end phone -->	

									<div class="col-sm-12 form-group">
									
										<label class="col-sm-2">Social Networks</label>
										<div class="col-sm-10">
											<div class=" col-sm-5" id="left_icon">
											
												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-facebook fa-fw" style="width:10px; font-size:15px"></i></span>
												  <input id="facebook" type="text" class="form-control" placeholder="Facebook" aria-describedby="basic-addon1" value="<?php echo isset($data['facebook']) ? $data['facebook'] : ''; ?>">
												</div> <!-- end facebook -->

												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-google-plus-square fa-fw" style="width:10px; font-size:15px"></i></span>
												  <input id="googleplus" type="text" class="form-control" placeholder="Google+" aria-describedby="basic-addon1" value="<?php echo isset($data['googleplus']) ? $data['googleplus'] : ''; ?>">
												</div> <!-- end goole plus -->

												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-google-plus-square fa-fw" style="width:10px; font-size:15px"></i></span>
												  <input id="skype" type="text" class="form-control" placeholder="Skype" aria-describedby="basic-addon1" value="<?php echo isset($data['skype']) ? $data['skype'] : ''; ?>">
												</div> <!-- end skype -->											
											
											</div>

											<div class=" col-sm-5  col-sm-offset-1  " id="right_icon">
											
												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-google-plus-square fa-fw" style="width:10px; font-size:15px"></i></span>
												  <input id="twitter" type="text" class="form-control" placeholder="Twitter" aria-describedby="basic-addon1" value="<?php echo isset($data['twitter']) ? $data['twitter'] : ''; ?>">
												</div> <!-- end twitter -->

												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-google-plus-square fa-fw" style="width:10px; font-size:15px"></i></span>
												  <input id="linkedin" type="text" class="form-control" placeholder="Linkedin" aria-describedby="basic-addon1" value="<?php echo isset($data['linkedin']) ? $data['linkedin'] : ''; ?>">
												</div> <!-- end linkedin -->

												<div class="input-group">
												  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-google-plus-square fa-fw" style="width:10px; font-size:15px"></i></span>
												  <input id="github" type="text" class="form-control" placeholder="Github" aria-describedby="basic-addon1" value="<?php echo isset($data['github']) ? $data['github'] : ''; ?>">
												</div> <!-- github -->											
											
											</div>
										</div>
									</div>
									
									<div class="col-sm-12 form-group">

										<div class="row">

											<label class="col-sm-2 control-label"> </label> <!-- end col2 -->
											<div class="col-sm-2"> <!-- end col2 -->
												<button id="updateProfileBtn" class="btn btn-xs btn-primary ng-binding" onclick="personalInfo()" >Update profile</button>
											</div>
											<div id="profileStatus" class="col-sm-7"></div> <!-- end col7 -->

										</div> <!-- end row -->

									</div> <!-- end col12 -->

								</form>
							
							</div><!-- end form_type_one -->
						
						</div><!-- end personal info -->


						
						<!-- UPDATE PASSWORD -->	
						<div class="col-md-12" id="password_area">
						
							<h5>Password</h5>
							
							<!-- start form_type_one -->	
							<div class="form_type_two">
								
								<form class="form-horizontal" style="padding: 5px" role="form" onsubmit="return false">
								
	
									<div class="col-sm-12 form-group">
									
										<label class="col-sm-2">Old password</label>
										<div class="col-sm-3">
											<input id="password-old" class="form-control" type="password" onfocus="emptyElement('password-status')">
										</div>

									</div>
									
									<div class="col-sm-12 form-group">
									
										<label class="col-sm-2">New password</label>
										<div class="col-sm-3">
											<span id="plstatus"></span>
											<input id="password" class="form-control" type="password" onblur="checkPassword()" onfocus="emptyElement('password-status'); emptyElement('plstatus')">
										</div>

									</div>	

									<div class="col-sm-12 form-group">
										<label class="col-sm-2">Conform Password</label>
										<div class="col-sm-3">
											<span id="pmstatus"></span>
											<input id="password-again" class="form-control" type="password" onfocus="emptyElement('password-status')" onkeyup="checkPassword()">
										</div>
									</div>										
									
									<div class="col-sm-12 form-group">
										<div class="row">
											<label class="col-sm-2 control-label"> </label>
											<div class="col-sm-2">
												<button id="update-password-btn" class="btn btn-xs btn-primary ng-binding" onclick="updatePassword()">Update Password</button>
											</div>
											<div id="password-status" class="col-sm-8"></div>
										</div> <!-- end row -->
									</div> <!-- end col 12 -->

								</form>
							
							</div>							
						
						</div><!-- end update password -->	




						<!-- UPDATE SETTINGS-->	
						<div class="col-md-12" id="notification_area">
						
							<h5>Notifications</h5>
						
							<div class="form_type_three">
								
								<form class="form-horizontal" style="padding: 5px" role="form" onsubmit="return false">
	
									<div class="col-sm-12 form-group">
									
										<label class="col-sm-2 control-label"> </label>
										<div class="col-sm-7">
											<table class="table">
												<tbody>
													<tr>
														<td><strong class="ng-binding">Event</strong></td>
														<td><strong class="ng-binding">Internal message</strong></td>
														<td><strong class="ng-binding">eMail</strong></td>

													</tr>
													<tr>
														<td class="ng-binding" style="vertical-align: middle">
															New posts
														</td>
														
														<td>

															<select id="new-posts-msg" class="form-control ng-pristine ng-valid" ng-model="profile.notif_post">
																<option class="ng-binding" value="0" <?php echo (notifications(0, 'new_posts', $notifications) == '0') ? "selected" : ""; ?>>No</option>
																<option class="ng-binding" value="1" <?php echo (notifications(0, 'new_posts', $notifications) == '1') ? "selected" : ""; ?>>All</option>
																<option class="ng-binding" value="2" <?php echo (notifications(0, 'new_posts', $notifications) == '2') ? "selected" : ""; ?>>Only events</option>
															</select>
														
														
														</td>
														
														<td>
															<select id="new-posts-email" class="form-control ng-pristine ng-valid" ng-model="profile.email_post">
																<option class="ng-binding" value="0" <?php echo (notifications(1, 'new_posts', $notifications) == '0') ? "selected" : ""; ?> >No</option>
																<option class="ng-binding" value="1" <?php echo (notifications(1, 'new_posts', $notifications) == '1') ? "selected" : ""; ?> >All</option>
																<option class="ng-binding" value="2" <?php echo (notifications(1, 'new_posts', $notifications) == '2') ? "selected" : ""; ?> >Only events</option>
															</select>														
														
														</td>
													
													</tr>
													<tr>
													
														<td class="ng-binding">Comments on my posts</td>
														
														<td>
															<input id="comments-posts-msg" class="ng-valid ng-dirty" type="checkbox" ng-model="profile.notif_content" <?php echo (notifications(0, 'comm_posts', $notifications) == '1') ? "checked" : ""; ?>>
														</td>	
														<td>
															<input id="comments-posts-email" class="ng-valid ng-dirty" type="checkbox" ng-model="profile.email_content" <?php echo (notifications(1, 'comm_posts', $notifications) == '1') ? "checked" : ""; ?>>
														</td>														
													
													</tr>
													<tr>
													
														<td class="ng-binding">Comments on my starred posts</td>
														
														<td>
															<input id="comments-starred-posts-msg" class="ng-valid ng-dirty" type="checkbox" ng-model="profile.notif_content" <?php echo (notifications(0, 'comm_s_posts', $notifications) == '1') ? "checked" : ""; ?>>
														</td>	
														<td>
															<input id="comments-starred-posts-email" class="ng-valid ng-dirty" type="checkbox" ng-model="profile.email_content" <?php echo (notifications(1, 'comm_s_posts', $notifications) == '1') ? "checked" : ""; ?>>
														</td>														
													
													</tr>	

													<tr>
													
														<td class="ng-binding">Likes on my posts & comments</td>
														
														<td>
															<input id="links-msg" class="ng-valid ng-dirty" type="checkbox" ng-model="profile.notif_content" <?php echo (notifications(0, 'links', $notifications) == '1') ? "checked" : ""; ?>>
														</td>	
														<td>
															<input id="links-email" class="ng-valid ng-dirty" type="checkbox" ng-model="profile.email_content" <?php echo (notifications(1, 'links', $notifications) == '1') ? "checked" : ""; ?>>
														</td>														
													
													</tr>	

													<tr>
													
														<td class="ng-binding">Mentions</td>
														
														<td>
															<input id="mentions-msg" class="ng-valid ng-dirty" type="checkbox" ng-model="profile.notif_content" <?php echo (notifications(0, 'mentions', $notifications) == '1') ? "checked" : ""; ?>>
														</td>	
														<td>
															<input id="mentions-email" class="ng-valid ng-dirty" type="checkbox" ng-model="profile.email_content" <?php echo (notifications(1, 'mentions', $notifications) == '1') ? "checked" : ""; ?>>
														</td>														
													
													</tr>	

													<tr>
													
														<td class="ng-binding">Invitation to a space</td>
														
														<td>
															<input id="invitations-msg" class="ng-valid ng-dirty" type="checkbox" ng-model="profile.notif_content" <?php echo (notifications(0, 'invitations', $notifications) == '1') ? "checked" : ""; ?>>
														</td>	
														<td>
															<input id="invitations-email" class="ng-valid ng-dirty" type="checkbox" ng-model="profile.email_content" <?php echo (notifications(1, 'invitations', $notifications) == '1') ? "checked" : ""; ?>>
														</td>														
													
													</tr>													
													
													<tr>
														<td class="ng-binding">Private message</td>
														<td> </td>
														<td>
															<input id="private-email" class="ng-pristine ng-valid" type="checkbox" ng-model="profile.email_private_msg" <?php echo (notifications(1, 'private_msg', $notifications) == '1') ? "checked" : ""; ?> >
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>

									
									<div class="col-sm-12 form-group">
										<label class="col-sm-2 control-label"> </label>
										<div class="col-sm-5">
											<button id="btn-update-settings" class="btn btn-xs btn-primary ng-binding" onclick="btnUpdateSettings()">Update setting</button>
										</div>
									</div>

								</form>
							
							</div>						
						
						</div><!-- end update settings -->						
					
					</div><!-- end  right_form  -->

				</div><!-- end my profile row-->
			
			</div><!-- end my profile area -->
			