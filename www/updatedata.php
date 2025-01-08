<?php

	// Database connection 
	
	require_once('connection.php');


$password = $_POST['password'];
$device2 = $_POST['device2'];    	 
$mail = $_POST['mail'];


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
echo"<div class='item-title item-label'>E-Mail</div>
            <div class='item-input-wrap'>
              <input type='email' placeholder='Your@email.com' style='background-color:white;color:black;opacity:2;width:90%;'   id='newemail' name = 'newemail' required=''  value='".$email."' ></div>
			<div id='overlay' >
  <img src='https://wish.designsandsystems.com.ng/loading.gif' id='img' >
</div> 
           <div class='item-input-wrap'>
			<input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;'   placeholder='New Password' name='newpassword' id='newpassword' value='".$password."' required='' readonly/></div>
			<div class='item-input-wrap'>
			<input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;'   placeholder='Confirm Password' name='newconfirmpassword' id='newconfirmpassword' value='' />
			</div>
			<div>bvn Number</div>
            <div class='item-input-wrap'>
              <input type='number' placeholder='BVN Number' style='background-color:white;color:black;opacity:2;width:90%;' id='bvnnumber' name = 'bvnnumber' value=''  required=''/></div>
             <div>date of birth</div>
            <div class='item-input-wrap'>
              <input type='date' style='background-color:white;color:black;opacity:2;width:90%;' id='Dbirth' name = 'Dbirth' value=''  required=''/></div>
              
		<div>Account Number</div>
      <div class='item-input-wrap'>
              <input type=''  style='background-color:white;color:black;opacity:2;width:90%;' id='updatebank_number' name = 'updatebank_number' value=''  /></div> 
              
              
              <div>Bank</div><div>
              <select  style='foreground-color:#428F6A;color:black;opacity:2;width:60%;' name='updatebank' id='updatebank' onchange='update_bankname()'>
	               <option value='0'>Choose Bank</option>
				  ";
              
             
    	$x=300;
for ($x = 0; $x <= 300; $x++) {$code=$data->data[$x]->code;$name=$data->data[$x]->name;$id=$data->data[$x]->id;
   

    echo" 
      <option value='".$id.",".$name.",".$code."'>".$name."--".$id."--".$code."</option>";
        
    }		
      	echo "</select><br></div>
      	
            <div class='item-input-wrap'>
              <input type='hidden'  style='background-color:white;color:black;opacity:2;width:90%;'   id='updatebank_name' name = 'updatebank_name' required=''  value='' ></div>
          <div class='item-input-wrap'>
              <input type='hidden'  style='background-color:white;color:black;opacity:2;width:90%;' id='updatebankcode' name = 'updatebankcode' value=''  /></div>


    <div class='item-input-wrap'>
              <input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;' id='updatebank_id' name = 'updatebank_id' value=''  /></div>
                     
    <div>Account Name</div>
      <div class='item-input-wrap'>
              <input type=''  style='background-color:white;color:black;opacity:2;width:90%;' id='updatebank_account' name = 'updatebank_account' onclick='update_enter()' value=''  readonly/></div>    
              
		<div style='background-color:grey;color:black;opacity:2;width:96%;'>
		<div style='background-color:skyblue;color:black;opacity:2;'>NEXT OF KIN</div>	 
			 <div>Surname</div>
            <div class='item-input-wrap'>
              <input type='text' placeholder='Kin Surname' style='background-color:white;color:black;opacity:2;width:90%;' id='kinsurname' name = 'kinsurname' value=''  required=''/></div>
			<div>Other Name</div>
            <div class='item-input-wrap'>
              <input type='text' placeholder='Kin Other Name' style='background-color:white;color:black;opacity:2;width:90%;' id='kinname' name = 'kinname' value=''  required=''/></div>
              
              <div>Kin Phone</div>
            <div class='item-input-wrap'>
              <input type='number' placeholder='080' style='background-color:white;color:black;opacity:2;width:90%;' id='kinphone' name = 'kinphone' value=''  required=''/></div>
              
              <input type='email' placeholder='email@mail.com' style='background-color:white;color:black;opacity:2;width:90%;' id='kinemail' name = 'kinemail' value=''  required=''/></div>
              
              
            <div class='item-input-wrap'>
              <input type='hidden' placeholder='Kin BVN Number' style='background-color:white;color:black;opacity:2;width:90%;' id='kinbvnnumber' name = 'kinbvnnumber' value=''  required=''/></div>";
	    echo  "</div>
	    <br><div class='item-input-wrap'>
              <input type='button'  style='background-color:grey;color:black;opacity:2;' data-toggle='modal'  data-target='#updatepass' class='btn-success' onclick='refgenbvn()' id = 'updatesumbit' value='submit' /></div>";
	    echo  "</div>
	    
    <div class='modal fade' id='updatepass' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type= 'button' class='close' style='background-color:red;color:black;' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Password</h4>
        </div>
      <div id='updatepword'  class='modal-body'>
         <div id='updateerror'> </div><div id='updatepasswd'>
         <div id='updateinner'> </div>
			<input type='hidden' style='background-color:white;color:black;opacity:2;width:90%;'   placeholder='password' value='".$password." ' name='updatecheckpassword' id='updatecheckpassword' />
			<div id='updatepassword1'>
          <div >password</div>
			<input type='password' style='background-color:white;color:black;opacity:2;width:90%;'   placeholder='pls enter password' name='updatepassword'  id='updatepassword' />
          <a><p id='lud'  ><span></span>
      <span></span>
      <span></span>
      <span></span>
	  <input type='button'  id='boton'  onclick='finaldataupdate()' data-toggle='modal'  data-target='#success' class='btn-success' value='submit' > </a></p></div>
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

