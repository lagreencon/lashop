<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>


<?php

	// Database connection 
	 session_start(); 
	require_once('connection.php');

	if (isset($_POST['editId'])) {
	    $editId = $_POST['editId'];
	}

	if (!empty($editId)) {
		
	    $query  = "SELECT * FROM table_images WHERE id = $editId";

	    $result = mysqli_query($con, $query);

	if (mysqli_num_rows($result) > 0) {
				
	    $output = "";
				
	    while($row = mysqli_fetch_assoc($result)) {

	    $image = 'uploads/'.$row['images'];
		$video = 'uploads/'.$row['video'];
		$D3 = 'uploads/'.$row['3d'];
			$time =rand(time(),2354);
	    $output.="<div style='background-color:pink;opacity:1.0;'><form id='editForm'>
			<div   style='height: relative; '>
		            <div class='form-group'><input type='hidden' name='imageid' id='imageid' value='".$row['id']."'/>
					<label class='custom-file-label' >Your Trasaction ID:  ".$time."</label>
				  
				 <div class='custom-file mb-3'>
				   <label class='custom-file-label' >Product ID:  LD-".$row['id']."</label>
				   <input type='hidden' name='file_name' id='file_name' value='".$image."'/>
				   <input type='hidden' name='transid' id='transid' value='".$time."'/>
				   <div><img src='".$image."' width='98%' height='100%'/></div>
				   <li align='center' backgroundcolor='blue'  ><button type='button' class='btn btn-default btn-sm' data-toggle='modal' href='#exampleModal1'>video_view</button><button type='button' class='btn btn-default btn-sm' data-toggle='modal' href='#exampleModal1a'>3D_view</button>
				   <button type='button' class='btn btn-default btn-sm' data-toggle='modal' href='#exampleModal2'>VReality_view</button>
				   <button type='button' class='btn btn-default btn-sm' data-toggle='modal' href='#exampleModal3'>AuReality_view</button></li>
				   </div>
				   <div><li id='li-one'  align='left'>
				   <p id='li-one-para'>
				   <input type='' placeholder='Your Name' name='name' required='' /> 
				   <input type='' placeholder='Phone No' name='phone' required=''/>
				   <input type='' placeholder='E-mail No' name='email' required=''/>
				   <input type='hidden' name='imageid' id='imageid' value='".$row['id']."'/>
				   <input type='hidden' name='image' id='imageid' value='".$image."'/></br>
				   
				   <label>Thickness</label><select name='thickness'><option value='1.2'>1.2mm-1.8mm</option><option value='2'>2mm</option><option value='2.5'>2.5mm</option><option value='3'>3mm</option><option value='4'>4mm-5mm</option><option value='6'>6mm-9mm</option><option value='10'>10mm-16mm</option><option value='18'>18mm-25mm</option><option value='30'>30mm</option><option value='0.5'>0.5mm-1mm</option></select>                           
				   <label>colour </label><input type='color' placeholder='blue' name='area' /></br>
				   <label>material</label><select name='material' ><option data-thumbnail='uploads/1613342340.jpeg' value='iron-metals'><img src='uploads/1613342691.bmp'>iron_metal</option><option data-thumbnail='uploads/1613342340.jpeg' value='aluco-boards'><img src='uploads/1613342691.bmp'>aluco-boards</option><option value='stainless'>stainless</option><option value='fibre_glass'>fibre_glass</option><option value='rubber'>rubber</option><option value='leather-fabric'>leather-fabric</option><option value='others'>othrs</option></select>
				   </br><textarea style='width:260px;  hieght:70px;' type='text' placeholder='comment' name='comment'  />
				   <input type='file' name='file' id='file' accept='image/*' />
				   </p>
				   </li></div>
			 </div>
			 <div class='modal-footer'>
			   <a href='https://wa.me/+2348074651451?text=I_am_interested_in_this_item:--LD-".$row['id']."(_thickness?____material?____SQM?____)'><label class='img-thumbnail' >Whatsap_Us<img src='whatsapp.png' width='30px' height='30px' /></a></label>
			   <button type='submit' class='btn btn-success' >Submit</button>
			   <button type='button' class='btn btn-danger btn-sm' data-dismiss='modal'>Close</button>
			   <div class='col-md-6' align='right'>
       
			</div>
			 </div>
			 <div class='modal-header'>
			 </div>
			
			
		<div class='modal fade' tabindex='-1' id='exampleModal1' align='center'>
			<div class='modal-content'>
			<div class='modal-header'>
				<h4 class='modal-title'>video</h4>
				
				</div>
			   <div class='modal-body'>
			   <div><video controls preload='metadata' poster='' src='".$video."' width='80%' height='80%'></video></div>
			   </div>
				<div class='modal-footer'>
			  
			 </div></div>
		</div>
		
		<div class='modal fade' tabindex='-1' id='exampleModal1a' data-focus-on='input:first' align='center'>
		<div class='modal-content'>
			<div class='modal-header'>
				<h4 class='modal-title'>3D_view</h4>
				
				</div>
			   <div class='modal-body'>
			   <model-viewer id='reveal' loading='eager' camera-controls auto-rotate poster='src/loading.gif' src='".$D3."'  alt='A 3D model' ></model-viewer>
			   </div>
				<div class='modal-footer'>
			  
			 </div></div>
		</div>
			

		<div class='modal fade' tabindex='-1' id='exampleModal2' data-focus-on='input:first' style='display:none;'  align='center'>
		<div class='modal-content'>
			<div class='modal-header'>
				
				<h4 class='modal-title'>VReality_view</h4>
				</div>
			   <div class='modal-body'>
			   <div><iframe controls  src='A-Frame-Examples-master/model.html' width='80%' height='80%'></iframe></div>
			   </div>
				<div class='modal-footer'>
			  
			 </div></div>
		</div> 
			 
			 <div class='modal fade' tabindex='-1' id='exampleModal3' align='center'>
			<div class='modal-content'> 
			<div class='modal-header'>
				<h4 class='modal-title'>AuReality_view</h4>
				
				</div>
			   <div class='modal-body'>
			   <div><iframe controls  src='AR-Examples-master/model.html' width='80%' height='80%'></iframe></div>
			   </div>
				<div class='modal-footer'>
			  
			 </div></div>
		</div> 
		
		<div class='modal fade' tabindex='-1' id='exampleModal4' align='center'>
		<div class='modal-content'>
			<div class='modal-header'>
				<h4 class='modal-title'>video</h4>
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				</div>
			   <div class='modal-body'>
			   <div><input type='' placeholder='your name' name='image_id' id='image_id' /></div>
			   <div><input type='' placeholder='your name' name='image_id' id='image_id' /></div>
			   <div><input type='' placeholder='your name' name='image_id' id='image_id' /></div>
			   <div><input type='' placeholder='your name' name='image_id' id='image_id' /></div>
			   </div>
				<div class='modal-footer'>
				<button type='submit' class='btn btn-success'>submit</button>
			  <button type='button' class='btn btn-danger btn-sm' data-dismiss='modal'>Close</button>
			 </div></div>
		</div> 
			 
		    </form><label class='custom-file-label' >Your Trasaction ID-".$time."</label></div>";
		}
	    echo $output;
		
			copy($video, 'uploads1/me.mp4' );copy($image, 'uploads1/me.bmp' );copy($D3, 'uploads1/me.gltf' );
	}else{
		echo "<h3 style='text-align:center'>No file found</h3>";}
}

