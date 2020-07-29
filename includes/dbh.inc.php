<?php

$servername="localhost:3307";
$DBUsername="root";
$DBPassword="";
$DBName="gofreelancing";

$conn=mysqli_connect($servername,$DBUsername,$DBPassword,$DBName);

if(!$conn)
{
	die("Connection failed:".mysqli_connect_error());
}