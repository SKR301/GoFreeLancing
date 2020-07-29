<?php
	require 'header.php';
?>

<main>	
	<div class="col-md-4 offset-md-2 mx-auto mt-5">
		<p class="display-4">SignUp</p>

		<form class="signup-form" action="includes/signup.inc.php" method="post">
			<div class="form-row">
			    <div class="form-group col-md-12">
					<label>Username</label>
					<input type="text" class="form-control" name="username" id="username" placeholder="username...">
					<small id="emailHelp" class="form-text text-muted">Allowed characters: a-z, A-Z, 0-9, _(underscore)</small>
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-12">
			      <label>Email</label>
			      <input type="text" class="form-control" name="email" id="email" placeholder="email...">
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-12">
			      <label>Password</label>
			      <input type="password" class="form-control" name="password" id="password" placeholder="password...">
					<small id="emailHelp" class="form-text text-muted">Must be 8 characters long</small>
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-12">
			      <label>RE-Password</label>
			      <input type="password" class="form-control" name="re-password" id="re-password" placeholder="re-password...">
			    </div>
			 </div>
			 <div class="form-row">
			    <div class="form-group col-md-12">
			      <label>Phone Number</label>
			      <input type="text" class="form-control" name="phno" id="phno" placeholder="phone number...">
			    </div>
			 </div>

			<button class="btn my-2 btn-success my-sm-0" type="submit" name="signup_btn" id="signup_btn">Sign Up</button>
		</form>
	</div>	
</main>

<?php
	require 'footer.php';
?>