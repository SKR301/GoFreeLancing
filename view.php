<?php
	require 'includes/dbh.inc.php';
	require 'header.php';
?>
<?php

	$url = $_SERVER['REQUEST_URI'];

	$id=$url[strlen($url)-1];
	
	$sql="SELECT * FROM job WHERE j_id='$id'";

	$result=mysqli_query($conn,$sql);
	$query_result=mysqli_num_rows($result);

	$row=mysqli_fetch_assoc($result);

	echo '<div class="col-md-7 offset-md-2 mx-auto mt-5">
		<form class="form border border-info rounded mt-3" id="'.$row["j_id"].'" action="includes/apply.inc.php" method="post">
			<div class="p-4">
				<h2 class="text-primary">'.$row["company"].'</h2>
				<h3 class="text-success d-inline">'.$row["title"].'</h3>
				<div class="float-right">
					<p class="d-inline form-text text-muted"><b>'.$row["stipend"].' Rs</b></p>
					for
					<p class="d-inline form-text text-muted"><b>'.$row["duration"].' weeks</b></p>
				</div>
				<p class="col-md-8">'.$row["description"].'</p>
				<button class="btn btn-success my-2 my-sm-0 mr-sm-5" name="apply_btn" type="submit">Apply</button>
			</div>
		</form>
		</div>';

?>
<?php
	require 'footer.php';
?>
