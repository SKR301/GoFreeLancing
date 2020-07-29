<?php
	require 'header.php';
	require 'includes/dbh.inc.php';
?>


<main>
	<div class="col-md-7 offset-md-2 mx-auto mt-5">

		<?php
			if(empty($_GET["keyword"]))
			{
				$sql="SELECT * from job";
				$result=mysqli_query($conn,$sql);
				$query_result=mysqli_num_rows($result);

				if($query_result>0)
				{
					while($row=mysqli_fetch_assoc($result))
					{
						echo '<form class="form border border-info rounded mt-3" id="'.$row["j_id"].'" action="includes/apply.inc.php" method="post">
							<div class="p-4">
								<h2 class="text-primary">'.$row["company"].'</h2>
								<h3 class="text-success d-inline">'.$row["title"].'</h3>
								<div class="float-right">
									<p class="d-inline form-text text-muted"><b>'.$row["stipend"].' Rs</b></p>
									for
									<p class="d-inline form-text text-muted"><b>'.$row["duration"].' weeks</b></p>
								</div>
								<p class="col-md-8 text-truncate">'.$row["description"].'</p>
								<a class="text-center" href="view.php?id='.$row["j_id"].'">more...</a>
								<button class="btn btn-success my-2 my-sm-0 mr-sm-5 float-right" name="apply_btn" type="submit">Apply</button>
							</div>
						</form>';
					}
				}
				else
				{
					echo '<form class="form border border-info rounded mt-3" id="'.$row["j_id"].'" action="includes/apply.inc.php" method="post">
							<div class="p-4">
								<h2 class="text-primary">No result Found</h2>
							</div>
						</form>';
				}
			}
			else
			{
				$keyword=mysqli_real_escape_string($conn,$_GET["keyword"]);
				$sql="SELECT * FROM job WHERE company LIKE '%$keyword%' OR title LIKE '%$keyword%' OR description LIKE '%$keyword%'";
				$result=mysqli_query($conn,$sql);

				$query_result=mysqli_num_rows($result);

				if($query_result>0)
				{
					while($row=mysqli_fetch_assoc($result))
					{
						echo '<form class="form border border-info rounded mt-3" id="'.$row["j_id"].'" action="includes/apply.inc.php" method="post">
							<div class="p-4">
								<h2 class="text-primary">'.$row["company"].'</h2>
								<h3 class="text-success d-inline">'.$row["title"].'</h3>
								<div class="float-right">
									<p class="d-inline form-text text-muted"><b>'.$row["stipend"].' Rs</b></p>
									for
									<p class="d-inline form-text text-muted"><b>'.$row["duration"].' weeks</b></p>
								</div>
								<p class="col-md-8 text-truncate">'.$row["description"].'</p>
								<a class="text-center" href="view.php?id='.$row["j_id"].'">more...</a>
								<button class="btn btn-success my-2 my-sm-0 mr-sm-5 float-right" name="apply_btn" type="submit">Apply</button>
							</div>
						</form>';
					}
				}
				else
				{
					echo '<form class="form border border-info rounded mt-3" action="includes/apply.inc.php" method="post">
							<div class="p-4">
								<h2 class="text-primary">No result Found</h2>
							</div>
						</form>';
				}
			}
		?>
		


	</div>	

</main>
<?php
	require 'footer.php';
?>