<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.flutterwave.com/v3/virtual-account-numbers",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => '{"is_permanent": "true", 
  "bvn" : "22240524737","phonenumber" : "08074651451", 
  "firstname" : "danila","lastname" : "osi", "tx_ref" : "4555666777","email": "lagreencon@gmail.com"}',
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer FLWSECK-4924367c4945d8a25e1bbe069a03834f-18ab06b2694vt-X",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
