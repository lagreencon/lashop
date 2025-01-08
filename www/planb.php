<?php
$t2 = $_POST['t2'];
	$t1 = $_POST['t1'];
	$duration = $_POST['duration'];
  $url = "https://api.paystack.co/plan";

  $fields = [
    'name' => $t1,
    'interval' => "monthly", 
    'amount' => $t2,
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
   $response1;
  $data=json_decode($response1);
   echo	$plan_code=$data->data->plan_code;
 
?>