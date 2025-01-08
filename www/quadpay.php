<?php

	// Database connection 
	
	require_once('connection.php');


$password = $_POST['password'];
$device2 = $_POST['device1'];    	 
$mail = $_POST['mmail'];
$billtype  = $_POST['billtype'];
$billGrp  = $_POST['billGroup'];
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

$result =mysqli_num_rows( mysqli_query($con, "SELECT * FROM table_regitration_wish WHERE  nemail ='$mail' AND device='$device2' OR password='$password'"));
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
    CURLOPT_URL => "https://api.flutterwave.com/v3/bill-categories?$billtype",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer FLWSECK-4924367c4945d8a25e1bbe069a03834f-18ab06b2694vt-X",
      "Cache-Control: no-cache",
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


echo "<form NAME = 'frmquadpay' id='frmquadpay'><div>";
echo"
        
        <div name='quadpaybalan' id='quadpaybalan' >'".$newbalance."'</div>
            <div class='item-input-wrap'>
              <input type='hidden' placeholder='Your@email.com' style='background-color:white;color:black;opacity:2;width:90%;'   id='newemail' name = 'newemail' required=''  value='".$email."' ></div>
			<div id='overlay' >
  <img src='https://wish.designsandsystems.com.ng/loading.gif' id='img' >
</div> 
           <div class='item-input-wrap'>
			<input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;'   placeholder='Password' name='quadpaynewpassword' id='quadpaynewpassword' value='".$password."' required=''/></div>
			
			<div class='item-input-wrap'>
			<input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;'    name='quadpaynewdevice' id='quadpaynewdevice' value='".$device2."' required=''/></div>
		
              <div class='item-input-wrap'>
			<input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;'    name='quadpaybal' id='quadpaybal' value='".$newbalance."' required=''/></div>
		
              
              
              <div>Bill</div><div>
              <select  style='foreground-color:#428F6A;color:black;opacity:2;width:60%;' name='bill' id='bill' onchange='quadpay_biller()'>
	               <option value='0'>Choose your Biller</option>
				  ";
              
             
    	$x=400;
for ($x = 0; $x < 400; $x++) {$code=$data->data[$x]->biller_code;$bill=$data->data[$x]->name;$pcode=$data->data[$x]->product_code;$customer=$data->data[$x]->customer;$label_name=$data->data[$x]->label_name;$biller_name=$data->data[$x]->biller_name;$amount=$data->data[$x]->amount;$item_id=$data->data[$x]->item_code;$biller_code=$data->data[$x]->biller_code;$country=$data->data[$x]->country;
//$biller_name->data[$x]->biller_name;
    if ($country=='NG'&&$label_name ==$billGrp){ 

    echo"
    <optgroup label=''>
    
      <option value='".$item_id.",".$amount.",".$biller_code.",".$customer.",".$label_name.",".$biller_name."'>".$bill."---".$amount."</option>";
        
    }}		
      echo" <input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;' list='browsers' placeholder='Search..' id='quadpaytranferbank' onchange='quadpay_tranfer()'>";	
      $x=400;
for ($x = 0; $x < 400; $x++) {echo" <datalist id='browsers'> ";
    $code=$data->data[$x]->biller_code;$bill=$data->data[$x]->name;$pcode=$data->data[$x]->product_code;$customer=$data->data[$x]->customer;$label_name=$data->data[$x]->label_name;$biller_name=$data->data[$x]->biller_name;$amount=$data->data[$x]->amount;$item_id=$data->data[$x]->item_code;$biller_code=$data->data[$x]->biller_code;$country=$data->data[$x]->country;
//$biller_name->data[$x]->biller_name;  
if ($country=='NG'){ 
    for ($x = 0; $x < 400; $x++) {echo" <datalist id='browsers'> ";
    $code=$data->data[$x]->biller_code;$bill=$data->data[$x]->name;$pcode=$data->data[$x]->product_code;$customer=$data->data[$x]->customer;$label_name=$data->data[$x]->label_name;$biller_name=$data->data[$x]->biller_name;$amount=$data->data[$x]->amount;$item_id=$data->data[$x]->item_code;$biller_code=$data->data[$x]->biller_code;$country=$data->data[$x]->country;
//$biller_name->data[$x]->biller_name;  
if ($country=='NG'){ 
    
      echo" 
     <option value='".$item_id.",".$amount.",".$biller_code.",".$customer.",".$label_name.",".$biller_name."'> </datalist>";  
     }} 
    
      echo" 
     <option value='".$item_id.",".$amount.",".$biller_code.",".$customer.",".$label_name.",".$biller_name."'> </datalist>";  
     }} 
  echo " 
 <div class='item-title item-label'>E-Mail</div>
            <div class='item-input-wrap'>
              <input type='hidden'  style='background-color:white;color:black;opacity:2;width:90%;'   id='biller_name' name = 'biller_name' required=''  value='' ></div>
