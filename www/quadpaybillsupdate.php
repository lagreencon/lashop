 <?php
require_once('connection.php');
 
$quadbankname = $_POST['billername'];
$quadbanknumber = $_POST['billcode'];
$quadbankcode = $_POST['billcode']; 
$quadpayOLDValue = $_POST['quadpayoldValue'];
$quadbankcost = $_POST['quadpaybillcost'];
$quadbankbalance = $_POST['quadpaybillcostbalance'];
$quadbankamount = $_POST['quadpaybillcost'];
$quadbanknarrationOKAY = $_POST['quadbanknarration'];
$quadbanktransID = $_POST['quadbanktransID']; 
$quadbankdevice = $_POST['quadbankdevice']; 
$quadbankemail = $_POST['quadnewemail']; 
$quadbankclientID = $_POST['quadbankclientID']; 
$quadbankclientEMAIL = $_POST['recieveremail']; 
$quadbanklat = $_POST['quadbanklat']; 
$quadbanklog = $_POST['quadbanklog']; 
$quadbankbilltype = $_POST['customer'];
$id = rand(1,99999999);
$quadbanknarration = "trnfr :$quadbankname (id: $quadbankclientID) nartxn: $quadbanknarrationOKAY";

	$query = "SELECT * FROM quadpay WHERE email='$quadbankemail'";

	$result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
		    $trasactID=$row['trasactionID'];
		    
		    $newbalance22=$row['newbalance'];
		    $OLDbalance=$row['newbalance'];
		    $NEWbalance=$OLDbalance-$quadbankamount;
        $initial_lat=$row['lat'];
		    $initial_log=$row['log'];}
if ($quadbankclientEMAIL ===$quadbankemail){$status = "6";}else{$status = "7";}
if ($quadbankamount < 5||$quadbankamount <$newbalance22){
    
$insert = mysqli_query($con,"INSERT INTO `quadpay_translog` (`id`, `clientID`, `name`, `email`, `phone`, `recipient_email`, `recipient_ID`, `accountno`, `log`, `lat`, `trasactionID`, `amount`, `oldbalance`, `newbalance`, `bankname`, `device`, `billname`, `narration`, `billtype`, `billamount`, `preferences`, `created_at`) VALUES ('$id', NULL, NULL, '$quadbankemail', NULL, '$quadbankclientEMAIL', '$quadbankclientID','$quadbanknumber' , NULL, NULL, '$quadbanktransID', '$quadbankamount', '$OLDbalance', '$NEWbalance', '$quadbankname', NULL, '$quadbankbilltype', '$quadbanknarration', '$quadbankbilltype', '$quadbankcost', '$status', CURRENT_TIMESTAMP)");

        

		$update = "UPDATE `quadpay` SET `amount` = '$quadbankamount',`newbalance` = '$NEWbalance',`oldbalance` = '$quadpayOLDValue' where `email`='$quadbankemail' OR `clientID`='$quadbankclientID'";
			mysqli_query($con, $update);



 if($update){
            echo "successful";
        
    }
    else {
        echo "ERROR";}} else {echo "INSULFICIENT BALANCE";}
  $con->close();


?>      