function update_enter(){var bankname = $("#updatebank_name").val(); 
    var tranfer_acc = $("#updatebank_account").val(); 
    if (bankname  == "0"||bankname == ""){
        alert("choose  bank");
          
          document.getElementById("tranferbank_name").readOnly =true;
         
      }else {
          
          document.getElementById("tranfersumbit").readOnly = false ;
      } }

function update_bankname(){
     var updatebank_num = $("#updatebank_number").val(); 
 if (updatebank_num =="0"||updatebank_num == "") 
 {alert( "enter account number first"); 
 //document.getElementById("quadpaytranferbank").innerHTML ="0";
 $("#updatebank").val(0 );}
 else if (updatebank_num !=="0"||updatebank_num !== "")  {
     let text1 = $("#updatebank").val();
    const myArray = text1.split(",");
     var bank_name =myArray[1];
      
       var bank_code =myArray[2];
       
       var bank_id =myArray[0];
      //alert(myArray );
       
       $("#updatebank_name").val(bank_name );
      $("#updatebankcode").val(bank_code ); 
      $("#updatebank_id").val(bank_id); }
      confirmupdatebank();
     document.getElementById("updatebank_name").readOnly =true;
   } 
   
   function confirmupdatebank(){
      
    var Tbanknumber=$("#updatebank_number").val(); 
    var Tbankcode  = $("#updatebankcode").val();
    var Tbankname  = $("#updatebank_name").val();
    document.getElementById("updatebank_name").readOnly =true;
    
    $.ajax({
      url : "https://wish.designsandsystems.com.ng/quadpayverifybank.php",
      type : "POST",
      cache: true,
      data : {Tbankname :Tbankname ,Tbanknumber:Tbanknumber,Tbankcode :Tbankcode },
      beforeSend:function() {
                        document.getElementById("overlay").style.display = "block";
                        $("#").val("some moment...");
                    },
      success:function(data){if (data==""){document.getElementById("overlay").style.display = "none";alert( "failed name inqury");
          
          $("#updatebank_name").val("0");
          
      }else
          {$("#updatebank_account").val(data);
          document.getElementById("overlay").style.display = "none";
              document.getElementById("updatebank_name").readOnly =true;
          }
          
      }
    });
  
   }
   
    function refgenbvn(){
      
    var bvNnumber=$("#bvnnumber").val(); 
    
    var Tbankname  = $("#updatebank_account").val();
    document.getElementById("updatebank_account").readOnly =true;
    var banknamew = $("#updatebank_name").val(); 
     var kinsname = $("#kinsurname").val(); 
      var kinphoneno = $("#kinphone").val();
    if (banknamew  == "0"||banknamew == ""){alert( "please ENTER BVN or Account Number");
    //document.getElementById("overlay").style.display = "none";
    document.getElementById("updatepword").style.display = "none";}
    else if ((kinsname  == "0"||kinsname == "")&&(kinphoneno  == "0"||kinphoneno == "")){alert( "please ENTER KinName or Kin Number");
    //document.getElementById("overlay").style.display = "none";
    document.getElementById("updatepword").style.display = "none";}else{
    let namEE = Tbankname;
    const myArray = namEE.split(" ");
    let surNAme = myArray[0];
    let OtherNAme = myArray[1];
    $.ajax({
      url : "https://wish.designsandsystems.com.ng/quadbvndetails.php",
      type : "POST",
      cache: false,
      data : {BVNnumber :bvNnumber ,SURNname:surNAme,OTHERname :OtherNAme},
      beforeSend:function() {
                        //alert( OtherNAme);alert( surNAme);document.getElementById("overlay").style.display = "block";
                        
                        $("#").val("some moment...");
                    },
      success:function(data){if (data==""){//document.getElementById("overlay").style.display = "none";
      alert( "failed");
          
          $("#updatebank_name").val("0");
          
      }else
          {//$("#updatebank_account").val(data); alert( data);
          //document.getElementById("overlay").style.display = "none";
              //document.getElementById("updatebank_name").readOnly =true;
          }
          
      }
    });}
  
   }
   
   function finaldataupdate(){
       var updatecheckpassword=$("#newpassword").val();
   var updatepassword=$("#updatepassword").val();
   var Dbirth=$("#Dbirth").val();
    var kinbvnnumber=$("#kinbvnnumber").val();
    var kinphone=$("#kinphone").val();
    var kinname=$("#kinsurname").val(); 
    var kinmail=$("#kinemail").val();
    var bvNnumber=$("#bvnnumber").val(); 
    var neWEmail=$("#newemail").val(); 
    var bank_name  = $("#updatebank_account").val();
    document.getElementById("updatebank_account").readOnly =true;
    let NamE = bank_name;
    const NwArray = NamE.split(" ");
    let surNAme = NwArray[0];
    let otherNAme = NwArray[1]; 
    if( updatepassword==updatecheckpassword ){
    $.ajax({
      url : "https://wish.designsandsystems.com.ng/quadcreateVIRTUALaccount.php",
      type : "POST",
      cache: true,
      data :{BVNnumber :bvNnumber ,SURNname:surNAme,OTHERname :otherNAme, NEmail:neWEmail,kin_name:kinname,kin_email:kinmail,kin_phone:kinphone,NXTKINbvn:kinbvnnumber,Datebirth:Dbirth},
      beforeSend:function() {//
                        document.getElementById("boton").style.display = "none";
                        $("#lud").val("some moment...");
                    },
      success:function(data){if (data==""){//document.getElementById("overlay").style.display = "none";
      alert( "failed");
          
          $("#updatebank_name").val("0");
          
      }else
          {alert( data);//$("#updatebank_account").val(data); 
          document.getElementById("updatepass").style.display = "none";
          //document.getElementById("overlay").style.display = "none";
          
              //document.getElementById("updatebank_name").readOnly =true;
          }
          
      }
    });} else if(updatepassword == ""){alert( "Please enter password");
        } else{alert("Please enter CORRECT password");
        }
  
   }
   
</script>