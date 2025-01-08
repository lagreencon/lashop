 <?php
require_once('connection.php');
 
$quadbankname = $_POST['billername'];
$quadbanknumber = $_POST['billcode'];
$quadbankcode = $_POST['billcode']; 
$quadpayOLDValue = $_POST['quadpayoldValue'];
$quadbankcost = $_POST['quadpaybillcost'];
$quadbankbalance = $_POST['quadpaybillcostbalance'];
$quadbankamount = $_POST['quadpaybillcost'];
$quadbanknarrationfirst = $_POST['quadbanknarration'];

$quadbanktransID = $_POST['quadbanktransID']; 
$quadbankdevice = $_POST['quadbankdevice']; 
$quadbankemail = $_POST['quadnewemail'];
$recipient_email = $_POST['recieveremail']; 
$quadbankRecipientID = $_POST['billcode']; 
$quadbankclientID = $_POST['quadbankclientID']; 
$quadbanklat = $_POST['quadbanklat']; 
$quadbanklog = $_POST['quadbanklog']; 
$quadbankbilltype = $_POST['customer'];
$id = rand(1,99999999);
$quadpayWallet = $_POST['quadpayWallettype'];
$duration = $_POST['wishvillematurity'];
$ttime = $_POST['TRXNtime'];
$date=date_create();	
$dat="+$duration months";
date_modify($date,$dat);
$dday = date_format($date, 'Y-m-d');
$sub_type="fixedfund";
$states="success";
$quadbanknarration = "trnfr frm:$quadbankbilltype (id: $quadbankclientID) nartxn: $quadbanknarrationfirst";
if ($quadbankamount > 5 &&$quadpayWallet =="Quad_Pay"){

$query = "SELECT * FROM quadpay WHERE clientID ='$quadbankRecipientID' OR `accountno` = '$quadbankRecipientID'";
	$result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
		    $trasactID=$row['trasactionID'];
		    
		    $newbalance22=$row['newbalance'];
		    $OLDbalance=$row['newbalance'];
		    
        $initial_lat=$row['lat'];
		    $initial_log=$row['log'];}


        $NEWbalance=$OLDbalance+$quadbankamount;

		$update = "UPDATE `quadpay` SET `amount` = '$quadbankamount',`newbalance` = '$NEWbalance',`oldbalance` = '$quadpayOLDValue' where  `clientID`='$quadbankRecipientID ' OR `accountno` = '$quadbankRecipientID' OR `recipient_email` = '$recipient_email'";
			mysqli_query($con, $update);
            if ($recipient_email ===$quadbankemail){$status = "6";}else{$status = "7";}
        
$insert = mysqli_query($con,"INSERT INTO `quadpay_translog` (`id`, `clientID`, `name`, `email`, `phone`, `recipient_email`, `recipient_ID`, `accountno`, `log`, `lat`, `trasactionID`, `amount`, `oldbalance`, `newbalance`, `bankname`, `device`, `billname`, `narration`, `billtype`, `billamount`, `preferences`, `created_at`) VALUES ('$id', NULL, NULL, '$quadbankemail', NULL, '$recipient_email', '$quadbankRecipientID', '$quadbanknumber', NULL, NULL, '$quadbanktransID', '$quadbankamount', '$OLDbalance', '$NEWbalance', '$quadbankname', NULL, '$quadbankbilltype', '$quadbanknarration', '$quadbankbilltype', '$quadbankcost', '$status', CURRENT_TIMESTAMP)");


 if($update){ echo "success";
            //echo $quadpayWallet;
        
    }
    else {
        echo "ERROR";}} else if ($quadbankamount > 5 && $quadpayWallet =="WishVille"){
            $update2 = "INSERT INTO `wishvile_table` (`id`, `PersonID`, `imagepath`, `Email`, `phone`, `imageid`, `file_name`, `area1`, `material`, `thickness`, `dday`, `comment`, `file`, `newprice`, `LOG`, `LAT`, `pay_total`, `nim`, `bvn`, `KinName`, `KinNumber`, `sub_type`, `time`, `kin_relation`, `Address`, `others`, `plan_code`, `duration`, `remark`, `remark2`, `remark3`) VALUES ('$id', NULL, NULL, '$recipient_email', NULL, NULL, NULL, NULL, NULL, NULL, '$dday', '$quadbanknarrationfirst', '$quadbankamount', '0', '$myLng', '$myLat', '0', '$nim', '$bvn', '$KinName', '$KinNumber', '$sub_type', '$ttime', '$kinrelation', '$Address', '$others', '$plan_code','$duration', NULL, NULL, '$states')";
			
			
			
			 
			mysqli_query($con, $update2);
			
			 if($update2){
    echo "success";}
        } else{echo "CONTACT ADMIN";}
  $con->close();


?>      