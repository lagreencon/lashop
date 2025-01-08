<?php
	// Database connection 
	session_start(); 
	require_once('connection.php');
	
	
	$ttime = $_POST['ttime'];
	$paytotal = $_POST['transprice'];
	$authorization_code = $_POST['authorization_code'];
	$area1 = $_POST['area'];
    $plan_code=$_POST['plan_code'];
	
	$comment = $_POST['comment'];
	$id = $_POST['tr_id'];
	$newFile = $_POST['sum'];
	$Email = $_POST['email'];
	$imagepath = "NON";
	$duration = $_POST['maturity'];	
	$newAmount =($newFile)*100 ;
	 $sub_type = "C";   
    
	
	
		//$myLng = $_POST['myLng'];
	//$myLat = $_POST['myLat'];
	//$image = $_FILES['image'];
	//$imageid = $_POST['id'];
	//$phone = $_POST['phone'];
	//$name = $_POST['name'];	
	//$time =time();
		//$id1 = rand(90,89909);
		
		
		
		$insert = "INSERT INTO wishvile_table (id, imagepath, Email, area1, comment, file,pay_total,sub_type,time,plan_code, duration ) VALUES('$id', '$imagepath', '$Email', '$area1', '$comment', '$newFile','$paytotal','$sub_type','$ttime','$plan_code','$duration')";
			mysqli_query($con, $insert);
			
			 

 
	
		




  $url = "https://api.paystack.co/transaction/charge_authorization";

  $fields = [
     // 'authorization_code' => "AUTH_glor0pxhnv",
    'authorization_code' => $authorization_code,
    'email' => $Email,
    'amount' => $newAmount,
    'plan_code' => $plan_code,
    'reference'=> $id
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
  $result = curl_exec($ch);
  //echo $result;
  $result;
  $data=json_decode($result);
    $amount=$data->data->amount;
   	$status=$data->data->status;
   	//$authorization_code=$data->data->authorization->authorization_code;
   	$reference=$data->data->reference;
   	$card_type=$data->data->authorization->card_type;
   	$exp_month=$data->data->authorization->exp_month;
    $exp_year=$data->data->authorization->exp_year;
   	$bin=$data->data->authorization->bin;
   	$signature=$data->data->authorization->signature;
    	$reusable=$data->data->authorization->reusable;
    	$bank=$data->data->authorization->bank;
    $material = $status;
	$thickness = $authorization_code;
    $update = "UPDATE `wishvile_table` SET `material` = '$material',`thickness` = '$thickness' ,`authorization_code` = '$authorization_code',`card_date` = '$exp_month',`card_bin` = '$bin',`card_type` = '$card_type',`card_bank` = '$bank',`card_year` = '$exp_year',`card_lastno` = '$reusable',`construction` = '$status',`card_name` = '$signature',`card_bank` = '$bank'where `id`='$reference' AND `Email`='$Email'";
			mysqli_query($con, $update);
			if($update){
    echo "success";echo $status;}
    else
    echo "error";
	
?>