<?php

	// Database connection 
	
	require_once('connection.php');
	$myemail = $_GET['myemail'];
	$result = mysqli_query($con, "SELECT SUM(file) AS value_sum FROM wishvile_table WHERE Email='$myemail'  AND (remark3 ='success' OR remark3 ='processed')"); 
$sumrow = mysqli_fetch_assoc($result); 
$convertNaira = $sumrow['value_sum'];
$sum = number_format($convertNaira, 2);
$result1 = mysqli_query($con, "SELECT SUM(others) AS value_sum_dollar FROM wishvile_table WHERE Email='$myemail'  AND (remark3 ='success' OR remark3 ='processed')"); 
$sumrowD = mysqli_fetch_assoc($result1); 
$convert = $sumrowD['value_sum_dollar'];
$sumUSD = number_format($convert, 2);
$toNairavalue  = 1220;
$toDollavalue = 1200;

echo "
<div class='tab'><table style='background-color:#ed79e9;opacity:2;color:black;border: 1px solid #555;border-color:#ed79e9'><div ><thead><span style='font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:24px;color:blue;'>Dollar Rate: $</span><tr><th id='dollar_buy' style='background-color:#ed79e9;width:30%;style='opacity:2;color:black;text-align: left;'>buy(&#8358;-$)</th><th style='background-color:#f5c6e7;opacity:2;color:black;text-align: center;'>" . $toDollavalue . "<input type='hidden'  id='dlar' name = 'dlar'  value='  $toDollavalue ' ></th>
<th style='background-color:#ed79e9;opacity:2;color:style='font-size:14px;width:30%;black;text-align: left;'>sell($-&#8358;)</th><th id='dollar_sell' style='background-color:#f5c6e7;opacity:1;color:black;text-align: center;'>" . $toNairavalue. "<input type='hidden'  id='nnaira' name = 'nnaira'  value=' $toNairavalue ' ></th>
</tr></thead></div> ";

echo "<div class='tab'><table style='background-color:#c96ccc;opacity:2;color:black;'><div ><thead><tr><th style='background-color:#c96ccc;opacity:2;color:black;text-align: center;'>_Naira_(&#8358;)</th><th style='background-color:#202766;opacity:2;color:white;text-align: center;'>USDollar($)</th></tr></thead></div>";
echo "<br>
<span type='' style='font-size:16px; font-family:Arial, Helvetica, sans-serif; text-align:left; line-height:17px;color:#000000;'>TOTAL ASSET</span><br><n></n>";
echo "<div ><tbody><tr><td style='background-color:#dbc8e3;opacity:2;color:black;text-align: center;height: 40%;'><br>" . $sum . "<input type='hidden'  id='nnaira' name = 'TOTALnaira'  value=' $sum  ' ><br><br><br></td><td style='background-color:#8ad3f2;opacity:2;color:black;text-align: center;height: 40%;'><br>" . $sumUSD. "<input type='hidden'  id='TOTALdollar' name = 'dlar'  value='  $sumUSD ' ><br><br><br></td></tr></tbody></div></table ></div>";
$con->close();
?>