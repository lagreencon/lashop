<?php
require_once('connection.php');
  if(isset($_POST['login']))
{$date = date("l jS \of F Y h:i:s A");
$enter = "log in on" ;
$comment = $date ;
$password = $_POST['password'];
$id = rand(290,89909657);
$nemail = $_POST['nemail'];
$device1 = $_POST['device1'];
$code =  rand(1111229033333,89909657333333);
$code1 =  $_POST['code1'];
 $code2 =  $_POST['code2']; 
  
	//$totalnaira = $_POST['totalnaira'];
	$log = $_POST['log'];
	$lat= $_POST['lat'];
	
 $insert = mysqli_query($con,"INSERT INTO `table_regitration_wish_log` (`id`, `regno`, `images`, `Surname`, `name`, `address`, `lat`, `log`, `phone`, `nemail`, `device`, `course`, `password`, `confirm_password`, `3d`, `code`, `code1`, `code2`, `comment`, `video`) VALUES ('$id ', '', '', '', '', '', '$lat', '$log ', '', '$nemail', '$device1', '', '$password', '', '', '$code', '$code1 ', '$code2', 'login_:$comment', '')");	
 
 	
$q=mysqli_query($con, "SELECT * FROM `table_regitration_wish`  WHERE nemail='$nemail'"); 
while ($row=mysqli_fetch_assoc($q)){
   $device  = $row["device"]; 
   $email  = $row["nemail"]; }
    
    $update = "UPDATE `table_regitration_wish` SET `code` = '$code',`code1` = '$code1',`code2` = '$code2' where `nemail`='$nemail'";
			mysqli_query($con, $update);
    
    $login = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `table_regitration_wish` WHERE `nemail` ='$nemail' AND `password` ='$password'"));
    if($login != 0){
        //echo $nemail;
        if($device1==$device)
        {echo $email;echo "&code=";echo $code;
        }
        else  {
            $subject = "device validation ";
            $updatecode =  rand(11115,89909);
            $From  =  "lagreencon@gmail.com"; 
            $message = "your code is:$updatecode.    pleasecall, 08074651451 ";
            $headers2 = "From:WISHVILLE " . $From;
            $updatedevi = "UPDATE `table_regitration_wish` SET `3d` = '$updatecode' where `nemail`='$nemail'";
			mysqli_query($con, $updatedevi);
            
            mail($email,$subject,$message, $headers2);
            echo $email;echo "&code=";echo "nonreconised device PLEASE check your mail for validation";}
       // window.location.href = 'index.html?nemail='+nemail;
        //window.location.replace('index.html?$nemail');
        }
    else echo "error";
  
    
}$con->close();
 
 ?>