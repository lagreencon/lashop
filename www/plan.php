
<?php
//DATADASE ENTRY
// Database connection 
	session_start(); 
	require_once('connection.php');

if (!empty($_POST['pay_amout'])){	
	$ttime = $_POST['ttime'];
	$paytotal = $_POST['select1'];

	$area1 = $_POST['pay_total'];

	$comment = $_POST['comment'];

	$duration = $_POST['duration'];
	$sub_type = $_POST['autofund'];
	
	$pay_amout = ($_POST['pay_amout'])*100;
	$myLng = $_POST['myLng'];
		$myLat = $_POST['myLat'];
	
	$newFile = $_POST['pay_amout'];

	$imageid = $_POST['id'];
	   
    $Email = $_POST['email'];
	$imagepath = "NON";
		

		
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
		


  $url = "https://api.paystack.co/plan";
  $fields = [
    //'name' => "Monthly retainer",
   'name' => $sub_type,
    'interval' => "monthly", 
    //'interval' => $sub_type, 
    'amount' => $pay_amout,
    //'amount' => '30000',
	//'invoice_limit'=> '3'
	'invoice_limit'=> $duration
	
  ];
  $fields_string = http_build_query($fields);
  //open connection
  $ch = curl_init();
  
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer sk_live_3e276667f5b0ccd5a05ee836683247c74c6c4d6c",
    "Cache-Control: no-cache",
  ));
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  
  //execute post
  $response1 = curl_exec($ch);
  echo $response1;
  $data=json_decode($response1);
	$plan_code=$data->data->plan_code;
	
	
			 $insert = mysqli_query($con,"INSERT INTO `wishvile_table` (`id`,`PersonID`, `imagepath`, `Email`, `phone`, `imageid`,  `area1`, `material`, `thickness`, `comment`, `file`, `LOG`, `LAT`, `pay_total`, `nim`, `bvn`, `KinName`, `KinNumber`, `sub_type`, `time`, `kin_relation`, `Address`, `others`, `plan_code`, `duration`, `remark`, `remark2`, `remark3`) VALUES ('$id','$id', '$imagepath ', '$Email', '$phone','$imageid ','$area1', '$material', NULL, '$comment', '$newFile', '$myLng', '$myLat', $paytotal, NULL, NULL, NULL, NULL, '$sub_type' , '$ttime ', NULL, NULL, NULL, '$plan_code', '$duration', '$device', '$code ', '$code1 ')");
			mysqli_query($con, $update);
			
			 if($update){
    echo "success";}
    else
    echo "error";
	
	
	
	
	include_once('initialize1.php');
	
	header("Location: http://design.lashop.com.ng/plan.php");}else header("Location: http://design.lashop.com.ng/errorpage.php"); 
	//echo "enter amount"
	$con->close();
?>
<-?php

  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/plan",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{
		
      'name'=> $Monthlye,
      'interval'=> 'monthly',
      'amount'=> 500000,
	  'invoice_limit': 3
    }",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_live_3e276667f5b0ccd5a05ee836683247c74c6c4d6c",
      "Cache-Control: no-cache"
    ),
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
	$data=json_decode($response);
	$plan_code=$data->data->plan_code;
	//include_once('initialize1.php');
  }
?>