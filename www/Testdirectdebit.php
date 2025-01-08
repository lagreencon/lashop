<?php
require_once('connection.php');


$url = "https://api.flutterwave.com/v3/charges?type=debit_ng_account";
  $fields = [
    'account_bank' => "033",
    'amount' => 100,
    'account_number' => "2017520542",
    'email'=> "lagreencon@gmail.com",
    'currency' => "NGN",
    'tx_ref' => "7033002245",
    "passcode"=> "11061984",
  "bvn"=> "22240524737",
    
   
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
  $result;
    $data=array();
  $data=json_decode($result);
  $status=$data->status;
  $name=$data->data->full_name;
  $bank_name=$data->data->bank_name;
  	
  echo $status;
  ?>