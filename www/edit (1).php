<?php
  $url = "https://login.remita.net/uaasvc/uaa/token";
  $fields = [
    "username"=> "UzAwMDA0MDUzNzR8MTEwMDExNjEzMjUwfDIzODA5ZmJiNjFkMWVkYTg5NzdkODZjMzkzZjI3ZjkxMmFkODdjMzIyYjczOGYwNTBkNGMyZWQ1Njg4MjkwZGQwMTY3MzgzNzQ3OTJkMjA1YTQ4ZTY0NGJhZTNlNTQyYTE1MzljZTA2YjRjZDVjMmQ3Mjc3N2JmNjcyNTFhNmQx",
   "password"=> "0257d571dd293a0357f97ae540bcb07b69f0b279a5d3475e45907b903da788ba7e98c7ea6800f14dc59eae7d901c3c0de70ca277a27c97cae801a29325c335bd",
  
  ];
  $fields_string = http_build_query($fields);
  //open connection
  $ch = curl_init();
  
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
 
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  
  //execute post
  $result = curl_exec($ch);
  echo $result;
?>
PUBLIC UzAwMDA0MDUzNzR8MTEwMDExNjEzMjUwfDIzODA5ZmJiNjFkMWVkYTg5NzdkODZjMzkzZjI3ZjkxMmFkODdjMzIyYjczOGYwNTBkNGMyZWQ1Njg4MjkwZGQwMTY3MzgzNzQ3OTJkMjA1YTQ4ZTY0NGJhZTNlNTQyYTE1MzljZTA2YjRjZDVjMmQ3Mjc3N2JmNjcyNTFhNmQx

SECRET 
0257d571dd293a0357f97ae540bcb07b69f0b279a5d3475e45907b903da788ba7e98c7ea6800f14dc59eae7d901c3c0de70ca277a27c97cae801a29325c335bd