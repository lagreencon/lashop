<?php

	// Database connection 
	
	require_once('connection.php');



$quadbanktransID = $_POST['Tbanknumber'];


        //echo "success";
       
       $q=mysqli_query($con, "SELECT * FROM table_regitration_wish WHERE id ='$quadbanktransID' OR `regno` = '$quadbanktransID'"); 
while ($row=mysqli_fetch_assoc($q)){
    $data[]=$row;
   //echo json_encode($data);
 $name = $row["name"];
   $qemail= $row["nemail"];
 
  echo $name; echo ","; echo $qemail;
}  
         $con->close();
?>