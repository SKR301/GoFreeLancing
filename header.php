<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<title>GoFreeLancing</title>
</head>
<body>

	<header>
		<img class="logo" src="img/logo.png">
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
			        	<a class="nav-link" href="home.php">Home</a>
			        </li>
			        <?php
			        	if(isset($_SESSION["username"]))
						{
							echo '<li class="nav-item">
								<a class="nav-link" href="profile.php">Profile</a>
							</li>';
						}
					?>
					<li class="nav-item">
						<a class="nav-link" href="addjob.php">AddJob</a>
					</li>
				</ul>
			
			<form class="form-inline mr-sm-5 col-lg-6 position-absolute" style="margin-left: 200px;" action="job.php" method="get">
		      	<input class="form-control mr-sm-2 col-lg-8" type="search" name="keyword" placeholder="Search...">
		      	<button class="btn btn-primary my-2 my-sm-0 mr-sm-5" type="submit">Go</button>
		    </form>
			
			<?php
				if(!isset($_SESSION["username"]))
				{
					echo '<form class="register form-inline my-lg-0" action="includes/login.inc.php" method="post">
			      	<input class="form-control ml-lg-5 mr-sm-2 col-lg-4" type="text" name="email" id="email" placeholder="email...">
			      	<input class="form-control mr-sm-2 col-lg-4" type="password" name="password" id="password" placeholder="password...">
				  	<button class="btn my-2 btn-outline-success my-sm-0" type="submit" name="login_btn" id="login_btn">Sign In</button>
					</form>';
					echo '<a class="nav-link" href="signup.php">SignUp</a>';
				}
				else
				{
					echo "<h4 class='mr-sm-5 ml-sm-5 my-sm-0 display-5'>Hello ".$_SESSION["username"]."!</h4>";
					echo '<form action="includes/logout.inc.php" method="post">
					<button class="btn my-2 btn-dark my-sm-0" type="submit" name="logout_btn" id="logout_btn">SignOut</button>
					</form>';
				}
			?>	
			</div>
		</nav>
	</header>