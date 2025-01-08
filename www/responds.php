<?php
require_once('connection.php');
// Retrieve the request's body and parse it as JSON
//$input = @file_get_contents("php://input");"event": "transfer.completed
$input = file_get_contents("php://input");
$event = json_decode($input);
$status=$event->data->status;
$statusevent=$event->event;
$subscription_code=$event->data->subscription_code;
$customer_email=$event->data->customer->email;
$samount=$event->data->amount;
$reference=$event->data->reference;
$planamount=$event->data->plan->amount;
$pamount=$event->data->plan->name;
$plan_code=$event->data->plan->plan_code;
$plan_name=$event->data->plan->name;
$interval=$event->data->plan->interval;
$authorization_code=$event->data->authorization->authorization_code;
$bin=$event->data->authorization->bin;
$exp_month=$event->data->authorization->exp_month;
$bank=$event->data->authorization->bank;
$account_name=$event->data->authorization->account_name;
$email=$event->data->customer->email;
$customer_code=$event->data->customer->customer_code;
$phone=$event->data->customer->phone;
$created_at=$event->data->created_at;
$event=$event->event;
$material=$status;
//$update = "UPDATE table_images1 SET others = '$others' WHERE plan_code = '$plan_code'";
	//		mysqli_query($con, $update);
	//		unlink($filePath);
$update = "UPDATE `wishvile_table` SET `remark3` = '$status',`Address` = '$authorization_code' where `id`='$reference' AND `Email`= '$customer_email' ";



			mysqli_query($con, $update);
	
	$q=mysqli_query($con, "SELECT * FROM wishvile_table  WHERE Email='$customer_email'"); 
while ($row=mysqli_fetch_assoc($q)){
   $id  = $row["id"];  }
   
			 if($reference !== $id){$insert = mysqli_query($con,"INSERT INTO `wishvile_table` ( `id` , `plan_code` ,`sub_type` ,`Email` ,`pay_total` ,`material`  ) VALUES ('$reference','$plan_code','$plan_name','$customer_email','$samount','$material')");}

$planamountcon = $planamount/100;
$samountcon = $samount/100;

$quadbanknarration ="new savings:$reference, amt:$samount, plannm:$plan_name,plnamt:$planamountcon, tranfbank:$bank, crtdate:$created_at, " ;			 
$insertlog = mysqli_query($con,"INSERT INTO `quadpay_translog` (`id`, `clientID`, `name`, `email`, `phone`, `recipient_email`, `recipient_ID`, `accountno`, `log`, `lat`, `trasactionID`, `amount`, `oldbalance`, `newbalance`, `bankname`, `device`, `billname`, `narration`, `billtype`, `billamount`, `preferences`, `created_at`) VALUES ('$id', NULL, NULL, '$customer_email', NULL, '$customer_email', '$quadbankRecipientID', '$reference', NULL, NULL, '$reference', '$samountcon'$planamountcon'', '$oldbalance1', '$currentbalance', 'WISHVILLE', NULL, NULL, '$quadbanknarration', '$quadbankbilltype', '$quadbankamount', NULL, CURRENT_TIMESTAMP)");
			 
    
unlink($filePath);
// Do something with $event
http_response_code(200); // PHP 5.4 or greater
?>