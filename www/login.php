<?php
require_once('connection.php');
 if(isset($_POST['login']))
{$password = $_POST['password'];
$id = rand(290,89909657);
$nemail = $_POST['nemail'];
$device1 = $_POST['device1'];
$code1 =  rand(11112290,89909657);
$code2 =  $_POST['code2'];
 $code3 =  $_POST['code3']; 
  
	//$totalnaira = $_POST['totalnaira'];
	$log = $_POST['log'];
	$lat= $_POST['lat'];
	
 $insert = mysqli_query($con,"INSERT INTO `table_regitration_wish_log` (`id`, `regno`, `images`, `Surname`, `name`, `address`, `lat`, `log`, `phone`, `nemail`, `device`, `course`, `password`, `confirm_password`, `3d`, `code`, `code1`, `code2`, `comment`, `video`) VALUES ('$id ', '', '', '', '', '', '', '', '', '$nemail', '$device1', '', '$password', '', '', '$code1', '$code2 ', '$code3', '', '')");	
	
	
$q=mysqli_query($con, "SELECT * FROM `table_regitration_wish`  WHERE nemail='$nemail'"); 
while ($row=mysqli_fetch_assoc($q)){
   $device  = $row["device"]; 
   $email  = $row["nemail"];
   $Surname  = $row["Surname"];}
    
    $update = "UPDATE `table_regitration_wish` SET `code1` = '$code1',`code2` = '$code2',`code3` = '$code3' where `nemail`='$nemail'";
			mysqli_query($con, $update);
    
    $login = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `table_regitration_wish` WHERE `nemail` ='$nemail' AND `password` ='$password'"));
    if($login != 0){
        //echo $nemail;
        if($device1==$device)
        {echo $email;echo "&code1=";echo $code1;
        }
        else {
            $subject = "device validation ";
            $message = "please call, 08074651451";
            $From  =  "lagreencon@gmail.com"; 
            
            $headers2 = "From:WISHVILLE " . $From;
            
            
            mail($email,$subject,$message, $headers2);
            echo "nonreconised device check your mail for validation";}
        
        
       // window.location.href = 'index.html?nemail='+nemail;
        //window.location.replace('index.html?$nemail');
        }
    else echo "error";
  
    
}$con->close();
?>