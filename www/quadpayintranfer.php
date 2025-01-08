<?php

	// Database connection 
	
	require_once('connection.php');



$device2 = $_POST['device1'];    	 
$mail = $_POST['mmail'];
$billtype  = $_POST['billtype'];


$query = "SELECT * FROM quadpay WHERE email='$mail'OR clientID ='$quadbanktransID '";

	$result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
		    $trasactID=$row['trasactionID'];
		    $Billamount=$row['billamount'];
            $tamount_serve=$row['amount'];
		    $newbalance=$row['newbalance'];
		     $oldbalance1=$row['oldbalance'];
        $initial_lat=$row['lat'];
		    $initial_log=$row['log'];
    }



$result =mysqli_num_rows( mysqli_query($con, "SELECT * FROM table_regitration_wish WHERE  nemail ='$mail' AND device='$device2' "));
if($result!=0){
        //echo "success";
       
       $q=mysqli_query($con, "SELECT * FROM table_regitration_wish WHERE nemail='$mail'"); 
while ($row=mysqli_fetch_assoc($q)){
   $device  = $row["device"]; 
   $email  = $row["nemail"];
   $password  = $row["password"];

 $name  = $row["Surname"];
    $phone  = $row["phone"]; 
   
   $confirm_password  = $row["confirm_password"];
   $customerid  = $row["regno"];
    $address  = $row["address"]; 
}
 



echo "<div>";
echo"
        <h  style=
  'position: relative;
  background: purple; /* Black see-through */
  color: #white;'>acc.balance:  ".$newbalance."</h><br><br>
            
            <div class='item-input-wrap'>
              <input type='hidden' placeholder='Your@email.com' style='background-color:white;color:black;opacity:2;width:90%;'   id='quadpayINtranferemail' name = 'quadpayINtranferemail' required=''  value='".$email."' ></div>
			<input type='hidden' placeholder='Your@email.com' style='background-color:white;color:black;opacity:2;width:90%;'   id='quadbankclient_ID' name = 'quadbankclient_ID' required=''  value='".$customerid ."' >
           <div class='item-input-wrap'>
			<input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;'   placeholder='Password' name='quadpayINtranferpassword' id='quadpayINtranferpassword' value='".$password."' required=''/></div>
			<div class='item-input-wrap'>
			<input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;'   name='quadpayINtranfervalue' id='quadpayINtranfervalue' value='".$newbalance."' /></div>
			<div class='item-input-wrap'>
			<input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;'    name='quadpayINtranferdevice' id='quadpayINtranferdevice' value='".$device2."' required=''/></div>
		
              
		 <div>Quad Account Number</div>
      <div class='item-input-wrap'>
              <input type='number'  style='background-color:white;color:black;opacity:2;width:90%;' id='tranferIN_number' name = 'tranferIN_number' value=''  /></div> 
              
              
              <div>Wallet</div>
              <select  style='foreground-color:#428F6A;color:black;opacity:2;width:60%;' name='quadpaytranferIN' id='quadpaytranferIN' onchange='quadpayIN_tranfer()'>
	               <option value='0'>Choose Wallet</option>
				  ";
       
    echo" 
      <option value='Quad_Pay'>Quad Pay </option>
      <option value='WishVille'>WishVille </option></select>
      ";
        
   		
      
  echo " 
         <br>        
    <div>Account Name</div>
      <div class='item-input-wrap'>
              <input type=''  style='background-color:white;color:black;opacity:2;width:90%;' id='tranferIN_account' name = 'tranferIN_account' onclick='quadpayIN_enter()' value=''  readonly/></div>
<div class='item-input-wrap'>
              <input type='hidden'  style='background-color:white;color:black;opacity:2;width:90%;' id='tranferIN_accountemail' name = 'tranferIN_accountemail' value=''  readonly/></div>
              
                        <div>Amount</div>
<div class='item-input-wrap'>
              <input type='number' style='background-color:white;color:black;opacity:2;width:90%;' id='tranferIN_amount' onclick='quadpayIN_enter()' name = 'tranferIN_amount' value=''  /></div><br>
              
<div class='item-input-wrap'>
	 <select style='foreground-color:#428F6A;color:black;opacity:2;width:60%;' name='wishmaturity'  id='wishmaturity'  >
	               <option value='0'>Choose TENURE</option>
				  <option value='1'>1 month(5%)P.A</option>
    				<option value='2'>2 months(10%)P.A</option>
    				<option  value='3'>3 months(10%)P.A</option>
				  <option  value='4'>4 months(10%)P.A</option>
				  <option value='5'>5 months(15%)P.A</option>
				  <option value='6'>6 months(15%)P.A</option>
				  <option  value='7'>7 months(20%)P.A</option>
				  <option value='8'>8 months(20%)P.A</option>
				  <option value='9'>9 months(20%)P.A</option>
				  <option  value='10'>10 months(25%)P.A</option>
				  <option value='11'>11 months(25%)P.A</option>
				  <option value='12'>12 months(25%)P.A</option>
				  <option value='24'>2 years(35%)P.A</option>
				  <option  value='36'>3 years(45%)P.A</option>
				  <option value='48'>4 years(50%)P.A</option>
				  <option value='60'>5 years(70%)P.A</option>
				  </select></div><br>
        <label>Please enter your, Comment</label>
    <div class='item-input-wrap'>
              <input type=''  number' style='background-color:white;color:black;opacity:2;width:90%;' id='tranferIN_comment' name = 'tranferIN_comment' onclick='quadpayIN_enter()'  value='' minlength='20' size=13 /></div>

</div>
            <br><div class='item-input-wrap'>
              <input type='button'  style='background-color:grey;color:black;opacity:2;' data-toggle='modal'  data-target='#quadINtransferpass' class='btn-success' onclick='quadpayIN_submit()' id = 'INtranfersumbit' value='submit' /></div>";
	    echo  "</div>";
	    
   echo  " <div class='modal fade' id='quadINtransferpass' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type= 'button' class='close' style='background-color:red;color:black;' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Password</h4>
        </div>
      <div id='quadpayINpword'  class='modal-body'>
         <div id='quadINtranfererror'> </div><div id='quadINpaypass'>
         <div id='quadpayINtranferinner'> </div>
			<input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;'   placeholder='password' value='".$password." ' name='INtranfercheckpassword' id='INtranfercheckpassword' />
			<div id='payINtranferpassword1'>
          <div >password</div>
			<input type='password' style='background-color:white;color:black;opacity:2;width:90%;'   placeholder='pls enter password' name='payINtranferpassword' onclick='quadpayIN_enter()' id='payINtranferpassword' />
          <a><span></span>
      <span></span>
      <span></span>
      <span></span>
	  <input type='button' id='checksubmit'  onclick='quadpayINtranfer()' data-toggle='modal'  data-target='#INsuccess' class='btn-success' value='submit' > </a></div>
	  </div>
	  
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div></div>";

   }    
   
    else 
			   echo "error"; 
			
     
        $con->close();
