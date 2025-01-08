
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.flutterwave.com/v3/transfers',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "account_bank": "033",
    "account_number": "2017520542",
    "amount": 500,
    "narration": "Aoooooooo Trnsfr xx007",
    "currency": "NGN",
    "reference": "osi-8uu888888",
    "callback_url": "https://www.flutterwave.com/ng/",
    "debit_currency": "NGN"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer FLWSECK-4924367c4945d8a25e1bbe069a03834f-18ab06b2694vt-X'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;