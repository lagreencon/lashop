<?php
$account_number = $_POST['Tbanknumber'];   	 
$account_bank = $_POST['Tbankcode'];
//$account_number = "2017520542" ;   	 
//$account_bank = "033";
$url = "https://api.flutterwave.com/v3/accounts/resolve";
  $fields = [
    'account_bank' => $account_bank,
    
    'account_number' => $account_number,
   
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
  $account_name=$data->data->account_name;
  echo $account_name;
  
  ?>