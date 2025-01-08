<?php

	// Database connection 
	
	require_once('connection.php');
	//$editId = 5;

	//$z= 'housing';
	$data=array(); 
$q=mysqli_query($con, "SELECT * FROM products "); 
while ($row=mysqli_fetch_object($q)){
    $data[]=$row; }

echo json_encode($data); 
//echo $data; 	
	 
$con->close();

?>