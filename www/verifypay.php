<?php
  $curl = curl_init();
  //$id = 88626907;
    //$email = "lagreencon@gmail.com";
    //$uploadamount= 10000;
  	$id = $_POST['pid_in'];
    $email = $_POST['email'];
    $uploadamount= $_POST['uploadamount'];
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/$id",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_live_3e276667f5b0ccd5a05ee836683247c74c6c4d6c",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
     $response;
    
  $data=json_decode($response);
    $amount=$data->data->amount;
   	$status=$data->data->status;
   	$authorization_code=$data->data->authorization->authorization_code;
   	$card_type=$data->data->authorization->card_type;
   	$exp_month=$data->data->authorization->exp_month;
    $exp_year=$data->data->authorization->exp_year;
   	$bin=$data->data->authorization->bin;
   	$signature=$data->data->authorization->signature;
    	$reusable=$data->data->authorization->reusable;
    	$bank=$data->data->authorization->bank;
    session_start(); 
	require_once('connection.php');
	$card_details = "bin:$bin,card_type:$card_type,bank:$bank,exp_month:$exp_month,exp_year:$exp_year,signature:$signature";
	$d_details = "funding wishville,(card_type:$card_type,bank:$bank)";
	$material = $status;
	$true_amount = $uploadamount/100;
	
    if ($status=="success"){$truestatus="6";} else if ($status=="processing") {$truestatus="5";}else{$truestatus="4";}
    
		
		
			 if($amount==$uploadamount){
			     $update = "UPDATE `wishvile_table` SET `file_name` = '$card_details',`Address` = 'authorization_code' ,`imageid` = '$card_type',`remark3` = '$status',`imagepath` = '$signature' where `id`='$id' AND `Email`='$email'";
			mysqli_query($con, $update);
			
			$insert = mysqli_query($con,"INSERT INTO `quadpay_translog` (`id`, `clientID`, `name`, `email`, `phone`, `recipient_email`, `recipient_ID`, `accountno`, `log`, `lat`, `trasactionID`, `amount`, `oldbalance`, `newbalance`, `bankname`, `device`, `billname`, `narration`, `billtype`, `billamount`, `preferences`, `created_at`) VALUES ('$id', NULL, NULL, '$email', NULL, '$email', '$quadbankRecipientID', '$quadbanknumber', NULL, NULL, '$id', '$true_amount', '$oldbalance1', '$currentbalance', '$bank', NULL, NULL, '$d_details', '$card_type', '$amount', '$truestatus', CURRENT_TIMESTAMP)");
			
    echo "CORRECT AMOUNT";}
    else
    echo "none correct  AMOUNT";
    
    
    
  }$con->close();
?>
