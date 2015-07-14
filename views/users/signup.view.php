<div class="registration_form_area">

	<form class="form-registration" name="signupform" id="signupform" onsubmit="return false">
		<span id="status"></span> <br>

		<h2 class="form-signin-heading">Sign up with followin credentials.</h2>

		<!-- full name -->
		<input id="fullname" class="input-block-level" type="text" placeholder="Full name" onkeyup="restrict('fullname')" onfocus="emptyElement('status');">

		<!-- position -->
		<input id="position" class="input-block-level" type="text" placeholder="Position" onkeyup="restrict('position')" onfocus="emptyElement('status');">

		<!-- user name -->
		<span id="unamestatus"></span>
		<input id="username" class="input-block-level" type="text" placeholder="User name"  onkeyup="restrict('username')" onblur="checkusername()" maxlength="32" onfocus="emptyElement('status');">

		<!-- email -->
		<span id="emailstatus"></span>
		<input id="email" class="input-block-level" type="text" placeholder="eMail" onkeyup="restrict('email')" onblur="checkemail()" onfocus="emptyElement('status');" >

		<!-- email permission -->
		<label class="checkbox">
			<input id="emailperm" type="checkbox" value="remember-me">Show my eMail to other members (Optional). 
		</label>

		<!-- password -->
		<span id="plstatus"></span>
		<input id="password" class="input-block-level" type="password" name = "password" placeholder="Password" onblur="checkpassword()" onfocus="emptyElement('status'); emptyElement('plstatus')">

		<!-- password again -->
		<span id="pmstatus"></span>
		<input id="passwordagain" class="input-block-level" type="password" name = "password_again" placeholder="Password again" onfocus="emptyElement('status');" onkeyup="checkpassword();">

		<input id="hidden" type="text" style="display: none">

		<button id="signupbtn" class="btn btn-large btn-primary" onclick="signup()">Sign up</button>

		<p>Already a member <a href="signin.php">Sign in</a></p>
	</form> <!-- end loginform -->

</div><!--  end login form sign in area-->