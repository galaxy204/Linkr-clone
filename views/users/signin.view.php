<div class="login_form_area">

	<form id="signinform" class="form-signin" onsubmit="return false">

		<span id="status"></span> <br>

		<h2 class="form-signin-heading">Sign in with your account</h2>
		<!-- email -->
		<input id="email" class="input-block-level" type="text" placeholder="eMail" onfocus="emptyElement('status');">
		<!-- password -->
		<input id="password" class="input-block-level" type="password" placeholder="Password" onfocus="emptyElement('status');">
		<!-- <label class="checkbox">
			<input type="checkbox" value="remember-me">Keep me signed in 
		</label> -->
		<button id="signinbtn" class="btn btn-large btn-primary" type="submit" onclick="signin()">Sign in</button>
		
		<p>Not yet member? <a href="signup.php">Sign up</a></p>
		<p><a href="#">Forgot password?</a></p>
	</form>	

</div><!--  end login form sign in area-->





<!-- SCRIPTS -->
<script src="../js/ajax.js"></script>
<script src="../js/main.js"></script>

<script>
function signin()
{
	var e = _("email").value;
	var p = _("password").value;
	if(e == "" || p == ""){
		_("status").innerHTML = "Fill out all of the form data";
	} else {
		_("signinbtn").style.display = "none";
		_("status").innerHTML = 'please wait ...';
		var ajax = ajaxObj("POST", "signin.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "ok"){
					window.location = "../index.php";
				} else {
					_("signinbtn").style.display = "block";
					_("status").innerHTML = ajax.responseText;
				}
	        }
        }
        ajax.send("e="+e+"&p="+p);
	}
}
</script>