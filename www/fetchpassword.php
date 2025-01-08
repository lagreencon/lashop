<?php

	// Database connection 
	
	require_once('connection.php');


$device1 = $_POST['device1'];    	 
$mmail = $_POST['mmail'];
//$data=array();

  $result=mysqli_query($con, "SELECT * FROM table_regitration_wish  WHERE nemail='$mmail'"); 
while ($row=mysqli_fetch_assoc($result)){
   $password  = $row["password"]; 
   $email  = $row["nemail"]; }  
   
   if($result!="null"||$result!=""){
        echo $password;
       
        }
    else
   echo "error";
    
  
        $con->close();
?>