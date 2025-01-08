<?php

	// Database connection 
	
	require_once('connection.php');
	//$editId = 5;
	if (!empty($z= $_GET['z'])){
	$x=$_GET['x'];
	$y= $_GET['y'];
	
	//$z= 'housing';
	$data=array(); 
$q=mysqli_query($con, "SELECT * FROM products WHERE products='$z'  LIMIT $x, $y"); 
while ($row=mysqli_fetch_object($q)){
    $data[]=$row; 
}}else{$x=$_GET['x'];
	$y= $_GET['y'];
	
	//$z= 'housing';
	$data=array(); 
$q=mysqli_query($con, "SELECT * FROM products  LIMIT $x, $y"); 
while ($row=mysqli_fetch_object($q)){
    $data[]=$row; 
}}
echo json_encode($data); 
//echo $data; 	
	 
$con->close();

?>