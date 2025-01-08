<?php
	
	// Database connection 
	session_start(); 
	require_once('connection.php');
	
	
	$e_mail = $_POST['maildevice'];
	$deviceName = $_POST['deviceupd'];
	$inpcode = $_POST['INcode'];
    //$email = $_POST['email'];
    $qct=mysqli_query($con, "SELECT * FROM `table_regitration_wish`  WHERE nemail='$e_mail'"); 
while ($row=mysqli_fetch_assoc($qct)){
   $d3  = $row["3d"]; $codenow  = $row["code"];
    }
    if ($d3==$inpcode){
		$update = "UPDATE `table_regitration_wish` SET `device` = '$deviceName' where `3d`='$inpcode' AND `nemail`='$e_mail'";
			mysqli_query($con, $update);
			
		
			
			
			
			 if($update){
    echo $codenow ;}
    else{
    echo "error";}}else{echo "error;wrong code";}
	$con->close();	
	//$lenght = $_POST['lenght'];
//	$breadth = $_POST['breadth'];
//	$area = $_POST['area'];
//	$area1 =($lenght)*($breadth);
	//	echo json_encode($area1);
?>