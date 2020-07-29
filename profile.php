<?php
	require 'header.php';
?>

<main>
	<div class="col-md-4 offset-md-2 mx-auto mt-5">
		<p class="display-4">Edit Profile</p>

		<form class="signup-form" action="includes/updateprofile.inc.php" method="post">
			<div class="form-row">
			    <div class="form-group col-md-12">
			      <label>Email</label>
			      <?php
			      	echo '<input type="text" class="form-control" name="email" id="email" placeholder="'.$_SESSION["email"].'" disabled>';
			      ?>
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-12">
					<label>Username</label>
					<?php
						echo '<input type="text" class="form-control" name="username" id="username" placeholder="'.$_SESSION["username"].'">';
					?>
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-12">
			      	<label>Phone Number</label>
			      	<?php
				    	echo '<input type="text" class="form-control" name="phno" id="phno" placeholder="'.$_SESSION["phno"].'">';
			    	?>
			    </div>
			 </div>

			<button class="btn my-2 btn-success my-sm-0" type="submit" name="update_btn" id="update_btn">Update</button>
		</form>
	</div>	
</main>

<?php
	require 'footer.php';
?>