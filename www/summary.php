<?php

	// Database connection 
	
	require_once('connection.php');
$logEmail = $_POST['SUMmail']; 
$id = $_POST['SUMid'];
 $SUMmdevice = $_POST['SUMdevice'];   
   

	$q=mysqli_query($con, "SELECT * FROM quadpay_translog WHERE (email='$logEmail' OR recipient_email='$logEmail') AND (preferences >= 6)  ORDER BY `created_at`  DESC LIMIT 16"); 

//$q=mysqli_query($con, "SELECT * FROM quadpay_translog WHERE (email='$logEmail' OR recipient_email='$logEmail') AND (preferences IS NULL OR preferences = '4') ORDER BY `created_at`  DESC LIMIT 16"); 	
	
   if ($logEmail > 0) {}
	if (mysqli_num_rows($q) > 0) {
	    
    		echo "<div> 
			        
			      </div>";
		while ($row=mysqli_fetch_assoc($q)) {
		    $benificiary_email=$row['recipient_email'];
		    $benificiary_accountno=$row['accountno'];
		    $benificiary_amount=$row['amount'];
		    $benificiary_trasactionID=$row['trasactionID'];
		    $benificiary_narration=$row['narration'];
		    $benificiary_created_at=$row['created_at'];
		    $benificiary_bankname=$row['bankname'];
		    if ($logEmail == $benificiary_email) { echo "<div>-------</div><li> 
        <div style='color: green;''>recipient ac_no:  " .$benificiary_accountno. "</div>
        <div style='color: green;''>bnk:  ".$benificiary_bankname."</div>
        <div style='color: Black;''>amt:  ".$benificiary_amount."</div>  
        <div style='color: Black;''>desc:  ".$benificiary_narration."</div>
        <div style='color: Black;''>txn id:  ".$benificiary_trasactionID."</div>
        <div style='color: Black;''>dat:  ".$benificiary_created_at."</div>
          
        </li><button onclick='window.print()'></button ></div>  ";}else{ echo "<div>-------</div><li> 
        <div style='color: red;''>recipient ac_no:  " .$benificiary_accountno. "</div>
        <div style='color: red;''>bnk:  ".$benificiary_bankname."</div>
        <div style='color: red;''>amt:  ".$benificiary_amount."</div>  
        <div style='color: red;''>desc:  ".$benificiary_narration."</div>
        <div style='color: red;''>txn id:  ".$benificiary_trasactionID."</div>
        <div style='color: red;''>dat:  ".$benificiary_created_at."</div>
          
        </li><button onclick='window.print()'></button ></div>  ";}
		   
        
       }
	}else{
		echo "<h3 style='text-align:center'>No data</h3>";
		
	}
$con->close();
?>


<script>

 

   </script>