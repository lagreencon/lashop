<?php
	
	// Database connection 
	session_start(); 
	require_once('connection.php');
	
	
	$material = $_POST['status'];
	$id = $_POST['pid_in'];
	$thickness = $_POST['reference'];
    $email = $_POST['email'];
		$update = "UPDATE `wishvile_table` SET `material` = '$material',`thickness` = '$thickness' where `id`='$id' AND `Email`='$email'";
			mysqli_query($con, $update);
			
		
			
			
			
			 if($update){
    echo $material;}
    else
    echo "error";
	$con->close();	
	//$lenght = $_POST['lenght'];
//	$breadth = $_POST['breadth'];
//	$area = $_POST['area'];
//	$area1 =($lenght)*($breadth);
	//	echo json_encode($area1);
?>