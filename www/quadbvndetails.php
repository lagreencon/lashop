<?php



$benVN= $_POST['BVNnumber'];   	 
$SSname = $_POST['SURNname'];
$OTHER_name = $_POST['OTHERname'];
$gen_ref = rand(100000000, 999999999);
$eMAIl = $_POST['OTHERname'];

$fields = [
    'phonenumber'=> $benVN,
    'tx_ref'=> $gen_ref,
    'email'=> $eMAIl,
    'is_permanent'=> "true",
    'bvn' => $benVN,
    
    'first_name' => $SSname,
    'last_name' => $OTHER_name, ];

$url = "https://api.flutterwave.com/v3/bvn/verifications";
 $fields_string = http_build_query($fields);

  //open connection
  $ch = curl_init();
  
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer FLWSECK-4924367c4945d8a25e1bbe069a03834f-18ab06b2694vt-X",
    "Cache-Control: no-cache",
  ));
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  
  //execute post
  $result = curl_exec($ch);
  echo $result;
  $data=array();
  $data=json_decode($result);
  $status=$data->status;
  $reffer=$data->data->reference;
  
  echo $reffer;
   ?>