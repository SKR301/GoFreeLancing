<?php
	
	require 'dbh.inc.php';
	
	if(isset($_POST["signup_btn"]))
	{
		$username=$_POST["username"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$repassword=$_POST["re-password"];
		$phno=$_POST["phno"];

		if(empty($username)||empty($email)||empty($password)||empty($repassword)||empty($phno))
		{
			header("Location: ../signup.php?error=emptyfields&username=".$username."&email=".$email."&phno".$phno);
			exit();
		}
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			header("Location: ../signup.php?error=invalid_email&username=".$username."&email=".$email."&phno".$phno);
			exit();
		}
		else if(!preg_match("/^[a-zA-Z0-9]*$/",$username))
		{
			header("Location: ../signup.php?error=invalid_username&email=".$email."&phno".$phno);
			exit();
		}
		else if(strlen($password)<8)
		{
			header("Location: ../signup.php?error=invalid_password&username=".$username."&email=".$email."&phno".$phno);
			exit();
		}
		else if(!preg_match("/^[0-9]*$/",$phno))
		{
			header("Location: ../signup.php?error=invalidfields&username=".$username."&email=".$email);
			exit();
		}
		else if($password!==$repassword)
		{
			header("Location: ../signup.php?error=password_not_match&username=".$username."&email=".$email."&phno".$phno);
			exit();
		}
		else
		{
			$sql="SELECT email from user_det WHERE email = ?";
			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql))
			{
				header("Location: ../signup.php?error=sql_error");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($sql,"s",$email);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$result_check=mysqli_stmt_num_rows($stmt);

				if($result_check>0)
				{
					header("Location: ../signup.php?error=email_exist");
					exit();
				}
				else
				{
					$sql="INSERT INTO user_det (username,email,pass,phno) VALUES (?,?,?,?)";

					$stmt=mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt,$sql))
					{
						header("Location: ../signup.php?error=sql_error");
						exit();
					}
					else
					{
						$hashed_password=password_hash($password, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt,"ssss",$username,$email,$hashed_password,$phno);
						mysqli_stmt_execute($stmt);

						header("Location: ../signup.php?signup=success");
						exit();
					}
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);		
	}
	else
	{
		header("Location: ../signup.php");
		exit();			
	}
	