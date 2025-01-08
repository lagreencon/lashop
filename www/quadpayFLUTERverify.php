 <?php
require_once('connection.php');
$curl = curl_init();
  //$id = 88626907;
    $emailquadpay = $_POST['mmail'];
    $uploadamount= $_POST['fluterquadamount'];
  	$txref = $_POST['trans_id'];
   
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/verify_by_reference?tx_ref=$txref",
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
  
   $result = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    
  //echo $result;
  $result;
    $data=array();
  $data=json_decode($result);
  
   
  
    $tx_ref=$data->data->tx_ref;
    $message=$data->data->message;
    $narration=$data->data->narration;
    $amount=$data->data->amount;
   	$status=$data->data->status;
   	$customer=$data->data->customer->name;
   	$email=$data->data->customer->email;
   	$last_4digits=$data->data->card->last_4digits;
   	$issuer=$data->data->card->issuer;
   $card_type=$data->data->card->card_type;
   $expiry=$data->data->card->expiry;
   $originatorname=$data->data->meta->originatorname;
   $bankname=$data->data->meta->bankname;
   $originatoraccountnumber=$data->data->meta->originatoraccountnumber;
   }
   	

 
$quadbankname = $bankname;
$quadbanknumber = $originatoraccountnumber;
$quadbankcode = $event_type; 
$quadpayOLDValue = $_POST['quadpayoldValue'];
$quadbankcost = $amount;
$quadbankbalance = $_POST['quadpaybillcostbalance'];
$quadbankamount = $amount;
$quadbanknarration = $narration;
$quadbanktransID = $tx_ref; 
$quadbankdevice = $_POST['quadbankdevice']; 
$quadbankemail = $email; 
$quadbankclientID = "none"; 
$quadbankclientEMAIL =$email; 
$quadbanklat = "none"; 
$quadbanklog = "none"; 
$quadbankbilltype = $event_type;
$id = rand(1,99999999);

if ($status=="success"){$truestatus="6";} else if ($status=="processing") {$truestatus="5";}else{$truestatus="4";}
 
if( $emailquadpay == $email && $uploadamount == $amount && $txref==$tx_ref && $status=="success"){
	$query = "SELECT * FROM quadpay WHERE email='$quadbankemail'OR clientID ='$quadbankclientID '";

	$resultee = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($resultee)) {
		    $trasactID=$row['trasactionID'];
		    
		    $newbalance22=$row['newbalance'];
		    $OLDbalance=$row['newbalance'];
		    $NEWbalance=$OLDbalance+$quadbankamount;
        $initial_lat=$row['lat'];
		    $initial_log=$row['log'];}


$insert = mysqli_query($con,"INSERT INTO `quadpay_translog` (`id`, `clientID`, `name`, `email`, `phone`, `recipient_email`, `recipient_ID`, `accountno`, `log`, `lat`, `trasactionID`, `amount`, `oldbalance`, `newbalance`, `bankname`, `device`, `billname`, `narration`, `billtype`, `billamount`, `preferences`, `created_at`) VALUES ('$id', NULL, NULL, '$quadbankemail', NULL, '$quadbankclientEMAIL', '$quadbankclientID','$quadbanknumber' , NULL, NULL, '$quadbanktransID', '$quadbankamount', '$OLDbalance', '$NEWbalance', '$quadbankname', NULL, '$quadbankbilltype', '$quadbanknarration', '$quadbankbilltype', '$quadbankcost', '$truestatus', CURRENT_TIMESTAMP)");

       

		$update = "UPDATE `quadpay` SET `amount` = '$quadbankamount',`newbalance` = '$NEWbalance',`oldbalance` = '$OLDbalance' where `email`='$quadbankemail' ";
			mysqli_query($con, $update);
 


 if($update){
            echo "successful";
        
    }
    else {
        echo "ERROR";}} else {echo "INVALID TRANSACTION";}
  $con->close();


?>      