<?php
  $curl = curl_init();
  
  	$item_code = $_POST['itemcode'];
    $code = $_POST['billcode'];
    $customer= $_POST['customer'];
    $bill = $_POST['bill'];
    $billcost = $_POST['billcost'];
    $billername = $_POST['billername'];
    $email = $_POST['email'];
 
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.flutterwave.com/v3/bill-items/$item_code/validate?code=$code&&customer=$customer",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer FLWSECK-4924367c4945d8a25e1bbe069a03834f-18ab06b2694vt-X"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
      $response;
    $data=array();
  $data=json_decode($response);
    $status=$data->status;
     $response_message=$data->data->response_message;
     $customer=$data->data->customer;
     $name=$data->data->name;
      
  //echo $customer;
   echo " Device No:";echo $customer;echo "  Device ID:";echo $name;echo "  amount #";echo $billcost;
  }
?>