?>
<script>
document.getElementById('wishmaturity').style.display ='none';
function quadpayIN_enter(){var INname = $("#tranferIN_name").val(); 
    var INtranfer_acc = $("#tranferIN_account").val(); 
    if (INname  == "0"||INname == ""){
        alert("choose  bank");
          document.getElementById("tranferIN_amount").readOnly =true;
          document.getElementById("tranferIN_name").readOnly =true;
         
      }else if(INtranfer_acc  == "0"||INtranfer_acc == "") {
          alert("please! choose correct");
          document.getElementById("tranferIN_amount").readOnly = true ;
         
          document.getElementById("INtranfer_comment").readOnly = true ;
          document.getElementById("INtranfersumbit").readOnly = true ;
      }else {
          document.getElementById("tranferIN_amount").readOnly = false ;
          document.getElementById("tranferIN_comment").readOnly = false ;
          document.getElementById("INtranfersumbit").readOnly = false ;
      } }
 function quadpayIN_tranfer(){
     var tranferIN_num = $("#tranferIN_number").val(); 
 if (tranferIN_num =="0"||tranferIN_num == "") 
 {alert( "enter account number first"); 
 //document.getElementById("quadpaytranferbank").innerHTML ="0";
 $("#quadpaytranferIN").val(0 );}
 else if (tranferIN_num !=="0"||tranferIN_num !== "")  {
     var txt1 = $("#quadpaytranferIN").val();
    confirmquadpayINtranfer(); }
      
     document.getElementById("tranferIN_name").readOnly =true;
   }
   
  function quadpayIN_submit(){
      var error = document.getElementById("quadINtranfererror");
      var modal = document.getElementById("quadpayINpass");
     var tranferIN_num = $("#tranferIN_number").val(); 
     var tranferIN_name = $("#quadpaytranferIN").val( );
     var tranferIN_custname = $("#tranferIN_account").val( );
      var tranferIN_amount = $("#tranferIN_amount").val( );
 if (tranferIN_num =="0"||tranferIN_num == "") 
 {//$("#tranferpass").modal('hide'); 
 modal.style.border = "2.5px solid red";
 modal.style.display = "none";
 alert( "account number EMPTY");
 error.innerHTML  = "error: Account number EMPTY";
 document.getElementById("tranferpass").style.text.Color = "red"; 
     //document.getElementById("tranferpass").innerHTML  = "choose BANK"; 
     document.getElementById("quadpayINtranferbank").style.border = "0.5px solid black";
 } 
   
   if (tranferIN_name =="0"||tranferIN_name == "")
 {modal.style.border = "2.5px solid red";
 modal.style.display = "none";
 alert( "choose correct BANK"); 
 error.innerHTML  = "error: BANK name EMPTY"; 
 $("#paytranferpassword").val("");
 document.getElementById("payINtranferpassword").readOnly = true ;
 document.getElementById('payINtranferpassword1').style.display ='none';}
      
 
 else if (tranferIN_custname =="0"||tranferIN_custname == "")
 {alert( "empty Customer Name"); 
 $("#payINtranferpassword").val("");
 document.getElementById("payINtranferpassword").readOnly = true ;
 error.innerHTML  = "error: Empty Customer Name";
 modal.style.border = "2.5px solid red";
 modal.style.display = "none";
  document.getElementById('payINtranferpassword1').style.display ='none'   
 }
 else if (tranferIN_amount <5||tranferIN_amount == "")
 {alert( "please Enter valid Amount");
 //error.innerHTML  = "error: Invalid Amount";
 modal.style.display = "none"; 
 $("#payINtranferpassword").val("");
 document.getElementById("payINtranferpassword").readOnly = true ;
 document.getElementById('payINtranferpassword1').style.display ='none';
 modal.style.border = "2.5px solid red";
 document.getElementById("tranferIN_amount").style.border = "1.5px solid red";} 
   
   
   
 else if (tranferIN_num !=="0"||tranferIN_num !== "" && tranferIN_name!=="0"||tranferIN_name !== "" && tranferIN_custname !=="0"||tranferIN_custname !== "" && tranferIN_amount !=="0"||tranferIN_amount !== "")  {
     document.getElementById("tranferIN_amount").style.border = "0.5px solid black";
     let text1 = $("#quadpaytranferIN").val();
    const myArray = text1.split(",");
     var IN_name =myArray[1];
      
       var IN_code =myArray[2];
       
       var IN_id =myArray[0];
      //
       document.getElementById("payINtranferpassword").readOnly = false ;
       $("#tranferIN_name").val(IN_name );
      $("#tranferINcode").val(IN_code ); 
      $("#tranferIN_id").val(IN_id); 
      document.getElementById("tranferIN_amount").style.border = "0.5px solid black";
      modal.style.border = "1.5px solid green";
      document.getElementById('payINtranferpassword1').style.display ='block';
      alert("You are transfering: "+tranferIN_amount+" to "+tranferIN_custname+ "of "+tranferIN_name);}
      modal.style.display = "block";
      error.innerHTML  = "You are transfering: "+tranferIN_amount+" to "+tranferIN_custname+ " of "+tranferIN_name;
     document.getElementById("tranferbank_name").readOnly =true;
   } 
   
   
    
   function confirmquadpayINtranfer(){ 
       var paytranIN = $("#quadpaytranferIN").val(); 
       if (paytranIN =="Quad_Pay"){
    document.getElementById('wishmaturity').style.display ='none';  
    var TINnumber=$("#tranferIN_number").val(); 
    $.ajax({
      url : "https://wish.designsandsystems.com.ng/quadpayINverify.php",
      type : "POST",
      cache: false,
      data : {Tbanknumber:TINnumber },
      beforeSend:function() {
                        document.getElementById("overlay").style.display = "block";
                        
                    },
      success:function(data){var usedata = data;document.getElementById("overlay").style.display = "none";
      const useArray = usedata.split(",");
     var use_namer =useArray[0];var use_emailer =useArray[1];
            //alert(data);
          if (data==""){alert( "failed name inqury");
          document.getElementById("tranferIN_amount").readOnly = true ;
          document.getElementById("tranferIN_comment").readOnly = true ;
          document.getElementById("INtranfersumbit").readOnly = true ;
          $("#tranferIN_name").val("0");
          $("#tranferIN_amount").val("0");
          $("#tranferIN_comment").val(0);
          $("#quadpaytranferIN").val(0);
      }else
          {   $("#tranferIN_account").val(use_namer);
              $("#tranferIN_accountemail").val(use_emailer);  
              
              document.getElementById("tranferIN_name").readOnly =true;
          }
      }
    });
   }else if(paytranIN=="WishVille"){var TINnumber=$("#tranferIN_number").val(); 
    document.getElementById('wishmaturity').style.display ='block';
    //alert( "YYY");
    $.ajax({
      url : "https://wish.designsandsystems.com.ng/quadpayINverifyWISH.php",
      type : "POST",
      cache: false,
      data : {Tbanknumber:TINnumber },
      beforeSend:function() {
                        document.getElementById("overlay").style.display = "block";
                        $("#").val("some moment...");
                    },
      success:function(data){document.getElementById("overlay").style.display = "none";//
      var usedata = data;
      const useArray = usedata.split(",");
     var use_name =useArray[0];var use_email =useArray[1];
          if (data==""){alert( "failed name inqury");
          document.getElementById("tranferIN_amount").readOnly = true ;
          document.getElementById("tranferIN_comment").readOnly = true ;
          document.getElementById("INtranfersumbit").readOnly = true ;
          $("#tranferIN_name").val("0");
          $("#tranferIN_amount").val("0");
          $("#tranferIN_comment").val(0);
      }else
          {$("#tranferIN_account").val(use_name);
          $("#tranferIN_accountemail").val(use_email);
              document.getElementById("tranferIN_name").readOnly =true;
          }
      }
    });
   }else{alert( "CHOOSE WALLET TYPE");}}
  
     function quadpayINtranfer(){
    var customer_account_name = $.trim($("#tranferIN_account").val());
    var IN_name= $.trim($("#quadpaytranferIN").val());
    //alert("P");
    var quademail  = $.trim($("#quadpayINtranferemail").val());
    var IN_accountnumber  = $.trim($("#tranferIN_number").val()); 
    var INtranfercheckpass  = $.trim($("#quadpayINtranferpassword").val());
    var payINtranferpass  = $.trim($("#payINtranferpassword").val());
    var IN_narration  = $.trim($("#tranferIN_comment").val());
    var transIN_amount  = $.trim($("#tranferIN_amount").val());
    var transIN_value  = $.trim($("#quadpayINtranfervalue").val());
    var transIN_ref  = Math.floor(Math.random() * 19000000000)+1;
    var INtransequate =transIN_value - transIN_amount;
    var paytranIN = $.trim($("#quadpaytranferIN").val()); 
    var wishvillematurity = $.trim($("#wishmaturity").val());   
    var recieveremail = $.trim($("#tranferIN_accountemail").val()); 
    var timeofTRXN = new Date(); 
    var quadbankclientID= $.trim($("#quadbankclient_ID").val()); 
    if (payINtranferpass =="0"||payINtranferpass ==""){ alert("Please enter Password");
        
       
    }else if(payINtranferpass!==INtranfercheckpass){alert("Please enter correct Password" ); 
      } else {
  
    if (INtransequate>0){
        var quadpayINtransferbalance= transIN_value - transIN_amount;
           $.ajax({
      url : "https://wish.designsandsystems.com.ng/quadpaybillsupdate.php",
      type : "POST",
      cache: false,
      data : {quadbankclientID:quadbankclientID,quadnewemail :quademail,billcode:IN_accountnumber,customer:customer_account_name,quadpaybillcostbalance:quadpayINtransferbalance,billername:IN_name,quadbanknarration:IN_narration,quadpaybillcost:transIN_amount,quadpayoldValue:transIN_value,quadbanktransID:transIN_ref,recieveremail:recieveremail},
      beforeSend:function() {
                        
                        document.getElementById("checksubmit").style.display = "none";$("checksubmit").val("some moment...");
                        //$("#pass").val("some moment...");document.getElementById("overlay").style.display = "block";
                    },
     success:function(data){fetchData();
     //document.getElementById("overlay").style.display = "none";
     document.getElementById("quadpaydata").style.display = "none";
                if (data=="successful"){alert(" transaction");}
                else{$.ajax({
      url : "https://wish.designsandsystems.com.ng/quadpayInterAppTranfer.php",
      type : "POST",
      cache: false,
      data : {quadbankclientID:quadbankclientID, quadnewemail :quademail,billcode:IN_accountnumber,recipientID:IN_accountnumber,customer:customer_account_name, quadpaybillcostbalance:quadpayINtransferbalance,  billername:IN_name, quadbanknarration:IN_narration,quadpaybillcost:transIN_amount,quadpayWallettype:paytranIN,wishvillematurity:wishvillematurity,quadpayoldValue:transIN_value,quadbanktransID:transIN_ref,recieveremail:recieveremail,TRXNtime:timeofTRXN},
      beforeSend:function() {
                        //document.getElementById("overlay").style.display = "block";
                        //$("#pass").val("some moment...");
                    },
     success:function(data){fetchData();
     //document.getElementById("overlay").style.display = "none";
     document.getElementById("quadpaydata").style.display = "none";alert( data);
     $("#quadINtransferpass").modal('hide');
          document.getElementById("tranferIN_name").readOnly =true;
          
          }});}
          document.getElementById("tranferIN_name").readOnly =true;
          
          $("#quadINtransferpass").modal('hide');}}); }else {alert ("low balance"); $("#quadINtransferpass").modal('hide');}
  }}
   </script>