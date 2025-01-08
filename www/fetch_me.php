<?php

	// Database connection 
	
	require_once('connection.php');
$myemail = $_GET['myemail'];
$code = $_GET['code'];
$device = $_GET['device'];


$result =mysqli_num_rows( mysqli_query($con, "SELECT * FROM table_regitration_wish WHERE  nemail ='$myemail ' AND code='$code' AND device='$device'"));
if($result!=0){
	$query = "SELECT * FROM wishvile_table WHERE Email='$myemail'  AND (remark2 !='dismissed' OR file !='0') AND (remark3 ='success' OR remark3 ='processed')";
	
	$result = mysqli_query($con, $query);
	
	$output = "";
   
	if (mysqli_num_rows($result) > 0) {
	    $output .= "<table class='table table-striped'>";
		$output .= "<thead>
			        <tr>
			          <th class='tableths'>Ts</th>
			          <th class='tableths'>Purpose</th>
					  <th class='tableths'>Uploaded Amount</th>
			          <th class='tableths'>Target Amount</th>
			          
			          <th class='tableths'>M.D</th>
			          <th class='tableths'>Surp.I</th>
			          <th class='tableths'>USD($)</th>
			        </tr>
			      </thead>";
		while ($row = mysqli_fetch_assoc($result)) { 
		    $type=$row['sub_type'];
		    $state=$row['remark3'];
		    $valuenaira=$row['file'];
		    $valuedollar=$row['area1'];
		    
		    if ($state==="processed"||$state==="success" ){$state="S";$statecolor="green";}
		    else if($state==="failed" ){$state="F";$statecolor="red";}
		    else if($state==="pending" ){$state="P";$statecolor="yellow";}
		    else if($state=="" ){$state="?";$statecolor="white";}$state=$state;
		     if ($type==="fixedfund" ){$type="fix";}else if($type==="AUTO FUND" ){$type="at";}
		     $type=$type;
		//$images = 'uploads/'. $row['images'];
		$output .="<tbody id='newdata'>";
		$output .=  "<tr>
			         <td class='tableths'  id='id2'  name ='id2'><h3 style='background-color:".$statecolor.";opacity:2;border-radius: 50%;width:30%;max-width: 5px;border: 1px solid #555;height:100%;color:black;padding: 60% 60%;'></h3></td>
			          <td class='tableths' style='background-color:#edce5f;width:20%;height:10%;'><button type='button' style='background-color:#edce5f;text-align:left;overflow:auto;opacity:2;color:black;' data-target='#detail' id='btn' data-toggle='modal' data-id='".$row["id"]."'  >".$row["comment"]."</button><p style='color:brown;font-size:12px;'>".$type."</p></td>
			          <td class='tableths' style='background-color:#dcdff5;opacity:2;color:black;' id='uploadedamout' class='button button-block'  name ='uploadedamout'>".number_format($row["file"], 0)."</td>
			          <td class='tableths'>".number_format($row["pay_total"], 0)."</td>
			          
			          <td class='tableths'>".$row["duration"]."</td>
			          <td class='tableths'>".number_format($row["area1"], 0)."</td>
			          <td class='tableths'><span></span><span></span><input type='button' style='background-color:#54bef7 ;opacity:2;color:black;' class='btn btn-success btn-sm' id='convert_dollar' name ='convert_dollar'  data-toggle='modal' value='".$row["others"]."' data-target='#myModal' data-id='".$row["id"]."' /><span></span></td>
			          </tr>";
		}
		$output .="</tbody>
    			</table><h3 style='width:50px;height:50px;'></h3>";
    	echo $output; 
    	
    	 $update = "UPDATE `table_regitration_wish_log` SET `confirm_password` = 'succcessul' where `nemail`='$myemail' AND `code`='$code'";
			mysqli_query($con, $update);
			
	}else{
	    
	    
			
		echo "<h3 style='text-align:center'>No data</h3>";
		
	}
			mysqli_query($con, $update);}else{
	    $log="error";
	    
	    
	     
  
        
   if($code!==0 && $code!==0&& $log==="error"){   $update = "UPDATE `table_regitration_wish_log` SET `confirm_password` = 'fakeperson1' where `nemail`='$myemail' AND `code`='$code'";
			mysqli_query($con, $update);
			      
    }
	echo $log;		

	    
	    
	}
$con->close();
?>