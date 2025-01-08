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
		    $trasactNAME=$row['name'];
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
   $customerid  = $row["customerid"];
    $address  = $row["address"]; 
}
 
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.flutterwave.com/v3/banks/NG",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer FLWSECK-4924367c4945d8a25e1bbe069a03834f-18ab06b2694vt-X"
  ),
));

$response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
     $response;
    $data=array();$biller=array();
  $data=json_decode($response);
    $biller=$data->data[10]->code;}


echo "<div>";
echo"<p id='loading'></p>
        <h  style=
  'position: relative;
  background: purple; /* Black see-through */
  color: #white;'>acc.balance:  ".$newbalance."</h><br><br>
          
            <div class='item-input-wrap'>
              <input type='hidden' placeholder='Your@email.com' style='background-color:white;color:black;opacity:2;width:90%;'   id='quadpaytranferemail' name = 'quadpaytranferemail' required=''  value='".$email."' ></div>
			<div class='item-input-wrap'>
              <input type='hidden' placeholder='Your@email.com' style='background-color:white;color:black;opacity:2;width:90%;'   id='quadpaytranferNAME' name = 'quadpaytranferNAME' required=''  value='".$name."' ></div>
           <div class='item-input-wrap'>
			<input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;'   placeholder='Password' name='quadpaytranferpassword' id='quadpaytranferpassword' value='".$password."' required=''/></div>
			<div class='item-input-wrap'>
			<input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;'   name='quadpaytranfervalue' id='quadpaytranfervalue' value='".$newbalance."' /></div>
			<div class='item-input-wrap'>
			<input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;'    name='quadpaytranferdevice' id='quadpaytranferdevice' value='".$device2."' required=''/></div>
		
              
		 <div>Account Number</div>
      <div class='item-input-wrap'>
              <input type='number'  style='background-color:white;color:black;opacity:2;width:90%;' id='tranferbank_number' name = 'tranferbank_number' value=''  /></div> 
              
              
              <div class='item-title item-label'>Bank Name</div><div>";
               
      echo" <input type='text' style='background-color:white;color:black;opacity:2;width:90%;' list='browsers' placeholder='Search..' id='quadpaytranferbank' onchange='quadpay_tranfer()'>";	
      $x=300;
