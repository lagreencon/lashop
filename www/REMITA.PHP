

<?php

$postRequest = array(
   'username'=>'UzAwMDA0MDUzNzR8MTEwMDExNjEzMjUwfDIzODA5ZmJiNjFkMWVkYTg5NzdkODZjMzkzZjI3ZjkxMmFkODdjMzIyYjczOGYwNTBkNGMyZWQ1Njg4MjkwZGQwMTY3MzgzNzQ3OTJkMjA1YTQ4ZTY0NGJhZTNlNTQyYTE1MzljZTA2YjRjZDVjMmQ3Mjc3N2JmNjcyNTFhNmQx',
      'password'=>'0257d571dd293a0357f97ae540bcb07b69f0b279a5d3475e45907b903da788ba7e98c7ea6800f14dc59eae7d901c3c0de70ca277a27c97cae801a29325c335bd',
	  
);

$cURLConnection = curl_init('https://remitademo.net/remita/exapp/api/v1/send/api/uaasvc/uaa/token');
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_POST, true);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, 1);curl_setopt($cURLConnection, CURLOPT_URL, rawurlencode($url));
 curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json'
      
  ));
$apiResponse = curl_exec($cURLConnection);
curl_close($cURLConnection);

  echo $apiResponse;
// $apiResponse - available data from the API request
//$jsonArrayResponse - json_decode($apiResponse);
?><?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://remitademo.net/remita/exapp/api/v1/send/api/availablereferencedata',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'X-API-PUBLIC-KEY: UzAwMDA0MDUzNzR8MTEwMDExNjEzMjUwfDIzODA5ZmJiNjFkMWVkYTg5NzdkODZjMzkzZjI3ZjkxMmFkODdjMzIyYjczOGYwNTBkNGMyZWQ1Njg4MjkwZGQwMTY3MzgzNzQ3OTJkMjA1YTQ4ZTY0NGJhZTNlNTQyYTE1MzljZTA2YjRjZDVjMmQ3Mjc3N2JmNjcyNTFhNmQx',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;?>
<?php

 // A sample PHP Script to POST data using cURL
 
  $data = array(
      'username'=>'UzAwMDA0MDUzNzR8MTEwMDExNjEzMjUwfDIzODA5ZmJiNjFkMWVkYTg5NzdkODZjMzkzZjI3ZjkxMmFkODdjMzIyYjczOGYwNTBkNGMyZWQ1Njg4MjkwZGQwMTY3MzgzNzQ3OTJkMjA1YTQ4ZTY0NGJhZTNlNTQyYTE1MzljZTA2YjRjZDVjMmQ3Mjc3N2JmNjcyNTFhNmQx',
      'password'=>'0257d571dd293a0357f97ae540bcb07b69f0b279a5d3475e45907b903da788ba7e98c7ea6800f14dc59eae7d901c3c0de70ca277a27c97cae801a29325c335bd',
  );
   
  $post_data = json_encode($data);
   
  // Prepare new cURL resource
  $crl = curl_init('https://remitademo.net/remita/exapp/api/v1/send/api/availablereferencedata');
  curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($crl, CURLINFO_HEADER_OUT, true);
  curl_setopt($crl, CURLOPT_POST, true);
  curl_setopt($crl, CURLOPT_POSTFIELDS, $post_data);
   
  // Set HTTP Header for POST request 
  curl_setopt($crl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json'
      
  ));
   
  // Submit the POST request
  $result = curl_exec($crl);
   
  // handle curl error
  
  // Close cURL session handle
  curl_close($crl);echo $result;
   
?>