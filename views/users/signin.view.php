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