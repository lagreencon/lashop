<?php

	// Database connection 
	
	require_once('connection.php');
	
	$myemail = $_GET['myemail'];
	$data=array(); 
	
$q=mysqli_query($con, "SELECT * FROM `wishvile_table`  WHERE Email='$myemail' GROUP BY card_name"); 
while ($row=mysqli_fetch_object($q)){
    $data[]=$row; 

}
echo json_encode($data); 
//echo $data; 	
$con->close();
?>