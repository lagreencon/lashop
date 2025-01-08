<?php
require_once('connection.php');
$benVN= $_POST['BVNnumber'];   	 
$SSname = $_POST['SURNname'];
$OTHER_name = $_POST['OTHERname'];

$eMAIl = $_POST['NEmail'];
$PHone= $_POST['PHonenumber'];   	 
$NXTKINname = $_POST['kin_name'];
$NXTKINbeevee = $_POST['NXTKINbvn'];
$gen_ref = rand(100000000, 999999999);
$NXTKINeMAIl = $_POST['kin_email'];
$NXTKINPHone = $_POST['kin_phone'];
$dateofBIRTH = $_POST['Datebirth'];
 $q=mysqli_query($con, "SELECT * FROM table_regitration_wish WHERE nemail='$eMAIl'"); 
while ($row=mysqli_fetch_assoc($q)){
   $device  = $row["device"]; 
   
 $name  = $row["Surname"];
    $phone  = $row["phone"]; 
   $customerid  = $row["customerid"];
    $address  = $row["address"]; 
}


$fields = [
    'phonenumber'=> $benVN,
    'tx_ref'=> $gen_ref,
    'email'=> $eMAIl,
    'is_permanent'=> "true",
    'bvn' => $benVN,
    
    'first_name' => $SSname,
    'last_name' => $OTHER_name, ];

$url = "https://api.flutterwave.com/v3/virtual-account-numbers";
 $fields_string = http_build_query($fields);

  //open connection
  $ch = curl_init();
  
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, true);
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer FLWSECK-4924367c4945d8a25e1bbe069a03834f-18ab06b2694vt-X",
    "Cache-Control: no-cache",
  ));
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  
  //execute post
  $result = curl_exec($ch);
  //echo $result;
  $data=array();
  $data=json_decode($result);
  $status=$data->status;
  $reffer=$data->data->reference;
  $account_number=$data->data->account_number;
  $bank_name=$data->data->bank_name;
  echo $bank_name;
  
  
  
  
   $updates = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `biodata` WHERE `email` ='$eMAIl'"));
    if($updates == 0)
    {
        $insert3 = mysqli_query($con,"INSERT INTO `biodata` (`id`, `clientID`, `name`, `email`, `phone`, `address`, `next_of_kin`, `accountno`, `log`, `lat`, `own_bvn`, `next_of_kin_relation`, `next_of_kin_phone`, `newbalance`, `bankname`, `device`, `next_of_kin_email`, `narration`, `own_datebirth`, `billamount`, `preferences`, `created_at`) VALUES (NULL, NULL, '$SSname', '$eMAIl', '$phone', '$address', '$NXTKINname', '$account_number', NULL, NULL, '$benVN', NULL, '$NXTKINPHone', NULL, '$bank_name', NULL, '$NXTKINeMAIl', NULL, NULL, '$dateofBIRTH', NULL, CURRENT_TIMESTAMP)");
        
        $update = "UPDATE `table_regitration_wish` SET `Surname` = '$SSname',`regno` = '$account_number' where `nemail` ='$eMAIl'";
			mysqli_query($con, $update);
       $updatequad = "UPDATE `quadpay` SET `name` = '$SSname',`accountno` = '$account_number' where `email` ='$eMAIl'";
			mysqli_query($con, $updatequad);
       
        
       
       
        
        
        
        if($insert3 && $update && $updatequad)
            {echo "  success corresponding bank is  ";}
        else{
            echo "error";}
    }
  
  
   ?>