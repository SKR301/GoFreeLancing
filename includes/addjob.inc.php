<?php
	session_start();
	require 'dbh.inc.php';

	if(isset($_POST["addjob"]))
	{
		$company=$_POST["company"];
		$title=$_POST["title"];
		$description=$_POST["description"];
		$stipend=$_POST["stipend"];
		$duration=$_POST["duration"];

		if(empty($company)||empty($title)||empty($description)||empty($stipend)||empty($duration))
		{
			header("Location: ../addjob.php?error=emptyfields&company=".$company."&title=".$title."&description=".$description."&stipend=".$stipend."&duration".$duration);
			exit();
		}
		else if(!preg_match("/^[0-9]*$/",$stipend))
		{
			header("Location: ../addjob.php?error=invalid_stipend&company=".$company."&title=".$title."&description=".$description."&duration".$duration);
			exit();
		}
		else if(!preg_match("/^[0-9]*$/",$duration))
		{
			header("Location: ../addjob.php?error=invalid_duration&company=".$company."&title=".$title."&description=".$description."&stipend=".$stipend);
			exit();
		}
		else
		{
			$sql="INSERT INTO job (u_id,company,title,description,stipend,duration) VALUES (?,?,?,?,?,?)";

			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql))
			{
				header("Location: ../addjob.php?error=sql_error");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($stmt,"ssssss",$_SESSION["u_id"],$company,$title,$description,$stipend,$duration);
				mysqli_stmt_execute($stmt);

				header("Location: ../addjob.php?added=success");
				exit();
			}

			mysqli_stmt_close($stmt);
			mysqli_close($conn);		
		}
	}
	else
	{
		header("Location: ../addjob.php");
		exit();
	}