<div class='item-input-wrap'>
              <input type='hidden' placeholder='billnumber' style='background-color:white;color:black;opacity:2;width:90%;' id='billnumber' name = 'billnumber' value='".$password."'  /></div>

</div>
    <div class='item-input-wrap'>
              <input type='number' placeholder='amount' style='background-color:white;color:black;opacity:2;width:90%;' id='billcost' name = 'billcost' value=''  onclick='quadpay_enterpay()'/></div>

</div>
    <div class='item-input-wrap'>
              <input type='hidden' placeholder='code' style='background-color:white;color:black;opacity:2;width:90%;' id='billtype' name = 'billtype' value=''  /></div>

</div>
        <label>Please enter your, ".$label_name."</label>
    <div class='item-input-wrap'>
              <input type='number' placeholder='your,".$label_name." number' style='background-color:white;color:black;opacity:2;width:90%;' id='billcustomer' onclick='quadpay_enterpay()' name = 'billcustomer' value=''  /></div>

</div>
            <br><div class='item-input-wrap'>
              <input type='button'  style='background-color:grey;color:black;opacity:2;' data-toggle='modal'  data-target='#pass' class='btn-success' onclick='confirmquadpay()'  value='submit' /></div>";
	    echo  "</div>";
	    
   echo  " <div class='modal fade' id='pass' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type= 'button' class='close' style='background-color:pink;color:black;' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Password</h4>
        </div>
      <div id='quadpaybillpassword'  class='modal-body'>
         <div id='quadpaybillerror' style='background-color:red;color:black;opacity:2;width:90%;'> </div><div id='quadpaypass'>
         <div id='quadpayinner' style='background-color:green;color:black;opacity:2;width:90%;'> </div>
			<input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;'   placeholder='password' value='".$password." ' name='checkpassword' id='checkpassword' />
			
          <div >password</div>
			<input type='password' style='background-color:white;color:black;opacity:2;width:90%;'   placeholder='pls enter password' name='paybillpassword' id='paybillpassword' />
          <a><span></span>
      <span></span>
      <span></span>
      <span></span>
	  <input type='button' onclick='paybill()' data-toggle='modal'  data-target='#success' class='btn-success' value='submit' > </a>
	  </div>
	  
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div></div></form>";

   }    
   
    else 
			   echo "error"; 
			
     
        $con->close();
?>
<script>

