<?php

  require_once('connection.php');
    $date=date_create();$date2=date_create();
 
    $lastE = date_add($date,date_interval_create_from_date_string("-7 days"));
    $newdate=date_format($date2,"Y-m-d");
    $olddate = date_format($date,"Y-m-d");  
    $from= $olddate;
    $to= $newdate;
    
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.flutterwave.com/v3/transactions?from=$from&to=$to",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => '{" tx_ref ": "9312146493",}',
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer FLWSECK-4924367c4945d8a25e1bbe069a03834f-18ab06b2694vt-X",
      "Cache-Control: no-cache",
    ),
  ));

$response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
     $response;
    $data=array();;
  $data=json_decode($response);
    }
  echo $response;
  $x=1400;
 for ($x = 0; $x < 1400; $x++) {
     
    $tx_ref=$data->data[$x]->tx_ref;
    
    $narration=$data->data[$x]->narration;
    $amount=$data->data[$x]->amount;
   	$status=$data->data[$x]->status;
   	$customer=$data->data[$x]->customer->name;
   	$email=$data->data[$x]->customer->email;
   	$payment_type=$data->data[$x]->payment_type;
   	$account=$data->data[$x]->meta->originatoraccountnumber;
    
    $originatorname=$data->data[$x]->meta->originatorname;
    $originatorbankname=$data->data[$x]->meta->bankname;
    
$quadbankname = $originatorbankname;
$quadbanknumber = $account;
$quadbankcode = $payment_type; 
$quadpayOLDValue = "none";
$quadbankcost = $amount;
$quadbankbalance = "none";
$quadbankamount = $amount;
$quadbanknarration = "$originatorname by: $payment_type 
   frm $originatorbankname acc: $account desc: $narration ";
$quadbanktransID = $tx_ref; 
$quadbankdevice = "none"; 
$quadbankemail = $email; 
$quadbankclientID = "none"; 
$quadbankclientEMAIL =$email; 
$quadbanklat = "none"; 
$quadbanklog = "none"; 
$quadbankbilltype = $payment_type;
$id = rand(1,99999999);
  
  echo $quadbanknarration;echo $quadbanktransID;echo " ;";
  
  }
?>