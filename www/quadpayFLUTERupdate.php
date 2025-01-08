 <?php
require_once('connection.php');

 $input = @file_get_contents("php://input");
    $event = json_decode($input, true);
     
    $tx_ref=$event->data->tx_ref;
    $event_type=$event->event.type;
    $narration=$event->data->narration;
    $amount=$event->data->amount;
   	$status=$event->data->status;
   	$customer=$event->data->customer->name;
   	$email=$event->data->customer->email;
   	$last_4digits=$event->data->card->last_4digits;
   	$issuer=$event->data->card->issuer;
   $card_type=$event->data->card->card_type;
   $expiry=$event->data->card->expiry;
   $originatorname=$event->data->meta->originatorname;
   $bankname=$event->data->meta->bankname;
   $originatoraccountnumber=$event->data->meta->originatoraccountnumber;
   	

 
$quadbankname = $bankname;
$quadbanknumber = $originatoraccountnumber;
$quadbankcode = $event_type; 
$quadpayOLDValue = "none";
$quadbankcost = $amount;
$quadbankbalance = "none";
$quadbankamount = $amount;
$quadbanknarration = "$narration $originatorname $event_type";
$quadbanktransID = $tx_ref; 
$quadbankdevice = "none"; 
$quadbankemail = $email; 
$quadbankclientID = "none"; 
$quadbankclientEMAIL =""; 
$quadbanklat = "none"; 
$quadbanklog = "none"; 
$quadbankbilltype = $event_type;
$id = rand(1,99999999);
 

	$query = "SELECT * FROM quadpay WHERE email='$quadbankemail'OR clientID ='$quadbankclientID '";

	$result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
		    $trasactID=$row['trasactionID'];
		    
		    $newbalance22=$row['newbalance'];
		    $OLDbalance=$row['newbalance'];
		    $NEWbalance=$OLDbalance+$quadbankamount;
        $initial_lat=$row['lat'];
		    $initial_log=$row['log'];}


$insert = mysqli_query($con,"INSERT INTO `quadpay_translog` (`id`, `clientID`, `name`, `email`, `phone`, `recipient_email`, `recipient_ID`, `accountno`, `log`, `lat`, `trasactionID`, `amount`, `oldbalance`, `newbalance`, `bankname`, `device`, `billname`, `narration`, `billtype`, `billamount`, `preferences`, `created_at`) VALUES ('$id', NULL, NULL, '$quadbankemail', NULL, '$quadbankclientEMAIL', '$quadbankclientID','$quadbanknumber' , NULL, NULL, '$quadbanktransID', '$quadbankamount', '$OLDbalance', '$NEWbalance', '$quadbankname', NULL, '$quadbankbilltype', '$quadbanknarration', '$quadbankbilltype', '$quadbankcost', NULL, CURRENT_TIMESTAMP)");

        

		$update = "UPDATE `quadpay` SET `amount` = '$quadbankamount',`newbalance` = '$NEWbalance',`oldbalance` = '$quadpayOLDValue' where `email`='$quadbankemail' OR `clientID`='$quadbankclientID'";
			mysqli_query($con, $update);



 if($update){
            echo "successful";
        
    }
    else {
        echo "ERROR";}
  $con->close();


?>      