function quadpay_enterpay(){
    var billar = $("#bill").val();
    var billcust = $("#billcustomer").val(); 
    var billco = $("#billcost").val(); 
    if (billar  == "0"||billar == ""){
        alert("choose  BILLER");
          document.getElementById("billcost").readOnly =true;
          document.getElementById("billcustomer").readOnly =true;
         
      }else if(billco  == "null"||billco == "") {
          alert("please! AMOUNT");
          document.getElementById("billcost").readOnly = true ;
         
          document.getElementById("billcustomer").readOnly = true ;
          
      }else if(billco  !== "0") {
          document.getElementById("billcustomer").readOnly = false ;
          document.getElementById("billcost").readOnly = true ;
          
      } }

 function quadpay_biller(){
     let text = $("#bill").val();
    const myArray = text.split(",");
     var bill =myArray[0];
       //var bill =$("#bill").val();
       var billamount =myArray[1];
       var billty =myArray[2];
       var customerno =myArray[3];
       var bill_name =myArray[5];
      //alert(myArray );
       document.getElementById("billnumber").innerHTML = bill; 
       $("#billnumber").val(bill );
      $("#billcost").val(billamount ); 
      $("#billtype").val(billty); 
      $("#billcustomer").val(customerno);
      $("#biller_name").val(bill_name);
      if (billamount !== "0"){document.getElementById("billcost").readOnly = true;}else {document.getElementById("billcost").readOnly = false;}
   }
   
    
   function confirmquadpay(){
       var modal = document.getElementById("pass");
      var passwd = document.getElementById("quadpaypass");
    
       let text = $("#bill").val();
    const myArray = text.split(",");
     var billlabel=myArray[4];
     var itemcode = $("#billnumber").val();
    var bill =$("#bill").val();
    var billcode =$("#billtype").val();
    var customer =$("#billcustomer").val();
    var type=$("#billtype").val();
    var billcost=$("#billcost").val(); 
    var emailsalt  = $("#newemail").val();
    var billername  = $("#biller_name").val();
   
     document.getElementById("quadpayinner").style.border = "3px solid green";
    document.getElementById("quadpayinner").innerHTML ='you are about to purchase: '+billername+"  for: "+customer+" at N"+billcost;
    if (customer=="0"||customer==""){ alert("Please enter " +billlabel);
        document.getElementById("quadpaybillerror").innerHTML = "Please enter " +billlabel; 
        
        passwd .style.display = "none";
    }else if(billcost==""||billcost<50){alert("Please enter Amount not less than 50" ); document.getElementById("quadpaybillerror").innerHTML = "Please enter Amount"; 
       // modal.style.display = "none";
        passwd .style.display = "none";} 
        else {
        passwd .style.display = "block";
    
    $.ajax({
      url : "https://wish.designsandsystems.com.ng/confirmquadpaybiller.php",
      type : "POST",
      cache: false,
      data : {itemcode :itemcode,email :emailsalt,billcode:billcode,customer:customer,billcost:billcost,billername:billername},
      beforeSend:function() {
                        //$("#pass").text("some moment...");
                        //$('.loader').fadeOut();document.getElementById("overlay").style.display = "block";
                        
                    },
      success:function(data){
          alert(data);
          //document.getElementById("overlay").style.display = "none";
          $("#billcustomer").val(data); 
         
      }
    });
  }}
  
  
     function paybill(){
     
    var checkpass =$("#quadpaynewpassword").val();
    var billcode =$("#billtype").val();
    var customer =$("#billcustomer").val();
    var type=$("#billtype").val();
    var billcost=$("#billcost").val(); 
    var billcostnew = $.trim(document.frmquadpay.billcost.value); 
    var quadnewemail  = $("#newemail").val();
    var billername  = $("#biller_name").val();
    var paybillpass  = $("#paybillpassword").val();
    var transbill_ref  = Math.floor(Math.random() * 19000000000)+1;
    var quadpaybalancecheck  = $.trim(document.frmquadpay.quadpaybal.value);
    var billequate =quadpaybalancecheck-billcostnew;
    if (paybillpass =="0"||paybillpass ==""){ alert("Please enter Password");
        
       
    }else if(paybillpass!==checkpass){alert("Please enter correct Password" ); 
      } else {
  
    if (confirm('you are about to purchase: '+billername+"  for: "+customer+" at N"+billcost)== true){
               
    if ( billequate>0 ){
    
    $.ajax({
      url : "https://wish.designsandsystems.com.ng/paybills.php",
      type : "POST",
      cache: false,
      data : {quadnewemail :quadnewemail,billcode:billcode,customer:customer,billcost:billcost,billername:billername,quadbanktransID:transbill_ref},
      beforeSend:function() { // document.getElementById("overlay").style.display = "block";    
                        //$("#pass").val("some moment...");
                    },
      success:function(data){alert(data);
      //document.getElementById("overlay").style.display = "none";
          if (data=="success"){var quadpaybillcostbalance= quadpaybalancecheck - billcost;
           $.ajax({
      url : "https://wish.designsandsystems.com.ng/quadpaybillsupdate.php",
      type : "POST",
      cache: false,
      data : {quadnewemail :quadnewemail,billcode:billcode,quadpayoldValue:quadpaybalancecheck,quadpaybillcost:billcost,customer:customer,quadpaybillcostbalance:quadpaybillcostbalance,quadbanktransID:transbill_ref,billername:billername},
      beforeSend:function() {
                        //document.getElementById("overlay").style.display = "block";
                        //$("#pass").val("some moment...");
                    },
      success:function(data){//document.getElementById("overlay").style.display = "none";
          alert( data);
          $("#pass").modal('hide');
          
      }
    });}
         else{alert("invalid transaction");$("#pass").modal('hide');}fetchData();
         
      }
    });} else {alert ("low balance"); $("#pass").modal('hide');}
        
    }else {alert("ABORTED"); $("#pass").modal('hide');}
  }}
   </script>