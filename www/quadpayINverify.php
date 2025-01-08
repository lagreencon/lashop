<?php

	// Database connection 
	
	require_once('connection.php');



$quadbanktransID = $_POST['Tbanknumber'];


        //echo "success";
       
       $q=mysqli_query($con, "SELECT * FROM quadpay WHERE clientID ='$quadbanktransID' OR `accountno` = '$quadbanktransID'"); 
while ($row=mysqli_fetch_assoc($q)){
   
$qemail = $row["email"];
 $name  = $row["name"];
  echo $name; echo ","; echo $qemail;
}  
         $con->close();
?>