?><button type='button' class='btn btn-danger btn-sm' data-dismiss='modal'>Close</button>
<script type="text/javascript" language="Javascript">
	var sum=0;
	lenght = document.frmOne.lenght.value;
	document.frmOne.txtDisplay.value = price;
    function OnChange(value){
		
		price = document.frmOne.select1.value;
		quantity = document.frmOne.breadth.value;
        sum = lenght * quantity;
		
		document.frmOne.txtDisplay.value = sum;
    }
</script>
<SCRIPT language=Javascript>
			  <!--
			  function isNumberKey(evt)
			  {
				 var charCode = (evt.which) ? evt.which : event.keyCode
				 if (charCode > 31 && (charCode < 48 || charCode > 57))
					return false;

				 return true;
			  }
			  //-->
		</SCRIPT>
		
		
		
		<div class='modal fade' tabindex="-1" id='exampleModa2'  >
    <div class='modal-dialog'>
      <div class='modal-content' style='background-color:#428F6A;opacity:2;'>
        <div class='modal-header'>
          <h4 class='modal-images'>ENTER YOUR DETAILS</h4>
		  <label id="date"></label>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
		<div class='modal-body'>
        <div id="editForm">
 <form NAME = "frmOne"  >
		<div id="whatsap"></div>
		<script src="https://js.paystack.co/v1/inline.js"></script>
		<div class="item-inner">
		<input type="text" id="id" /><input type="text" id="myLng" /><input type="text" id="myLat" value=""/>
		<span style="font-size:11px; width:120px; font-family:Arial, Helvetica, sans-serif; text-align:left; line-height:17px;color:#000000;">TOTAL SUARE AREA : </span>
		 <INPUT TYPE = "number" name = "select1" size = "35" value ="" onchange="OnChange(this.value)" onKeyPress="return isNumberKey(event)" >
	
    <br></br> 
    <span style="font-size:11px; font-family:Arial, Helvetica, sans-serif; text-align:left; line-height:17px;color:#000000;">PRICE/SQ-METER : </span><br></br>
	<input type="text" value ="" name="select3" id="select3"  style="width:120px;" readonly />
	
	 <span style="color:#B80000; font-size:16px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">=N= </span>
    <INPUT TYPE = "Text" name = "price" id="price" size = "35" value ="" style="border:#999999 solid 1px; background-color:#FFF; width:100px; height:20px;" readonly />
            <div class="item-title item-label">Name</div>
            <div class="item-input-wrap">
              <input type="text" placeholder="Your name" id="name" value="" >
              <span class="input-clear-button"></span>
            </div>
			<div class="item-title item-label">Phone Number</div>
            <div class="item-input-wrap">
              <input type="number" placeholder="Your Phone Number" id="phone" name="phone"  value="" onKeyPress="return isNumberKey(event)" />
              <span class="input-clear-button"></span>
            </div>
			<div class="item-title item-label">E-Mail</div>
            <div class="item-input-wrap">
              <input type="email" placeholder="Your@email.com" id="email" name = "email"   value="" ></div></br>
                                        
				  <div class="item-title item-label"> Cutting</div>
				  <select style='foreground-color:#428F6A;opacity:2;width:90%;hieght:70px;' name='material'onchange="OnChange1(this.value) " onKeyPress="return isNumberKey(event)"  ><option data-thumbnail='img/logo.PNG' value='1'><img src='uploads/1613342691.bmp'>ROUTER</option><option data-thumbnail='uploads/1613342340.jpeg' value='2'><img src='uploads/1613342691.bmp'>LASER</option></select>
				   </br></br>
            <div class="item-title item-label">File</div>
			<input type='file' name='file' id='file' accept='image/*' />
			</br>
            <div class="item-title item-label">Comment</div>
			<input type='textarea' style='background-color:white;text-color:black;opacity:2;'  placeholder='comment' name='comment'  />
            <div class="item-input-wrap">
			
          </div>
		 <span class="input-clear-button"></span>
		 <script src="https://js.paystack.co/v1/inline.js"></script>
			<script src="https://checkout.flutterwave.com/v3.js">
			</script><a><span></span><span></span><input type="button" style='background-color:seagreen;opacity:2;' id="submit" class="button button-block" value="SUBMIT" /><span></span></a> <a><span></span><span></span><span></span><span></span><button type="button" onClick = "payWithPaystack()" >Pay Now</button><br><button type="button" onClick = "makePayment1()" >Pay Now instalmentally</button><span></span></a><button type='button' class='btn btn-danger btn-sm' data-dismiss='modal'>Close</button> 
  
        </div>
		
		
      </form>   
    </div></div></div></div>

	
	</div>