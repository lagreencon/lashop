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

 $query = "SELECT * FROM quadpay WHERE email='$quadbankemail'";

	$result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
		    
		    $OLDbalance=$row['newbalance'];}

$url = "https://api.flutterwave.com/v3/transfers";
  $fields = [
    'account_bank' => "044",
    'amount' => "10",
    'account_number' => "0690000040",
    'narration' => "jjj",
    'currency' => "NGN",
    'reference' => "55666",
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
 echo $result;
  
  ?>