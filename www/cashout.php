 <?php
require_once('connection.php');

$quadbankname = $_POST['quadbankname'];
$quadbanknumber = $_POST['quadbanknumber'];
$quadbankcode = $_POST['quadbankcode']; 
$quadbankamount = $_POST['quadbankamount'];
$quadbanknarration = $_POST['quadbanknarration'];
$quadbanktransID = $_POST['quadbanktransID']; 
$quadbankdevice = $_POST['quadbankdevice']; 
$quadbankemail = $_POST['quadbankemail']; 
$quadbankclientID = $_POST['quadbankclientID']; 
$quadbanklat = $_POST['quadbanklat']; 
$quadbanklog = $_POST['quadbanklog']; 
$quadbankbilltype = $_POST['quadbankbilltype'];
$recipient_email = $_POST['$recipient_Email']; 
$quadbankRecipientID = $_POST['$recipientID']; 
$id = rand(1,99000000);
	$query = "SELECT * FROM quadpay WHERE email='$quadbankemail'OR clientID ='$quadbanktransID '";

	$result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
		    $trasactID=$row['trasactionID'];
		    $Billamount=$row['billamount'];
            $tamount_serve=$row['amount'];
		    $initialbalance=$row['newbalance'];
		     $oldbalance1=$row['oldbalance'];
        $initial_lat=$row['lat'];
		    $initial_log=$row['log'];
    }
    $querywish = "SELECT * FROM wishvile_table where `id`='$quadbankbilltype' AND `Email`='$quadbankemail'";

	$resultwiish = mysqli_query($con, $querywish);
    while ($row = mysqli_fetch_assoc($resultwiish)) {
		    $fileamount=$row['file'];
		    $remark2=$row['remark2'];
           
    }
    

if ($quadbankamount != 0 && $fileamount != 0 && $remark2 !== "remark2"){
    $status = "6";
    //$currentbalance = $oldbalance1 + $quadbankamount;
    $currentbalance = $initialbalance + $quadbankamount;
    
    
$insert = mysqli_query($con,"INSERT INTO `quadpay_translog` (`id`, `clientID`, `name`, `email`, `phone`, `recipient_email`, `recipient_ID`, `accountno`, `log`, `lat`, `trasactionID`, `amount`, `oldbalance`, `newbalance`, `bankname`, `device`, `billname`, `narration`, `billtype`, `billamount`, `preferences`, `created_at`) VALUES ('$id', NULL, NULL, '$quadbankemail', NULL, '$recipient_email', '$quadbankRecipientID', '$quadbanknumber', NULL, NULL, '$quadbanktransID', '$quadbankamount', '$oldbalance1', '$currentbalance', '$quadbankname', NULL, NULL, '$quadbanknarration', '$quadbankbilltype', '$quadbankamount', '$status', CURRENT_TIMESTAMP)");

        

		$update = "UPDATE `quadpay` SET `amount` = '$quadbankamount',`newbalance` = '$currentbalance',`oldbalance` = '$initialbalance' where `clientID`='$quadbankclientID' OR `email`='$quadbankemail'";
			mysqli_query($con, $update);


    if ($quadbankname=="wishville_Savings"){
        $update = "UPDATE `wishvile_table` SET `file` = '0',`others` = '0',`remark2`= 'dismissed' where `id`='$quadbankbilltype' AND `Email`='$quadbankemail'";
			mysqli_query($con, $update);
    }

 if($insert){
            echo "successful";
        
    }
    else {
        echo "ERROR";}} else {echo "UNEXITING W/ACCOUNT";}
  $con->close();


?>      