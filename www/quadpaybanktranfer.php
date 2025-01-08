<?php
require_once('connection.php');
$quadbankemail = $_POST['email']; 
$reference = $_POST['transbank_ref']; 
$amount = $_POST['transbank_amount'];   	 
$account_bank = $_POST['bank_code'];
$account_number = $_POST['bank_accountnumber'];   	 
$narration = $_POST['bank_narration'];
//$account_number = "2017520542" ;   	 
//$account_bank = "033";
//$amount = "100"; 
//$reference = "45521365";
 $query = "SELECT * FROM quadpay WHERE email='$quadbankemail'";

	$result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
		    
		    $OLDbalance=$row['newbalance'];}

$url = "https://api.flutterwave.com/v3/transfers";
  $fields = [
    'account_bank' => $account_bank,
    'amount' => $amount,
    'account_number' => $account_number,
    'narration' => $narration,
    'currency' => "NGN",
    'reference' => $reference,
    'callback_url' => "https://wish.designsandsystems.com.ng/quadpayverifybanktranfer.php",
    'debit_currency' => "NGN",
   
  ];
  
  $fields_string = http_build_query($fields);
  
  //open connection
  $ch = curl_init();
  
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer FLWSECK-4924367c4945d8a25e1bbe069a03834f-18ab06b2694vt-X",
  ));
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  
  //execute post
  $result = curl_exec($ch);
  //echo $result;
  $result;
    $data=array();
  $data=json_decode($result);
  $status=$data->status;
  $name=$data->data->full_name;
  $bank_name=$data->data->bank_name;
  
  
  if ($status=="success"){$truestatus="6"; $currentbalance=$OLDbalance-$amount;} else if ($status=="processing") {$truestatus="5"; $currentbalance=$OLDbalance-$amount;  }else{$truestatus="4";}
  $update = "UPDATE `quadpay_translog` SET `preferences` = '$truestatus' where `email`='$quadbankemail' AND trasactionID='$reference'";
			mysqli_query($con, $update);
	$update2 = "UPDATE `quadpay` SET `newbalance` = '$currentbalance' where `email`='$quadbankemail' ";
			mysqli_query($con, $update2);		
  echo $status;
  ?>