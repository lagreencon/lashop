<?php
	
	// Database connection 
	session_start(); 
	require_once('connection.php');

	$ttime = $_POST['ttime'];
	$paytotal = $_POST['transprice'];
	
	$area1 = $_POST['area'];

	$plan_code=$_POST['plan_code'];
	$Address = $_POST['Address'];
	$comment = $_POST['comment'];
	$material = $_POST['cuttingTech'];
	$thickness = $_POST['thickness'];

	$sub_type = $_POST['type'];
	
	$myLng = $_POST['myLng'];
		$myLat = $_POST['myLat'];
	$newFile = $_POST['sum'];
	$image = $_FILES['image'];
	$imageid = $_POST['id'];
	$date=date_create();  
	//$matured = date_format($date,"Y-m-d");
	$duration = $_POST['maturity'];
	$dat="+$duration months";

date_modify($date,$dat);
$dday = date_format($date, 'Y-m-d');
	
	
    $Email = $_POST['email'];
	$imagepath = "NON";
		
	$phone = $_POST['phone'];
	$name = $_POST['name'];
		
	$time =time();
		$id = $_POST['tr_id'];
		$id1 = rand(90,89909);
		if (!empty($_FILES['file']['name'])) {

	     $fileTmp = $_FILES['file']['tmp_name'];

	     $allowImg = array('png','jpeg','jpg','gif','bmp','mp4');

	     $fileExnt = explode('.', $_FILES['file']['name']);

	     $fileActExt   = strtolower(end($fileExnt));

	     $newFile1 = $id1. '.'. $fileActExt;

$destination = 'customer/'.$newFile1;

copy($fileTmp ,$destination );
}
	
	
 
	
			$update = "INSERT INTO `wishvile_table` (`id`, `PersonID`, `imagepath`, `Email`, `phone`, `imageid`, `file_name`, `area1`, `material`, `thickness`, `comment`,`dday`, `file`, `newprice`, `LOG`, `LAT`, `pay_total`, `nim`, `bvn`, `KinName`, `KinNumber`, `sub_type`, `time`, `kin_relation`, `Address`, `others`, `plan_code`, `duration`, `remark`, `remark2`, `remark3`) 
			VALUES ('$id', NULL, '$imagepath', '$Email', NULL, '$imageid', '$newFile1', '$area1', '$material', '$thickness', '$comment','$dday', '$newFile', '', '$myLng', '$myLat', '$paytotal', '$nim', '$bvn', '$KinName', '$KinNumber', '$sub_type', '$ttime', '$kinrelation', '$Address', '$others', '$plan_code','$duration', NULL, NULL, NULL)";
			mysqli_query($con, $update);
			
			 if($update){
    echo "success";}
    else{
    echo "error";}

?>