for ($x = 0; $x <= 300; $x++) {echo" <datalist id='browsers'> ";
$code=$data->data[$x]->code;$name=$data->data[$x]->name;$id=$data->data[$x]->id;
      for ($x = 0; $x <= 300; $x++) {echo" <datalist id='browsers'> ";
$code=$data->data[$x]->code;$name=$data->data[$x]->name;$id=$data->data[$x]->id;
         
      echo" 
     <option value='".$id.",".$name.",".$code."'></datalist>";}   
      echo"
     <option value='".$id.",".$name.",".$code."'></datalist>";}
   		
      
  echo " 
 
            <div class='item-input-wrap'>
              <input type='hidden'  style='background-color:white;color:black;opacity:2;width:90%;'   id='tranferbank_name' name = 'tranferbank_name' required=''  value='' ></div>
              
<div class='item-input-wrap'>
              <input type='hidden'  style='background-color:white;color:black;opacity:2;width:90%;' id='tranferbankcode' name = 'tranferbankcode' value=''  /></div>


    <div class='item-input-wrap'>
              <input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;' id='tranferbank_id' name = 'tranferbank_id' value=''  /></div>
              <div id='payloadarena'>       
    <div>Account Name</div>
      <div class='item-input-wrap'>
              <input type=''  style='background-color:white;color:black;opacity:2;width:90%;' id='tranferbank_account' name = 'tranferbank_account' onclick='quadpay_enter()' value=''  readonly/></div>
           
                        <div>Amount</div>
<div class='item-input-wrap'>
              <input type='number' style='background-color:white;color:black;opacity:2;width:90%;' id='tranferbank_amount' onclick='quadpay_enter()' name = 'tranferbank_amount' value=''  /></div>
              

        <label>Please enter your, Comment</label>
    <div class='item-input-wrap'>
              <input type=''  number' style='background-color:white;color:black;opacity:2;width:90%;' id='tranferbank_comment' name = 'tranferbank_comment' onclick='quadpay_enter()'  value='' minlength='20' size=13 /></div>

</div>
            <br><div class='item-input-wrap'>
              <input type='button'  style='background-color:grey;color:black;opacity:2;' data-toggle='modal'  data-target='#quadtransferpass' class='btn-success' onclick='quadpay_submit()' id = 'tranfersumbit' value='submit' /></div> ";
	    echo  "</div></div></div>";
	    
   echo  " <div class='modal fade' id='quadtransferpass' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type= 'button' class='close' style='background-color:red;color:black;' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Password</h4>
        </div>
      <div id='quadpaypword'  class='modal-body'>
         <div id='quadtranfererror'style='background-color:pink;color:black;opacity:2;'> </div><div id='quadpaypass'>
         <div id='quadpaytranferinner' style='background-color:green;color:black;opacity:2;width:90%;' > </div>
			<input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;'   placeholder='password' value='".$password." ' name='tranfercheckpassword' id='tranfercheckpassword' />
			<div id='paytranferpassword1'>
          <div >password</div>
			<input type='password' style='background-color:white;color:black;opacity:2;width:90%;'   placeholder='pls enter password' name='paytranferpassword' onclick='quadpay_enter()' id='paytranferpassword' />
          <a><span></span>
      <span></span>
      <span></span>
      <span></span>
	  <input type='button' onclick='quadpaytranfer()' data-toggle='modal'  data-target='#success' id='payload' class='btn-success' value='submit' > </a>
	  </div>
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

document.getElementById("payloadarena").style.display = "none";

function quadpay_enter(){var bankname = $("#tranferbank_name").val(); 
    var tranfer_acc = $("#tranferbank_account").val(); 
    if (bankname  == "0"||bankname == ""){
        alert("choose  correct bank");
          document.getElementById("tranferbank_amount").readOnly =true;
          document.getElementById("tranferbank_name").readOnly =true;
         
      }else if(tranfer_acc  == "0"||tranfer_acc == "") {
          alert("please! choose correct bank");
          document.getElementById("tranferbank_amount").readOnly = true ;
         
          document.getElementById("tranferbank_comment").readOnly = true ;
          document.getElementById("tranfersumbit").readOnly = true ;
      }else {
          document.getElementById("tranferbank_amount").readOnly = false ;
          document.getElementById("tranferbank_comment").readOnly = false ;
          document.getElementById("tranfersumbit").readOnly = false ;
      } }
 function quadpay_tranfer(){
     var tranferbank_num = $("#tranferbank_number").val(); 
 if (tranferbank_num =="0"||tranferbank_num == "") 
 {alert( "enter account number first"); 
 //document.getElementById("quadpaytranferbank").innerHTML ="0";
 $("#quadpaytranferbank").val(0 );}
 else if (tranferbank_num !=="0"||tranferbank_num !== "")  {
     let texttime = $("#quadpaytranferbank").val();
    const payarray = texttime.split(",");
     var bank_name =payarray[1];
      
       var bank_code =payarray[2];
       
       var bank_id =payarray[0];
      //alert( texttime);
       
       $("#tranferbank_name").val(bank_name );
      $("#tranferbankcode").val(bank_code ); 
      $("#tranferbank_id").val(bank_id); 
      confirmquadpaytranfer();}
     document.getElementById("tranferbank_name").readOnly =true;
   }
   
  function quadpay_submit(){
      var error = document.getElementById("quadtranfererror");
      var modal = document.getElementById("quadpaypass");
     var tranferbank_num = $("#tranferbank_number").val(); 
     var tranferbank_name = $("#quadpaytranferbank").val( );
     var tranferbank_custname = $("#tranferbank_account").val( );
      var tranferbank_amount = $("#tranferbank_amount").val( );
      if (confirm("You are transfering: N"+tranferbank_amount+" to "+tranferbank_custname+ "of "+tranferbank_name)== true){ modal.style.display = "block";
      error.innerHTML  = "You are transfering: "+tranferbank_amount+" to "+tranferbank_custname+ " of "+tranferbank_name;
     document.getElementById("tranferbank_name").readOnly =true;}else { modal.style.display = "hide"; $("#quadtransferpass").modal('hide');}
      
      
 if (tranferbank_num =="0"||tranferbank_num == "") 
 {//$("#tranferpass").modal('hide'); 
 modal.style.border = "2.5px solid red";
 modal.style.display = "none";
 alert( "account number EMPTY");
 error.innerHTML  = "error: Account number EMPTY";
 document.getElementById("tranferpass").style.text.color = "red"; 
     //document.getElementById("tranferpass").innerHTML  = "choose BANK"; 
     document.getElementById("quadpaytranferbank").style.border = "0.5px solid black";
 } 
   
   if (tranferbank_name =="0"||tranferbank_name == "")
 {modal.style.border = "2.5px solid red";
 modal.style.display = "none";
 alert( "choose correct BANK"); 
 error.innerHTML  = "error: BANK name EMPTY"; 
 $("#paytranferpassword").val("");
 document.getElementById("paytranferpassword").readOnly = true ;
 document.getElementById('paytranferpassword1').style.display ='none';}
      
 
 else if (tranferbank_custname =="0"||tranferbank_custname == "")
 {alert( "empty Customer Name"); 
 $("#paytranferpassword").val("");
 document.getElementById("paytranferpassword").readOnly = true ;
 error.innerHTML  = "error: Empty Customer Name";
 modal.style.border = "2.5px solid red";
 modal.style.display = "none";
  document.getElementById('paytranferpassword1').style.display ='none'   
 }
 else if (tranferbank_amount <100||tranferbank_amount == "")
 {alert( "please Enter valid Amount");
 //error.innerHTML  = "error: Invalid Amount";
 modal.style.display = "none"; 
 $("#paytranferpassword").val("");
 document.getElementById("paytranferpassword").readOnly = true ;
 document.getElementById('paytranferpassword1').style.display ='none';
 modal.style.border = "2.5px solid red";
 document.getElementById("tranferbank_amount").style.border = "1.5px solid red";} 
   
   
   
 else if (tranferbank_num !=="0"||tranferbank_num !== "" && tranferbank_name!=="0"||tranferbank_name !== "" && tranferbank_custname !=="0"||tranferbank_custname !== "" && tranferbank_amount !=="0"||tranferbank_amount !== "")  {
     document.getElementById("tranferbank_amount").style.border = "0.5px solid black";
     let text1 = $("#quadpaytranferbank").val();
    const myArray = text1.split(",");
     var bank_name =myArray[1];
      
       var bank_code =myArray[2];
       
       var bank_id =myArray[0];
      //
       document.getElementById("paytranferpassword").readOnly = false ;
       $("#tranferbank_name").val(bank_name );
      $("#tranferbankcode").val(bank_code ); 
      $("#tranferbank_id").val(bank_id); 
      document.getElementById("tranferbank_amount").style.border = "0.5px solid black";
      modal.style.border = "1.5px solid green";
      document.getElementById('paytranferpassword1').style.display ='block';
     } }
   
   
    
   function confirmquadpaytranfer(){ 
    var Tbanknumber=$("#tranferbank_number").val(); 
    var Tbankcode  = $("#tranferbankcode").val();
    var Tbankname  = $("#tranferbank_name").val();
    document.getElementById("tranferbank_name").readOnly =true;
    
    $.ajax({
      url : "https://wish.designsandsystems.com.ng/quadpayverifybank.php",
      type : "POST",
      cache: false,
      data : {Tbankname :Tbankname ,Tbanknumber:Tbanknumber,Tbankcode :Tbankcode },
      beforeSend:function() {
                        //document.getElementById("overlay").style.display = "block";
                        $("#").val("some moment...");
                    },
      success:function(data){if (data==""){
          //document.getElementById("overlay").style.display = "none";
      alert( "failed name inqury");
          document.getElementById("tranferbank_amount").readOnly = true ;
          document.getElementById("tranferbank_comment").readOnly = true ;
          document.getElementById("tranfersumbit").readOnly = true ;
          $("#tranferbank_name").val("0");document.getElementById("tranferbank_name").readOnly ="0";
          $("#tranferbank_amount").val("0");
          $("#tranferbank_comment").val(0);
      }else
          {$("#tranferbank_account").val(data);
          //document.getElementById("overlay").style.display = "none";
          document.getElementById("payloadarena").style.display = "block";
              document.getElementById("tranferbank_name").readOnly =true;
          }
          
      }
    });
    
    
   }
  
     function quadpaytranfer(){
    document.getElementById("tranferbank_name").readOnly =true;
    var customer_account_name =$("#tranferbank_account").val();
    var bank_name=$("#tranferbank_name").val();
    var bank_code=$("#tranferbankcode").val(); 
    var transbank_name  = $("#quadpaytranferNAME").val();
    var quademail  = $("#quadpaytranferemail").val();
    var bank_accountnumber  = $("#tranferbank_number").val(); 
    var tranfercheckpass  = $("#quadpaytranferpassword").val();
    var paytranferpass  = $("#paytranferpassword").val();
    var bank_narrationfirst  = $("#tranferbank_comment").val();
    var bank_narration  = transbank_name +": from wish/quadpay :"+bank_narrationfirst;
    var transbank_amount  = $("#tranferbank_amount").val();
    var transbank_value  = $("#quadpaytranfervalue").val();
    var transbank_ref  = Math.floor(Math.random() * 19000000000)+1;
    var transequate =transbank_value - transbank_amount-100;
    var fee_name = "FEE:- "+customer_account_name;
    if (paytranferpass =="0"||paytranferpass ==""){ alert("Please enter Password");
        
       
    }else if(paytranferpass!==tranfercheckpass){alert("Please enter correct Password" ); 
      } else {
  
    if (transequate>0){
    $.ajax({
      url : "https://wish.designsandsystems.com.ng/quadpaybanktranfer.php",
      type : "POST",
      cache: false,
      data : {email :quademail,bank_code:bank_code,customer_account_name:customer_account_name,transbank_amount:transbank_amount,bank_narration:bank_narration,bank_accountnumber:bank_accountnumber,transbank_ref:transbank_ref},
      beforeSend:function() {
          //document.getElementById("overlay").style.display = "block";
          document.getElementById("payload").style.display = "none";
                    },
      success:function(data){ if (data=="success")
          
          {//document.getElementById("overlay").style.display = "none";
          document.getElementById("payload").style.display = "block";document.getElementById("quadpaydata").style.display = "none";
           var quadpaytransferbalance= transbank_value - transbank_amount;
           $.ajax({
      url : "https://wish.designsandsystems.com.ng/quadpaybillsupdate.php",
      type : "POST",
      cache: false,
      data : {quadnewemail :quademail,billcode:bank_accountnumber,customer:customer_account_name,quadpaybillcostbalance:quadpaytransferbalance,quadpaybillcost:transbank_amount,quadpayoldValue:transbank_value,quadbanktransID:transbank_ref,quadbanknarration:bank_narration,billername:bank_name},
      beforeSend:function() {
                        //$("#pass").val("some moment...");alert( 'hello');
                    },
      success:function(data){
          if (data !=='successful'){if (transbank_amount<20000){
              //document.getElementById("overlay").style.display = "none";
              var charge_amount  = 15;
          var charge_narration  = "charge_amount :" +charge_amount;
          var charge_bank_name  = "tranfer charges ";
              $.ajax({
      url : "https://wish.designsandsystems.com.ng/quadpaybillsupdate.php",
      type : "POST",
      cache: false,
      data : {quadnewemail :quademail,billcode:bank_accountnumber,customer:fee_name,quadpaybillcostbalance:quadpaytransferbalance,quadpaybillcost:charge_amount,quadpayoldValue:transbank_value,quadbanktransID:transbank_ref,quadbanknarration:charge_narration,billername:charge_bank_name},
      beforeSend:function() { //document.getElementById("overlay").style.display = "block";
      document.getElementById("payload").style.display = "none";  },
      success:function(data){
          //document.getElementById("overlay").style.display = "none";
          document.getElementById("payload").style.display = "block";alert( data);document.getElementById("quadpaydata").style.display = "none";
      }});} 
      else if(transbank_amount>=20000 && transbank_amount<50000){var charge_amount  = 26;
          var charge_narration  = "charge_amount :" +charge_amount;
          var charge_bank_name  = "tranfer charges ";
              $.ajax({
      url : "https://wish.designsandsystems.com.ng/quadpaybillsupdate.php",
      type : "POST",
      cache: false,
      data : {quadnewemail :quademail,billcode:bank_accountnumber,customer:fee_name,quadpaybillcostbalance:quadpaytransferbalance,quadpaybillcost:charge_amount,quadpayoldValue:transbank_value,quadbanktransID:transbank_ref,quadbanknarration:charge_narration,billername:charge_bank_name},
      beforeSend:function() { //document.getElementById("overlay").style.display = "block";
      document.getElementById("payload").style.display = "none";  },
      success:function(data){//document.getElementById("overlay").style.display = "none";
      document.getElementById("payload").style.display = "block";alert( data);document.getElementById("quadpaydata").style.display = "none";}});}
      else if(transbank_amount>=50000){var charge_amount  = 55;
          var charge_narration  = "charge_amount :" +charge_amount;
          var charge_bank_name  = "tranfer charges "; 
              $.ajax({
      url : "https://wish.designsandsystems.com.ng/quadpaybillsupdate.php",
      type : "POST",
      cache: false,
      data : {quadnewemail :quademail,billcode:bank_accountnumber,customer:fee_name,quadpaybillcostbalance:quadpaytransferbalance,quadpaybillcost:charge_amount,quadpayoldValue:transbank_value,quadbanktransID:transbank_ref,quadbanknarration:charge_narration,billername:charge_bank_name},
      beforeSend:function() { //document.getElementById("overlay").style.display = "block"; 
      },
      success:function(data){//document.getElementById("overlay").style.display = "none";
      document.getElementById("payload").style.display = "block";document.getElementById("quadpaydata").style.display = "none";alert( data);}});} else{document.getElementById("quadpaydata").style.display = "none";alert("insufficient FUND");} 
              }else{alert("OKKKK");} 
          $("#pass").modal('hide');
          
      }
    });
                        
                        $("#").val("some moment...");
                   }else{document.getElementById("overlay").style.display = "none";
                   document.getElementById("payload").style.display = "block";alert("invalid transaction");$("#quadtransferpass").modal('hide');}
          
          
          
          
          fetchData();alert( data);
          document.getElementById("tranferbank_name").readOnly =true;
          
          $("#quadtransferpass").modal('hide');
           
      }
    });} else {alert ("low balance"); $("#quadtransferpass").modal('hide');}
  }}
   </script>