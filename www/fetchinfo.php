<?php

	// Database connection 
	
	//include 'updatefromFLUTTERserver.php';
	require_once('connection.php');

//$dollartotal = $_GET['dollartotal']; 
//$nairatotal = $_GET['nairatotal'];  
$code = $_GET['code']; 
$device = $_GET['device'];    	 
$myemail = $_GET['myemail'];
//$data=array();

$result =mysqli_num_rows( mysqli_query($con, "SELECT * FROM table_regitration_wish WHERE  nemail ='$myemail ' AND code='$code' AND device='$device'"));
if($result!=0){
        //echo "success";
       
        $q=mysqli_query($con, "SELECT * FROM table_regitration_wish WHERE nemail='$myemail'  AND code='$code'"); 
while ($row=mysqli_fetch_assoc($q)){
   $newcode1  = $row["code"]; 
   $email  = $row["nemail"];
   $Surname  = $row["Surname"];
   $name  = $row["name"];
   $regno  = $row["regno"];
   $phone = $row["phone"];
    echo $Surname ;echo "," ;echo $name ;echo "," ;echo $email ;echo "," ;echo $regno ;
}    
        
   if($code!=0 && $code=$newcode1){      
    $update = "UPDATE `table_regitration_wish_log` SET `confirm_password` = 'succcessul' where `nemail`='$myemail' OR `code`='$code'";
			mysqli_query($con, $update); }
			
	
			
        }
    else 
			{  $insert = mysqli_query($con,"INSERT INTO `table_regitration_wish_log` (  `nemail` ,`confirm_password` ,`code` ,`code1`,`code2` ,`device` ) VALUES ('$myemail','fakeperson','$code','$code1','$code2',$device')");
			   echo "error"; echo "," ;echo $phone; 
			}
        
        
 


        $con->close();
?>
