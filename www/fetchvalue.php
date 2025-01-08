<?php

	// Database connection 
	
	require_once('connection.php');

$myemail = $_POST['myemail'];    	 
$id = $_POST['id']; 
$data=array();
$result = mysqli_query($con, "SELECT * FROM wishvile_table  WHERE Email='$myemail' AND id='$id'");
while($res = mysqli_fetch_array($result))
{
$name = $res['file'];
$data[]=$res; 
//you can display more row data by id 
echo $name;
}//echo json_encode($data);
$con->close();
?>
