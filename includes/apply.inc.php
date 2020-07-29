<?php
	session_start();
	require 'dbh.inc.php';

	if(!$_SESSION["username"])
	{

	}
	else
	{
		$to="";
		$subject="";
		$message="";
		$header="From:".$_SESSION["email"];

		if(mail($to,$subject,$message,$header))
		{
			header("Location: ../job.php?applied=successful");
			exit();
		}
		else
		{
			header("Location: ../job.php?applied=failed");
			exit();
		}
	}
	