<?php
  $url = "https://api.paystack.co/transferrecipient";

  $fields = [
    "type" => "nuban",
    "name" => "Danila Emmanuel Osi",
    "account_number" => "2017520542",
    "bank_code" => "033",
    "currency" => "NGN"
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
  echo $result;
   $data=json_decode($result);
  $recipient_code=$data->data->recipient_code;
  include_once('transfer.php');
?>