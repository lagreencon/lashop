<?php

	// Database connection 
	
	require_once('connection.php');

//$dollartotal = $_GET['dollartotal']; 
//$nairatotal = $_GET['nairatotal'];  
$code = $_GET['code']; 
$device = $_GET['device'];    	 
$myemail = $_GET['myemail'];
$newcode = rand(11112290222,89909657444);
//$data=array();

 $insert = mysqli_query($con,"INSERT INTO `table_regitration_wish_log` (  `nemail` ,`confirm_password` ,`code` ,`code1`,`code2` ,`device` ) VALUES ('$myemail','fakeperson','$code','$code1','$code2',$device')");
			   echo "error"; 
		
    
        
 


        $con->close();
?>
