<?php

	session_start();
	if(isset($_POST["logout_btn"]))
	{	
		if(isset($_SESSION["username"]))
		{
			session_unset();
			session_destroy();
			header("Location: ../home.php?logout=successfull");
			exit();
		}
	}
	else
	{
		header("Location: ../home.php?");
		exit();
		
	}

