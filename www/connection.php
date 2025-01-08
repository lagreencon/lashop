<?php

	// Database configuration 
    header("Access-Control-Allow-Origin: *");
	$sernamename = "localhost";
	$username    = "designsa_emma";
	$passoword   = "R@b11bits";
	$databasename= "designsa_wishvilley";

	// Create database connection
	$con = mysqli_connect($sernamename, $username,$passoword,$databasename);

	// Check connection
	if ($con->connect_error) {
		die("Connection failed". $con->connect_error);
	}
//echo "Connected successfully";
?>