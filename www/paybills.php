<?php
  $curl = curl_init();
  
  
    $email = $_POST['quadnewemail'];
    $bill = $_POST['bill'];
  	$item_code = $_POST['itemcode'];
    $code = $_POST['billcode'];
    $country= "NG";
    $customer= $_POST['customer'];
    $amount = $_POST['billcost'];
    $type = $_POST['billername'];
 $reference = $_POST['quadbanktransID'];
 
 //$customer= "09022285272";
   // $amount = "50";
   // $type = "Airtime";
 //$reference = "23541665";
 

$url = "https://api.flutterwave.com/v3/bills";
  $fields = [
    
    "amount"=> $amount,
"biller_name"=>  $type,
"country"=> $country,
"customer"=> $customer,
//"package_data"=> "DATA",
"recurrence"=> "ONCE",
"reference"=> $reference,
"type"=> $type ,
   
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
 // echo $result;
  $result;
    $data=array();
  $data=json_decode($result);
  $status=$data->status;
  
  echo $status;
  
?>
