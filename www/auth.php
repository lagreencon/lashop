<?php
require_once('connection.php');
if(isset($_POST['register']))
{   $phone = $_POST['phone'];
$name = $_POST['name'];
$Surname = $_POST['Surname'];
$newname = "$Surname $name";
$address = $_POST['address'];
$password = $_POST['password'];
 $confirm_password = $_POST['confirm_password'];
$id = rand(29044444,89909657);
$nemail = $_POST['nemail'];
$device = $_POST['device'];
$code =  rand(1111229000,8990965799);
$code1 =  $_POST['code1'];
 $code2 =  $_POST['code2']; 
 $comment = date("l jS \of F Y h:i:s A"); 
	//$totalnaira = $_POST['totalnaira'];
	$log = $_POST['log'];
	$lat= $_POST['lat'];
	  
	  
//	mail('lagreencon@gmmail.com', 'the subject', 'the message', null,'-fwebmaster@example.com'); 
    
	  
	  
	 $insertlog = mysqli_query($con,"INSERT INTO `table_regitration_wish_log` (`id`, `regno`, `images`, `Surname`, `name`, `address`, `lat`, `log`, `phone`, `nemail`, `device`, `course`, `password`, `confirm_password`, `3d`, `code`, `code1`, `code2`, `comment`, `video`) VALUES ('$id ', '', '', '', '', '', '$lat', '$log ', '', '$nemail', '$device1', '', '$password', 'REGISTRATION', '', '$code', '$code1 ', '$code2', 'REG_:$comment', '')");	
	 
    $register = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `table_regitration_wish` WHERE `nemail` ='$nemail'"));
    if($register == 0)
    {
        $insert3 = mysqli_query($con,"INSERT INTO `quadpay` (`id`, `clientID`, `name`, `email`, `phone`, `recipient_email`, `recipient_ID`, `accountno`, `log`, `lat`, `trasactionID`, `amount`, `oldbalance`, `newbalance`, `bankname`, `device`, `billname`, `narration`, `billtype`, `billamount`, `preferences`, `created_at`) VALUES (NULL, '$id', '$newname', '$nemail', '$phone', '$nemail', '', NULL, '$log', '$lat', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, CURRENT_TIMESTAMP)");
        
        
        
        $insert = mysqli_query($con,"INSERT INTO `table_regitration_wish` (`id`, `regno`, `images`, `Surname`, `name`, `address`, `lat`, `log`, `phone`, `nemail`, `device`, `course`, `password`, `confirm_password`, `3d`, `code`, `code1`, `code2`, `comment`, `video`) VALUES ('$id ', '$id', '', '$Surname', '$name', '$address', '$lat', '$log', '$phone', '$nemail', '$device', '', '$password', '$confirm_password ', ' ', '$code', '$code1 ', '$code2', '$comment', '')");
        
       
        
        
        
        if($insert && $insertlog && $insert3){
            echo "success";
            $subject = "welcome  $newname";
            $message = "welcome  $newname. a place for Heros FOR more info please call, 08074651451";
            $From  =  "lagreencon@gmail.com"; 
            
            $headers2 = "From:WISHVILLE  . $From";
            
            
            mail($nemail,$subject,$message, $headers2);
    
            
        }
        else{
            echo "error";}
            
    }
    else if($register != 0)
        echo "exist";
        $con->close();
}

?>
