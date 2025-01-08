
 $(document).ready(function() {
            
			var myDate = new Date();
            var id = "LD-"+decodeURI(getUrlVars()["id"]);
            var images = decodeURI(getUrlVars()["images"]);
			var myLat = decodeURI(getUrlVars()["myLat"]);
			var myLng = decodeURI(getUrlVars()["myLng"]);
            var priceScale = decodeURI(getUrlVars()["price"]);
		    //var tr_id = Math.floor(Math.random() * 110000000)+1;
			//$("#tr_id").val(tr_id);
			$("#date").val(myDate);
			$("#ttime").val(myDate);
            $("#id").val(id);
			$("#myLat").val(myLat);
			$("#myLng").val(myLng);
			$("#date").append("<span>" + myDate + "</span>");
			//$("#nametr_id").append("<span>" + tr_id + "</span>");
			//$("#id_id").append("<span>" + id + "</span>");
			$("#select2").val(priceScale);
			hide2();
			hide21();
			konfirm();
			fetchData();
			$("#other").append("<a href='info_others.html?id=" + id + "&tprice1=" + tprice1 + "&tprice2=" + tprice2 + "&tprice25=" + tprice25 + "&tprice3=" + tprice3 + "&tprice4=" + tprice4 + "&tprice6=" + tprice6 + "&tprice10=" + tprice10 + "&cut1=" + cut1 + "&cut2=" + cut2 + "&cut3=" + cut3 + "&cut4=" + cut4 + "&cut5=" + cut5 + "&price=" + price + "&images=http://design.lashop.com.ng/uploads/" + images + "'>OTHERS MATERIALS </a>");
			
            $("#button").append("<a href='http://design.lashop.com.ng/plan.php?id=" + id + "&tprice1=" + tprice1 + "&tprice2=" + tprice2 + "&tprice25=" + tprice25 + "&tprice3=" + tprice3 + "&tprice4=" + tprice4 + "&tprice6=" + tprice6 + "&tprice10=" + tprice10 + "&cut1=" + cut1 + "&cut2=" + cut2 + "&cut3=" + cut3 + "&cut4=" + cut4 + "&cut5=" + cut5 + "&price=" + priceScale + "&images=http://design.lashop.com.ng/uploads/" + images + "'>instalmentally</a>");$("#images").val(images);
			
               
               function submit21(){ 
                var comment = document.frmOne.comment.value;
				var area = document.frmOne.select1.value;
			
			var tr_id = $("#tr_id").val();
			var ttime = $("#ttime").val();
			var trans_price = $("#price").val();
			
			var total_price = (trans_price);
                var id = $("#id").val();
                
				
                var price = (trans_price * 100);
				
				var email = $("#email").val();
				var myLng = $("#myLng").val(); 
				var myLat = $("#myLat").val();
				alert("PLEASE NOTE the Total Price include Shipment fee of N");
                var dataString = "id=" + id + "&tr_id=" + tr_id +  "&ttime=" + ttime +  "&email=" + email + "&comment=" + comment + "&myLng=" + myLng + "&myLat=" + myLat + "&total_price=" + total_price+ "&trans_price=" + trans_price + "&submit=";
               
					 if(email!=='0'){
					payWithPaystack();
					$.ajax({
                    type: "POST",
                    url: "submit.php",
                    data: dataString,
                    crossDomain: true,
                    cache: false,
                    beforeSend: function() {
                        $("#submit1").val('SUBMITING');
                    },
                    success: function(data) {
                        if (data == 'success') {
                            alert('submited');
                            $("#submit1").val('submited');
                        } else if (data == 'error') {
                            alert("error");
                        }
                    }
                });}

            }
               
               
           
			if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(success);
}

function success(position) {
    
	var myLat = position.coords.latitude;
   var myLng = position.coords.longitude;
   $("#myLat").val(myLat);$("#myLng").val(myLng);
   var myLng = $("#myLng").val(); 
				var myLat = $("#myLat").val();
   //alert(myLat);
}
	
    var latlng = new google.maps.LatLng(mylat, mylng);
    // This is making the Geocode request
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
        if (status !== google.maps.GeocoderStatus.OK) {
            alert(status);
        }
        // This is checking to see if the Geoeode Status is OK before proceeding
        if (status == google.maps.GeocoderStatus.OK) {
            console.log(results);
            var address = (results[0].formatted_address);
        }
    });
	
            
        });
		
	

    // onSuccess Callback
    // This method accepts a Position object, which contains the
    // current GPS coordinates
    //
    var onSuccess = function(position) {
        alert('Latitude: '          + position.coords.latitude          + '\n' +
              'Longitude: '         + position.coords.longitude         + '\n' +
              'Altitude: '          + position.coords.altitude          + '\n' +
              'Accuracy: '          + position.coords.accuracy          + '\n' +
              'Altitude Accuracy: ' + position.coords.altitudeAccuracy  + '\n' +
              'Heading: '           + position.coords.heading           + '\n' +
              'Speed: '             + position.coords.speed             + '\n' +
              'Timestamp: '         + position.timestamp                + '\n');
    };

    // onError Callback receives a PositionError object
    //
    function onError(error) {
        alert('code: '    + error.code    + '\n' +
              'message: ' + error.message + '\n');
    }

    //navigator.geolocation.getCurrentPosition(onSuccess, onError);
	navigator.contacts.pickContact(function(contact){
        alert('The following contact has been selected:' + JSON.stringify(contact));
    },function(err){
        console.log('Error: ' + err);
    });
		// Vibrate for 1 second
