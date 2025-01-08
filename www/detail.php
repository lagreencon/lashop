<?php

	// Database connection 
	
	require_once('connection.php');
$myemail = $_POST['myemail']; 
$id = $_POST['id'];
    
    $q=mysqli_query($con, "SELECT * FROM table_regitration_wish WHERE nemail='$myemail'"); 
while ($row=mysqli_fetch_assoc($q)){
   $device  = $row["device"]; 
   $email  = $row["nemail"];
   $password  = $row["password"];}

	$query = "SELECT * FROM wishvile_table WHERE Email='$myemail' AND id='$id'";

	$result = mysqli_query($con, $query);
	
	$output = "";
   
	if (mysqli_num_rows($result) > 0) {
	    $output .= "<table class='table table-striped' style='background-color:#b1cbcc;width:100%;height:5%;text-align:left;overflow:auto;opacity:2;>";
		$output .= "<thead>DETAIL INFO
			        <tr>
			          <th class='tableths'></th>
			          <th class='tableths'>result</th>
			          <th class='tableths'>title</th>
			        </tr>
			      </thead>";
		while ($row = mysqli_fetch_assoc($result)) {
		    $type=$row['sub_type'];
		    $state=$row['construction'];
		    $dday=$row['dday'];
		    $duration=$row['duration'];
		 
		    $date1=date_create("$dday");
            $date2=date_create();
            $diff=date_diff($date2,$date1);
            $daysdiff =$diff->format("%r%a days");
            $monthsdiff =$diff->format("Year: %y,Month: %m, days: %r%d.");
            $daylook =$diff->format("%y, %m, %d.");
        

		    if ($state==="processed"||$state==="success" ){$state="S";$statecolor="green";}
		    else if($state==="failed" ){$state="F";$statecolor="red";}
		    else if($state==="pending" ){$state="P";$statecolor="yellow";}
		    else if($state=="" ){$state="none";$statecolor="white";}
		     if ($type==="fixedfund" ){$type="F";}else if($type==="AUTO FUND" ){$type="A";}
		     $type=$type;
		//$images = 'uploads/'. $row['images'];
		    $naira_amount = $row["file"];$dollar_amount = $row["others"];
		$output .="<tbody id='detail1'>trxn :-".$row["id"]."";
		$output .=  "<td>".$monthsdiff."
		<div id='overlay' >
  <img src='https://wish.designsandsystems.com.ng/loading.gif' id='img' >
</div> 
		<span><input type='button' class='btn-success'  name='addbutton'  id='addbutton' value='+' style='background-color:pink;color:black;opacity:2;width:10%;' onclick='autofill()' data-toggle='modal'  data-target='#fixed_add'/></span>
		<input type='hidden'   name='wishemail' id='wishemail' value='".$myemail."' />
		<input type='hidden'   name='timeduration' id='timeduration' value='".$daysdiff."' />
		<input type='hidden'   name='timtest' id='timtest' value='".$daylook."' />
		<input type='hidden'   name='tagamount' id='tagamount' value='".$row["pay_total"]."' />
		<input type='hidden'   name='fundamount' id='fundamount' value='".$naira_amount."' /></td>";
		$output .=  "<tr>
			         <td class='tableths'  id='id2'  name ='id2'>transaction id</td><td class='tableth'  id='transID'  name ='transID'>".$row["id"]."</td>
			         </tr>";
			         
		$output .=  "<tr><td class='tableths'  id='id2'  name ='id2'>status</td><td class='tableth'>".$state."</td>
			          </tr>";
		$output .=  "<tr><td class='tableths'  id='id2'  name ='id2'>wishes/intentions</td><td id='intentions' name ='intentions' class='tableth'>".$row["comment"]."</td></tr>";
		$output .=  "<tr><td class='tableths'  id='id2'  name ='id2'>uploaded amount</td>
			          <td class='tableth' id='uploadedamount' name ='uploadedamount'>".number_format($naira_amount, 0)."</td></tr>";
		$output .=  "<tr><td class='tableths'  id='id2'  name ='id2'>Target amount</td>
			          <td class='tableth' id='targetam'  name ='targetam'>".number_format($row["pay_total"], 0)."</td></tr>";
		$output .=  "<tr><td class='tableths'  id='id2'  name ='id2'>tenure</td>
			          <td id='tenure_time'  name ='tenure_time' class='tableth'>".$row["duration"]."</td></tr>";
		$output .=  "<tr><td class='tableths'  id='id2'  name ='id2'>surposed interest</td>
		<td class='tableth' id='surposed_interest'  name ='surposed_interest'>".number_format($row["area1"], 0)."</td></tr>";
		$output .=  "<tr><td class='tableths'  id='id2'  name ='id2'>dollar</td><td class='tableth' id='newdollar'  name ='newdollar' ><input type='hidden'   name='dollarcheck' id='dollarcheck' value='".$dollar_amount."' />".$dollar_amount."</td>
			          </tr>";
		$output .=  "<tr><td class='tableths'  id='id2'  name ='id2'>plan code</td><td class='tableth'>".$row["plan_code"]."</td>
			          </tr>";
		$output .=  "<tr><td class='tableths'  id='id2'  name ='id2'>funding type</td><td class='tableth'>".$row["sub_type"]."</td>
			          </tr>";
		
		$output .=  "<tr><td class='tableths'  id='id2'  name ='id2'>card bank</td><td class='tableth'>".$row["card_bank"]."</td>
			          </tr>";
		$output .=  "<tr><td class='tableths'  id='id2'  name ='id2'>time</td><td id='dealdate'  name ='dealdate' class='tableth'>".$row["time"]."</td>
			          </tr>";
		$output .=  "<tr><td class='tableths'  id='id2'  name ='id2'>maturity date</td><td class='tableth'>".$dday."-(".$monthsdiff.")</td>
			          </tr>";
		$output .=  "<tr><td class='tableths'  id='id2'  name ='id2'>assurance value</td><td class='tableth'>".$row["imagepath"]."</td>
			          </tr>";
		}
		$output .="</tbody>
    			</table>";
    	echo $output; 
    	echo "<input type='button' id='CashOut'  onclick='wishquadpayconfirm()' data-toggle='modal' style='width:30%;'  class='btn-success' value='CashOut' >" ; 
    	 echo  " <div class='modal fade' id='succdetail' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type= 'button' class='close' style='background-color:red;color:black;' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Password</h4>
        </div>
      <div id='quadpaypword'  class='modal-body'>
         <div id='quadtranfererror'> </div><div id='quadpaypass'>
         <div id='quadpaytranferinner'> </div>
			<input type='hidden'   placeholder='password' value='".$password." ' name='wishtranfercheckpassword' id='wishtranfercheckpassword' />
			<div id='wishpaytranferview'>
          <div >password</div><div id='wishpasswordbutton' >
			<input type='password' style='background-color:white;color:black;opacity:2;width:50%;'   placeholder='pls enter password' name='wishpaytranferpassword'  id='wishpaytranferpassword' />
          <a><span></span>
      <span></span>
      <span></span>
      <span></span>
	  <input type='button' onclick='wishquadpaytranfer()' data-toggle='modal'  data-target='#success' class='btn-success' value='submit' > </a></div>
	  </div></div>
	  
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div></div>";
    
    echo  " <div class='modal fade' id='successdetail' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type= 'button' class='close' style='background-color:red;color:black;' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>success details</h4>
        </div>
      <div id='wishsuccessdetail'  class='modal-body'>
         <p id='accname'></p>
         <p id='accno'></p>
	     <p id='accbank'></p>
	     <p id='acamount'></p>
         <p id='actime'></p>
	     <p id='actrno'></p>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div></div>";
	}else{
		echo "<h3 style='text-align:center'>No data</h3>";
		
	}
