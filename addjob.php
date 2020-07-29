<?php
	require 'header.php';
?>

<main>
	<div class="col-md-4 offset-md-2 mx-auto mt-5">
		<p class="display-4">Add A Job Profile</p>

		<form class="addjob-form" action="includes/addjob.inc.php" method="post">
			<div class="form-row">
			    <div class="form-group col-md-12">
			      <label>Company</label>
			      <input type="text" class="form-control" name="company" id="company" placeholder="company name...">
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-12">
			      <label>Title</label>
			      <input type="text" class="form-control" name="title" id="title" placeholder="job title...">
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-12">
			      <label>Descrition</label>
			      <textarea class="form-control" id="description" name="description" rows="5" placeholder="job description (skills req, works, basic details)..."></textarea>
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-12">
			      <label>Stipend</label>
			      <input type="text" class="form-control" name="stipend" id="stipend" placeholder="stipend amount you are willing to pay...">
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-8">
			    	<label>Duration</label>
			    	<input type="number" class="form-control" name="duration" id="duration" placeholder="duration (in weeks)...">
			    </div>
			</div>

			<button class="btn my-2 btn-success my-sm-0" type="submit" name="addjob" id="addjob">Add a Job</button>
		</form>
	</div>
</main>

<?php
	require 'footer.php';
?>