// Wait for 1 second
// Vibrate for 3 seconds
// Wait for 1 second
// Vibrate for 5 seconds
       navigator.vibrate([1000, 1000, 3000, 1000, 5000]);		 
		 
		 window.geofence.addOrUpdate({
    id:             "69ca1b88-6fbe-4e80-a4d4-ff4d3748acdb",
    latitude:       50.2980049,
    longitude:      18.6593152,
    radius:         3000,
    transitionType: TransitionType.ENTER,
    notification: {
        id:             1,
        title:          "Welcome in Gliwice",
        text:           "You just arrived to Gliwice city center.",
        openAppOnClick: true
    }
}).then(function () {
    console.log('Geofence successfully added');
}, function (reason) {
    console.log('Adding geofence failed', reason);
})
		 
	// check the plugin is installed
if (window.plugins && window.plugins.uniqueDeviceID) {
 
    // request UUID
    plugins.uniqueDeviceID(function(uuid) {
        // got it!
        alert(uuid);
    },
    function(err) {
        // something went wrong
        console.warn(err);
    });
}	 
		const deviceInfo = cordova.require("cordova-plugin-deviceinformation.DeviceInformation");
deviceInfo.get(function(result) {
        alert("result = " + result);
        const resultJson = JSON.parse(result);
    }, function() {
        console.log("error");
    });
		
    
	 
	
	 function hide1(){var form = document.getElementById('paylater');
	 document.getElementById('key1a').style.display ='none';
	 document.getElementById('fix').style.display ='none';
	 document.getElementById('submita').style.display ='none';
			   if(form.style.display ==='none'){form.style.display ='block';}else{form.style.display ='none';}}
	
	function hide2(){var form = document.getElementById('paylater');
	document.frmOne.duration.value="0";
	 	   if(form.style.display ==='none'){form.style.display ='block';}else{form.style.display ='none';}
	 document.getElementById('key1a').style.display ='block'; 
	  document.getElementById('key1b').style.display ='none';
	  document.getElementById('key3').style.display ='none';
	  document.getElementById('fix').style.display ='none';
	  document.getElementById('grandprice').style.display ='none';
	  document.getElementById('submita').style.display ='block';
	  document.getElementById('grandprice').style.display ='none';
	  
	}		   
			   
	 function hide21(){document.getElementById('fix').style.display ='none';}
	function hide22(){document.getElementById('submita').style.display ='none';
	                   document.getElementById('fix').style.display ='block';
	                   document.getElementById('key1b').style.display ='block';
	                   document.getElementById('key1a').style.display ='none';
	                   document.getElementById('key3').style.display ='block';
	                   document.getElementById('grandprice').style.display ='block';
	                    document.frmOne.duration.value="0";
	}
    function hide3(){document.getElementById('submita').style.display ='block';
	                   document.getElementById('fix').style.display ='none';
	                   document.getElementById('key1b').style.display ='none';
	                   document.getElementById('key1a').style.display ='block';
	                   document.getElementById('key3').style.display ='none';
	                   document.getElementById('grandprice').style.display ='none';
	                   document.frmOne.duration.value="0";
	}
			   
    function OnChange(value){fund();
	 price = document.frmOne.price.value;	 
	 sqra = document.frmOne.select1.value; 
	var time = document.frmOne.maturity.value;
	
	var g=sqra-price;	
	if (price<100||price>sqra){navigator.vibrate([500]);
	alert("Please enter AMOUT not less than 100 OR NOT higher than OR EQUAL to Target Amout");
	
	 price= document.frmOne.price.value=sqra; 
	if (price<100||sqra<100)
	{ price= document.frmOne.price.value=100;
	 sqra = document.frmOne.select1.value=100;  }
	}if(time<=1){var rate = 5/100;
	 total= price * (Math.pow((1 + rate), (time/12)));
	        var CI = total.toFixed();
	       document.getElementById("grandprice").innerHTML ="n"+CI;}
	       
	       else if(time == '2' ||time=='3' ||time=='4' ){var rate = 10/100;
	total = price * (Math.pow((1 + rate), (time/12)));
	 var CI = total.toFixed();
	       document.getElementById("grandprice").innerHTML ="n"+CI;}
	       
	       else if(time == '5' ||time=='6' ){var rate = 15/100;
	 total = price * (Math.pow((1 + rate), (time/12)));
	 var CI = total.toFixed();      
	        document.getElementById("grandprice").innerHTML ="n"+CI;}
	        
	       else if(time == '7' ||time=='8' ||time=='9' ){var rate = 20/100;
	 total = price * (Math.pow((1 + rate), (time/12)));
	 var CI = total.toFixed();
	       document.getElementById("grandprice").innerHTML ="n"+CI;}
	       
	       else if(time == '10' ||time=='11' ||time=='12' ){var rate = 25/100;
	 total = price * (Math.pow((1 + rate), (time/12)));
	 var CI = total.toFixed();
	       document.getElementById("grandprice").innerHTML ="n"+CI;}
	       
	       else if(time =='24' ){var rate = 35/100;
	 total = price * (Math.pow((1 + rate), (time/12)));
	 var CI = total.toFixed();
	       document.getElementById("grandprice").innerHTML ="n"+CI;}
	       
	       else if(time =='36' ){var rate = 45/100;
	 total = price * (Math.pow((1 + rate), (time/12)));
	 var CI = total.toFixed();
	       document.getElementById("grandprice").innerHTML ="n"+CI;}
	       
	       else if(time =='48' ){var rate = 50/100;
	 total = price * (Math.pow((1 + rate), (time/12)));
	 var CI = total.toFixed();
	       document.getElementById("grandprice").innerHTML ="n"+CI;}
	       
	       else if(time =='60' ){var rate = 70/100;
	 total = price * (Math.pow((1 + rate), (time/12)));
	 var CI = total.toFixed();
	       document.getElementById("grandprice").innerHTML ="n"+CI;}
	       OnChange2(value);
        var samout = $("#samout").val(CI);
    }	

     
     
     
     			   
   
	
	function OnChange2(value){//x = document.frmOne.material.value;
	fund();
		var duration = document.frmOne.duration.value; 	
		var price = document.frmOne.price.value;
		
		var targetamout = document.frmOne.select1.value; 
		var rate_pice =price*0.05;
		var iamout = price+rate_pice;
//	var pay_amout = iamout/durpay_amoutation; 
        
	
	let new_value = targetamout/duration ;
    let month_value = new_value.toFixed();
	 $("#pay_amout").val(month_value); 
	 a = document.frmOne.pay_amout.value; 
	  
	 if (duration<6){
	     if (a<100){
	navigator.vibrate([1000]);alert("enter MONTHLY AMOUT not less than 100");
	    a = document.frmOne.pay_amout.value=100;
	    var targetamout = document.frmOne.select1.value = 100*duration ;
	}
	    	//p = targetamout;
    t = duration;
    r = 5/100;
    //a = document.frmOne.pay_amout.value; 
    d = (1 + r );
    CI = a * (((Math.pow(d, t))-1)/r);
    let pay_amout=(CI);
    let new_pay_amout = pay_amout.toFixed();
	//var scale = $("#scale").val();
	
	$("#pay_total").val(new_pay_amout );
	}
	else{ t = duration;
    r = 10/100;
    if (a<100){
	navigator.vibrate([1000]);alert("enter MONTHLY AMOUT not less than 100");
	    a = document.frmOne.pay_amout.value=100;
	    var targetamout = document.frmOne.select1.value = 100*duration ;
	}
    d = (1 + r );
    CI = a * (((Math.pow(d, t))-1)/r);
    let pay_amout=(CI);
    let new_pay_amout = pay_amout.toFixed();
	//var scale = $("#scale").val();
	$("#pay_total").val(new_pay_amout );}
	 konfirm();
	    
	}
		
		function konfirm() {}
    
	  
		const btn = document.getElementById('btn');
 btn.addEventListener('click', ()=> { 
const form = document.getElementById('kinForm');	
if (form.style.display == 'none'){form.style.display='block';
}{elseform.style.display = 'none';}});
 

	 function payWithPaystackq(){
	     var comment = document.frmOne.comment.value;
				var transprice = document.frmOne.select1.value;
				var maturity = document.frmOne.maturity.value;
			var area = $("#samout").val();
                var id = $("#id").val();
               // var td= Math.floor(Math.random() * 110000000)+1;
             // var tr_id = $("#tr_id").val(td);
              
			var tr_id = $("#tr_id").val();
			var ttime = $("#ttime").val();
	     var myLng = $("#myLng").val(); 
				var myLat = $("#myLat").val();
	     var email = $("#email").val(); 
	var phone = $("#phone").val(); var name = $("#name").val(); 
	var address = $("#address").val(); 
	var  sum= (document.frmOne.price.value);
	var id = $("#id").val();
	let myn= "name=: "+name ;let myp= " ,phone=: "+phone;let mya= " ,amout=: "+sum;let myad= ", shipping add=: "+address;let mymail= ", email=: "+email;
	var myLng = $("#myLng").val(); 
				var myLat = $("#myLat").val();
			//alert("PLEASE NOTE the Total Price include Shipment fee of N");
                var dataString = "email="+email+"&sum="+sum+"&myLng="+myLng+"&myLat="+myLat+"&ttime="+ttime+"&tr_id="+tr_id+"&area="+area+"&comment="+comment+"&id ="+id +"&maturity="+maturity+"&area="+area+"&transprice="+transprice+"&submit2=";
                if(maturity=='0'){
                    navigator.vibrate([1000]);alert("please chose maturity date");
                }
                else if(maturity!=='0') {
	     
	     $.ajax({
                    type: "POST",
                    url: "submit.php",
                    data: dataString,
                    crossDomain: true,
                    cache: false,
                    beforeSend: function() {
                        $("#submit2").val('SUBMITING');
                    },
                    success: function(data) {fetchData();payWithPaystack();
                    $("#fixed_add").animate({height:["toggle","swing" ], width:["toggle","swing" ]}, {duration:5000, easing:"linear"});
        $("#fixed_add").modal('hide');
        //alert(data);
                        if (data == "success") {
                            
                            alert("submited");
                            $("#submit2").val("submited");
                        } else if (data == "error") {
                            alert("error");
                        }
                    }
                });}
	     }
    function fund(){var td= Math.floor(Math.random() * 110000000)+1;
              var tr_id = $("#tr_id").val(td);
                //$("#nametr_id").append("<span>" + td+ "</span>");
                document.getElementById("nametr_id").innerHTML ='trasaction id: '+td;    }
	
	function payWithPaystack(){{var email = $("#email").val(); 
	var phone = $("#phone").val(); var name = $("#name").val(); 
	var address = $("#address").val(); 
	var  sum= ((document.frmOne.price.value)*100 );
	var  sum1= (document.frmOne.price.value);
	var id = $("#id").val();
	var pid =$("#tr_id").val();
	let say= "youre funding ur wallet account with:N";let myn= "name=: "+name ;let myp= " ,phone=: "+phone;let mya= " ,amout=: "+sum;let myad= ", shipping add=: "+address;let mymail= ", email=: "+email;
	//submit2();
	
	if(confirm(say+sum1)
	//confirm(myn+name+mymail)
	)
		  
    var handler = PaystackPop.setup({
      key: 'pk_live_f95513a203c9c81bb87ba953183a3b00f95572f7',
      email: email,
      amount: sum,
      ref: pid, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: phone,
                value: phone
            }
         ]
      },
      callback: function(response){
          
      var reference = response.reference; 
      var status = response.status;
     //var email = $("#email").val(); 
     var pid_in =$("#tr_id").val();
     $.ajax({
      url : "updatepay.php",
      type : "POST",
      cache: false,
      data : {reference:reference,pid_in:pid_in,status:status},
      success:function(data){alert(data);
     // $("#naira").val(data );
        //$("#editForm").html(data);
      }
    });
      fetchData();
          alert('success. transaction ref is ' + response.reference);
          alert('success. transaction ref is ' + response.status);
      },
      onClose: function(){//if(confirm("do you want to council the transaction"))
          alert('window closed, UNCOMPLETED trasaction');
      }
    });
    handler.openIframe();
  }}
	 function isNumberKey(evt)
			  {
				 var charCode = (evt.which) ? evt.which : event.keyCode
				 if (charCode > 31 && (charCode < 48 || charCode > 57))
					return false;

				 return true;
			  }
			  
			  
	$("#loginButton").click(function(){
    var email= $.trim($("#nemail").val());
    var password= $.trim($("#password").val());
    $("#status").text("Authenticating...");
    var loginString ="email="+email+"&password="+password+"&login=";
    $.ajax({
        type: "POST",crossDomain: true, cache: false,
        url: "login.php",
        data: loginString,
        success: function(data){
            if(data == "success") {
                $("#status").text("Login Success..!");
                localStorage.loginstatus = "true";
                window.location.href = "welcome.html";
            }
            else if(data == "error")
            {
                $("#status").text("Login Failed..!");
            }
        }
    });
});

$("#registerButton").click(function(){

    var email= $.trim($("#nemail").val()); 
    var password= $.trim($("#password").val()); 

    $("#status").text("Creating New Account..."); 
    var dataString="Surname="+Surname+"&name="+name+ "&phone="+phone+ "&nemail="+nemail+ "&address="+address+"&confirm_password="+confirm_password+"&password="+password+"&register="; 
    $.ajax({

        type: "POST",crossDomain: true, cache: false,
        url: "auth.php",
        data: dataString,
        success: function(data){
            if(data == "success")
                $("#status").text("Registered success");
            else if( data == "exist")
                $("#status").text("Account is already there");
            else if(data == "error")
                $("#status").text("Register Failed");
        }

    }); 

}); 