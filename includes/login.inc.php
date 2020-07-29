<?php

	if(isset($_POST["login_btn"]))
	{
		require 'dbh.inc.php';

		$email=$_POST["email"];
		$password=$_POST["password"];

		if(empty($email)||empty($password))
		{
			header("Location: ../home.php?error=empty_fields");
			exit();
		}
		else
		{
			$sql="SELECT * from user_det WHERE email = ?";
			$stmt=mysqli_stmt_init($conn);

			if(!mysqli_stmt_prepare($stmt,$sql))
			{
				header("Location: ../home.php?error=sql_error");
				exit();
			}
			else
			{
				mysqli_stmt_bind_param($stmt,"s",$email);
				mysqli_stmt_execute($stmt);
				$result=mysqli_stmt_get_result($stmt);

				if($row=mysqli_fetch_assoc($result))
				{
					$password_check=password_verify($password, $row["pass"]);

					if($password_check==false)
					{
						header("Location: ../home.php?error=password_error1".$password."   ".$row["pass"]);
						exit();
					}
					else if($password_check==true)
					{
						session_start();
						$_SESSION['username']=$row["username"];
						$_SESSION['email']=$row["email"];
						$_SESSION['phno']=$row["phno"];
						$_SESSION['u_id']=$row["u_id"];
						$_SESSION['pass']=$row["pass"];


						header("Location: ../home.php?login=success");
						exit();
					}
					else
					{
						header("Location: ../home.php?error=password_error2");
						exit();
					}
				}
				else
				{
					header("Location: ../home.php?error=no_user_found");
					exit();
				}
			}
		}
	}