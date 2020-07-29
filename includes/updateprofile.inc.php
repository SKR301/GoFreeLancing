<?php
	session_start();
	require 'dbh.inc.php';

	if(isset($_POST["update_btn"]))
	{
		$username=$_POST["username"];
		$phno=$_POST["phno"];

		if(!preg_match("/^[a-zA-Z0-9]*$/",$username))
		{
			header("Location: ../profile.php?error=invalid_username&phno".$phno);
			exit();
		}
		else if(!preg_match("/^[0-9]*$/",$phno))
		{
			header("Location: ../profile.php?error=invalidfields&username=".$username);
			exit();
		}
		else
		{
			if(!empty($username))
			{
				$sql="UPDATE user_det SET username = ? WHERE u_id = ?";

				$stmt=mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt,$sql))
				{
					header("Location: ../signup.php?error=sql_error");
					exit();
				}
				else
				{
					mysqli_stmt_bind_param($stmt,"ss",$username,$_SESSION["u_id"]);
					mysqli_stmt_execute($stmt);
					$_SESSION["username"]=$username;
					header("Location: ../profile.php?updated=successful");
				}				
			}
			if(!empty($phno))
			{
				$sql="UPDATE user_det SET phno = ? WHERE u_id = ?";

				$stmt=mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt,$sql))
				{
					header("Location: ../signup.php?error=sql_error");
					exit();
				}
				else
				{
					mysqli_stmt_bind_param($stmt,"ss",$phno,$_SESSION["u_id"]);
					mysqli_stmt_execute($stmt);
					$_SESSION["phno"]=$phno;
					header("Location: ../profile.php?updated=successful");
				}				
			}
		}

		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
	else
	{
		header("Location: ../profile.php");
		exit();
	}