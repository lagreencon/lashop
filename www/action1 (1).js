        $(document).ready(function() {
			$("#gall").append("<select style='z-index:5;'  name='items' id='items' onchange='OnChange(this.value) '><option  value='0'>0-50</option><option id ='1'  value='10'>51-100</option><option  id ='2' value='20'>101-150 </option><option id ='3' value='30'>151-200</option><option id ='4'  value='40'>201-250</option><option  id ='5' value='50'>251-300 </option></option><option  id ='6' value='60'>301-450 </option></select>");

						
		
		
        	 OnChange();});
			 
 
  function OnChange(value){var url = "http://design.lashop.com.ng/fetch_Data2.php";
	var x = $("#items").val();
			
	$.getJSON(url,{x:x,y:10}, function(result) {
                console.log(result);
                $.each(result, function(i, field) {
                    var id = field.id;
					var d3 = field.d3;
                    var images = field.images;
                    var price = field.price;
					var tprice1 = field.tprice1;
					var tprice2 = field.tprice2;
					var tprice25 = field.tprice25;
					var tprice3 = field.tprice3;
					var tprice4 = field.tprice4;
					var tprice6 = field.tprice6;
					var tprice10 = field.tprice10;
					var cut1 = field.cut1;
					var cut2 = field.cut2;
					var cut3  = field.cut3;
					var cut4  = field.cut4;
					var cut5  = field.cut5;

                    $("#gallery").append(

						"<a href='info.html?id=" + id + "&tprice1=" + tprice1 + "&tprice2=" + tprice2 + "&tprice25=" + tprice25 + "&tprice3=" + tprice3 + "&tprice4=" + tprice4 + "&tprice6=" + tprice6 + "&tprice10=" + tprice10 + "&cut1=" + cut1 + "&cut2=" + cut2 + "&cut3=" + cut3 + "&cut4=" + cut4 +"&cut4=" + cut4 + "&cut5=" + cut5 + "&price=" + price + "&d3=http://design.lashop.com.ng/uploads/" + d3 + "&images=http://design.lashop.com.ng/uploads/" + images + "'><div class='grid-photo' ><li><div  style='text-align:center;' class='grid-photo-box' width='150' height='30%'>LD-" + id + "<img src='http://design.lashop.com.ng/uploads/"+ images + "'   > <div class='bottom-right' style='text-align:center;text-heght:5%;'><span>&#8358;</span>" + tprice3 + "/m<span>&#178;</span></div></img></div><button class='bottom-left'>Cart</button></a><div style='position:absolute;bottom:8px;left:40%;'><a href='info1.html?id=" + id + "&images=http://design.lashop.com.ng/uploads/" + d3 + "' >3D_VIEW </a></div></li></div>");
                });
            });setInterval(OnChange1(), 5000); }
			
	
			
   function OnChange1(){
   window.scrollTo({ left: 0, top: document.body.scrollHeight- document.documentElement.clientHeight, behavior: "smooth" });
   }