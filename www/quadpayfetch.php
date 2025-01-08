<?php

	// Database connection 
	
	
	require_once('connection.php');
	$myemail = $_GET['myemail'];
	$quadbanktransID  = $_GET['quadbanktransID '];
	$query = "SELECT * FROM quadpay WHERE email='$myemail'OR clientID ='$quadbanktransID '";

	$result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
		    $trasactID=$row['trasactionID'];
		    $Billamount=$row['billamount'];
            $amount_server=$row['amount'];
		    $newbalance=$row['newbalance'];
		     $oldbalance=$row['oldbalance'];
        $initial_lat=$row['lat'];
		    $initial_log=$row['log'];
    }
    
$amount_show = number_format($newbalance, 2);
echo "<div class='tab'><table style='background-color:#ed79e9;opacity:2;color:black;border: 1px solid #555;border-color:#ed79e9'><div ><thead><tr><th style='background-color:#ed79e9;width:20%;opacity:2;color:black;text-align: left;'>Quadpay Bal(&#8358;)</th><th id='quadpaybalance' style='background-color:#f5c6e7;opacity:2;color:black;text-align: center;'>" . $amount_show. "</th></tr></thead></div>";


$con->close();
?>