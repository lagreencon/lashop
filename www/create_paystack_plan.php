<?php
// create a plan programitically

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/plan",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => [
    "name" => "Monthly Retainer",
    "interval" => "monthly",
    "amount" => 110000
  ],
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer sk_live_3e276667f5b0ccd5a05ee836683247c74c6c4d6c",
    "Cache-Control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ( $err ) {
  echo "cURL Error #:" . $err;
} 
else {
  echo $response;
}

?>