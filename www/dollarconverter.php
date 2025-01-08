<?php
	
	// Database connection 
	session_start(); 
	require_once('connection.php');
    $naira_amout = $_POST['naira_amout'];
	$dollar = $_POST['dollar'];
	$id = $_POST['id'];
	$Conmail= $_POST['Cmail'];
	$RATE= 7/100;
	$confirmColor = "#edb809";
	$date=date("l jS \of F Y h:i:s A");
	$remark= "success"; 
	$converttransID = rand(1000000,9999999);
	$convertnarration = "DOLLAR CONVERT $naira_amout at rate of $dollar";
	
	$query = "SELECT * FROM wishvile_table WHERE Email='$Conmail' AND id='$id'";
    
	$result = mysqli_query($con, $query);
	
while ($row = mysqli_fetch_assoc($result)) {
		   
		    $dueday=$row['dday'];
		    $duration=$row['duration'];
		 
		    $date1=date_create("$dueday");
            $date2=date_create();
            $diff=date_diff($date2,$date1);
            $daysdiff =$diff->format("%R%a days");
            $newdateremain=$daysdiff/31;}
    
	if($naira_amout>=100){
	 $convert = ($naira_amout )/($dollar);
	$other1s = number_format($convert, 2);
    $newsupposeddollarINT = ($convert * $RATE * $newdateremain)+$convert;
    
    $others =$other1s ;
    $FINALdollerint = number_format($newsupposeddollarINT, 2);
	$sub_type = 'fixedfund';
	
	$insert = mysqli_query($con,"INSERT INTO `quadpay_translog` (`id`, `clientID`, `name`, `email`, `phone`, `recipient_email`, `recipient_ID`, `accountno`, `log`, `lat`, `trasactionID`, `amount`, `oldbalance`, `newbalance`, `bankname`, `device`, `billname`, `narration`, `billtype`, `billamount`, `preferences`, `created_at`) VALUES ('$converttransID', NULL, NULL, '$Conmail', NULL, '$Conmail', '', NULL, NULL, '', '$converttransID', '$naira_amout', '$other1s', NULL, NULL, '$id', NULL, '$convertnarration', '$naira_amout', NULL, NULL, CURRENT_TIMESTAMP)");
	
	
	

		$update = "UPDATE `wishvile_table` SET `others` = '$others',`file` = '0',`newprice` = '$naira_amout',`thickness` = '$confirmColor',`area1`= '$FINALdollerint',`material`= '$date',`remark`= '$remark',`remark2`= 'converted' where `id`='$id'";
			mysqli_query($con, $update);
		
			 if($update){echo "successful";//echo  $newdateremain;
			 
		 
			 
    }
    }
    else{
    echo "ERROR! ERROR!! amount less than 100naira";}

?>