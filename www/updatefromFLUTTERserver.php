<?php

 require_once('connection.php');
 $quadcheckINserver = $_POST['checkIN'];
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
  //echo $response;
  $x=1400;
 for ($x = 0; $x < 1400; $x++) {
     
    $tx_ref=$data->data[$x]->id;
    //$tx_ref=$data->data[$x]->tx_ref;
    $narration=$data->data[$x]->narration;
    $amount=$data->data[$x]->amount;
   	$status=$data->status[$x];
   	$customer=$data->data[$x]->customer->name;
   	$email=$data->data[$x]->customer->email;
   	$payment_type=$data->data[$x]->payment_type;
   	$account=$data->data[$x]->meta->originatoraccountnumber;
    $poststatus=$data->data[$x]->status;
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
  
  if ($poststatus=="successful"){$truestatus="6";} else if ($status=="processing") {$truestatus="5";}else{$truestatus="4";}
  
  $registerrec = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `quadpay_translog` WHERE `trasactionID` ='$quadbanktransID'"));
    if($registerrec == 0 && $poststatus=="successful")
    { 
        $query = "SELECT * FROM quadpay WHERE email='$quadbankemail'";

	$result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
		    $trasactID=$row['trasactionID'];
		    
		    $newbalance22=$row['newbalance'];
		    $OLDbalance=$row['newbalance'];
		    $NEWbalance=$OLDbalance+$quadbankamount;
        $initial_lat=$row['lat'];
		    $initial_log=$row['log'];}
        
        
        
        $insert = mysqli_query($con,"INSERT INTO `quadpay_translog` (`id`, `clientID`, `name`, `email`, `phone`, `recipient_email`, `recipient_ID`, `accountno`, `log`, `lat`, `trasactionID`, `amount`, `oldbalance`, `newbalance`, `bankname`, `device`, `billname`, `narration`, `billtype`, `billamount`, `preferences`, `created_at`) VALUES ('$id', NULL, NULL, '$quadbankemail', NULL, '$quadbankclientEMAIL', '$quadbankclientID','$quadbanknumber' , NULL, NULL, '$quadbanktransID', '$quadbankamount', '$OLDbalance', '$NEWbalance', '$quadbankname', NULL, '$quadbankbilltype', '$quadbanknarration', '$quadbankbilltype', '$quadbankcost', '$truestatus', CURRENT_TIMESTAMP)");
        
        $update = "UPDATE `quadpay` SET `amount` = '$quadbankamount',`preferences` = '$truestatus',`newbalance` = '$NEWbalance',`oldbalance` = '$quadpayOLDValue' where `email`='$quadbankemail'";
			mysqli_query($con, $update);



 if($update){
            echo "successful transfer to: ";
          echo $quadbankemail;
    }
    else {
        echo "ERROR";}
        
        
    }
    else if($registerrec != 0)
        echo "exist";echo $quadbankemail;
        //$con->close();
     
 }unlink("error_log");
  
?>