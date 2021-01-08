<?php
	$server='localhost';
	$id='userA';
	$pwd='Apwd';
	$dbname='toys';   
	$con = @mysqli_connect($server , $id , $pwd);
	if (!$con){
  		die("Could not connect" . mysqli_connect_errno () . " " . mysqli_connect_error());
  	}
	mysqli_select_db($con , $dbname);
	mysqli_query($con ,"SET NAMES utf8");
	// mysql_close($con);
?>