$con->close();
?>


<script>
var dealdate = document.getElementById("dealdate").innerHTML;
 var tenureTime = document.getElementById("timeduration").innerHTML;
 var time_duru = $("#timeduration").val(); 
 //if (time_duru >0){alert(time_duru);}else{document.getElementById('CashOut').style.display ='none';}
 
 
function tranfer(){
      
    var uploadedamount = document.getElementById("uploadedamount").innerHTML; 
     
    var Tbankname  = $("#tranferbank_name").val();
    alert(uploadedamount);
    if (confirm('your about to terminate your plan\n 1. you will be charge 5% of your uninterest sum \n 2. if is less than 2months relative interest will be forfited')== true){alert("ok");}else{$("#successquadpaytranfer").modal('hide');}}
   
   function wishquadpayconfirm(){if (confirm('NOTE:\n You are about to terminate YOUR PLAN:\n 1. You will be charge 5% of your uninterest Sum \n 2. if is less than 2months relative interest will be forfited \n 3. We convert to naira to credit ur Quadpay Wallet ')== true){
                $("#succdetail").modal('show');}else {alert("ABORTED");}}
    
    function autofill(){
        var purpos = document.getElementById("intentions").innerHTML;
        var che  = $("#comment").val(purpos);
        var targetat  = $("#tagamount").val();
        var tar = $("#fundamount").val();
        document.getElementById("comment").readOnly =true;
        var seet1 = $("#select1").val(targetat);
         let timget = $("#timtest").val();
    var timeArray = timget.split(",");
     var month_duration =timeArray[1];  
     var  timeinn=$.trim(month_duration);
     OnChange2();
     //$.trim(document.frmOne.price.value);OnChange();
     var amount_price = targetat-tar;
     var amoice = $("#price").val(amount_price);
     var dura  = $("#maturity1").val(timeinn);
     var dipp  = $("#duration1").val(timeinn);
     
     document.getElementById('maturity').style.display ='none';
     
     document.getElementById("maturity").readOnly =true;
     
    }
    
   function wishquadpaytranfer(){
    var surposed_int = $("#surposed_interest").val();  
     var time_duration = $("#timeduration").val();  
      var trans_ID = document.getElementById("transID").innerHTML; 
    //var uploadedamount = document.getElementById("fundamount").innerHTML; 
    var uploadedamount = $("#fundamount").val();
    var uploadedamount_dollar = document.getElementById("newdollar").innerHTML;
    var dollarchecked  = $("#dollarcheck").val();
    var dollar  = $("#dlar").val();
    var purposed = document.getElementById("intentions").innerHTML;
     var tenureTime = $("#timeduration").val();
    var cashouttransID = Math.floor(Math.random() * 110006000)+1;
        var cashoutemail  = $("#wishemail").val();
        var cashoutbankname = "wishville_Savings";
    var wishtranfercheckpd  = $("#wishtranfercheckpassword").val();
        var wishpaytranferpd  = $("#wishpaytranferpassword").val(); 
   var newconvert=dollarchecked*dollar;
            
                if(wishtranfercheckpd = wishpaytranferpd ){
        if ((uploadedamount=="0" && dollarchecked!=="0") && (time_duration < 0 ||time_duration !== "")){ 
            var cashoutbankamount = newconvert-(newconvert*5/100); 
            alert("new naira is: N"+cashoutbankamount);
            
        var cashoutbanknarration = "from aborted: "+purposed+", days left:"+tenureTime+", transID:"+trans_ID+", source value: $"+dollarchecked ;
    $.ajax({
      url : "https://wish.designsandsystems.com.ng/cashout.php",
      type : "POST",
      cache: false,
      data : {quadbankname:cashoutbankname, quadbankamount :cashoutbankamount, quadbanknarration :cashoutbanknarration, quadbanktransID :cashouttransID, quadbankemail :cashoutemail, quadbankbilltype:trans_ID},
      beforeSend:function() { //alert("N"+newconvert+" will be credited to Your Quadwallet");
                        document.getElementById("overlay").style.display = "block";
                        $("#").val("some moment...");
                    },
      success:function(data){alert(data); fetchData();document.getElementById("overlay").style.display = "none";
      $("#succdetail").modal('hide');}
    });}
    
    
    else if ((uploadedamount!==0 && uploadedamount!=="") && (time_duration < 0 ||time_duration !== "")) { 
    var   cashoutbankamount = uploadedamount-(uploadedamount*5/100); 
    var cashoutbanknarration = "from aborted:"+purposed+", days left"+tenureTime+", transID:"+trans_ID+", source value: N"+cashoutbankamount ;
    
    $.ajax({
      url : "https://wish.designsandsystems.com.ng/cashout.php",
      type : "POST",
      cache: false,
      data : {quadbankname:cashoutbankname, quadbankamount :cashoutbankamount, quadbanknarration :cashoutbanknarration, quadbanktransID :cashouttransID, quadbankemail :cashoutemail, quadbankbilltype:trans_ID},
      beforeSend:function() { //alert("N"+cashoutbankamount+" will be credited to Your Quadwallet");
                        document.getElementById("overlay").style.display = "block";
                        //$("#successdetail").text("some moment...");
                        //$("#successdetail").modal('show');
                    },
      success:function(data){alert(data); document.getElementById("overlay").style.display = "none";
      $("#succdetail").modal('hide');fetchData();
          
      }
    });
       
    } else if((uploadedamount!==0 && uploadedamount!=="" )|| (dollarchecked!==0 && dollarchecked!=="" )&&  (time_duration >=0 ||time_duration == "")) { 
    var   newcashoutbankamount = surposed_int; 
   
    if (dollarchecked!==0 && dollarchecked!=="" ){
        finalconvert=surposed_int*dollar;
        var cashoutbanknarration = "from completed circle: "+purposed+", days left:"+tenureTime+", transID:"+trans_ID+", due balance(raw)$:"+finalconvert ;
        
    $.ajax({
      url : "https://wish.designsandsystems.com.ng/cashout.php",
      type : "POST",
      cache: false,
      data : {quadbankname:cashoutbankname, quadbankamount :finalconvert, quadbanknarration :cashoutbanknarration, quadbanktransID :cashouttransID, quadbankemail :cashoutemail, quadbankbilltype:trans_ID},
      beforeSend:function() { //alert("N"+cashoutbankamount+" will be credited to Your Quadwallet");
                    document.getElementById("overlay").style.display = "block";    
                        //$("#successdetail").text("some moment...");
                        //$("#successdetail").modal('show');
                    },
      success:function(data){alert(data);
      document.getElementById("overlay").style.display = "none";
      $("#succdetail").modal('hide');fetchData();
          
      }
    });}else {
        var cashoutbanknarration = "from completed circle:"+purposed+", days left"+tenureTime+", transID:"+trans_ID+", due balance:"+newcashoutbankamount ;
        $.ajax({
      url : "https://wish.designsandsystems.com.ng/cashout.php",
      type : "POST",
      cache: false,
      data : {quadbankname:cashoutbankname, quadbankamount :newcashoutbankamount, quadbanknarration :cashoutbanknarration, quadbanktransID :cashouttransID, quadbankemail :cashoutemail, quadbankbilltype:trans_ID},
      beforeSend:function() { //alert("N"+cashoutbankamount+" will be credited to Your Quadwallet");
      document.getElementById("wishpasswordbutton").style.display = "none";
                        document.getElementById("overlay").style.display = "block";$("#successdetail").modal('show');
                        //$("#successdetail").text("some moment...");
                        //
                    },
      success:function(data){alert(data);document.getElementById("overlay").style.display = "none";
      $("#succdetail").modal('hide');fetchData();
      
      document.getElementById("accname").innerHTML ="name: "+cashoutbankname;
         
      }
    });}
       
    } 
    else { alert ("this account is EMPTY "); $("#succdetail").modal('hide');}
        }else{$("#succdetail").modal('hide');}  
      
    fetchData();
    
   }
  

   </script>