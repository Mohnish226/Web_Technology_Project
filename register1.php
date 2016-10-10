<?php
session_start();
?>
<?php 
if($_SESSION['login']==0) {
    header("Location: https://localhost/te-wt/signup.html");
}
else{
	// header("Location: https://localhost/te-wt/register.php");
}?>
<!DOCTYPE html>
<html>
<head>              
  	<title>Register</title>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<!-- Mobile support -->
  	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<!-- Bootstrap -->
  	<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">
	<!-- Fonts-->
  	<link href="./css/font-awesome.min.reg.css" rel="stylesheet" type="text/css"
  	<!-- Bootstrap Material Design -->
  	<link href="./css/bootstrap-material-design.css" rel="stylesheet" type="text/css">
  	<link href="./css/ripples.min.css" rel="stylesheet" type="text/css">
  	<link href="./css/fileinput.css" rel="stylesheet" type="text/css">
  	<link href="./css/fileinput.min.css" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

</head>
<body onload="return yearselector()">
	<div class="container">
			<h1>Seller Form</br><small>Please Fill Out All The Fields</small></h1>
			<ul class="nav nav-tabs nav-justified" role="tablist">
  				<li role="presentation" class="active"><a href="#cars" data-toggle="tab" role="tab"><i class="material-icons" style="font-size: 36px;color:Green">directions_car</i></a>
  				</li>
  				<li role="presentation"><a href="#bikes" data-toggle="tab" role="tab"><i class="material-icons" style="font-size: 36px;color: Green">motorcycle</i></a></li>
			</ul>
			<div id="mytabcontent" class="tab-content">
  				<div role="tabpanel" class="tab-pane fade in active" id="cars">	
					<form class="form-horizontal" action="http://localhost/te-wt/php/car-registration.php" method="post" id="carform" enctype="multipart/form-data">
      					<fieldset></br>
							<!--Company For Cars -->
	 						<div class="form-group">
      							<label for="selectcar"><i class="material-icons">build</i>  Car Company :</label>
        						<select id="selectcar" class="form-control" name="selectcar" onchange="return company_change()">
	  								<option value=" ">--Select Car Company--</option>
									<option value="1">Ashok Leyland</option>
									<option value="2">Audi</option>
									<option value="3">BMW</option>
									<option value="4">Chevrolet</option>
									<option value="5">Datsun</option>
									<option value="6">Dodge</option>
									<option value="7">Fiat</option>
									<option value="8">Force Motors</option>
									<option value="9">Ford</option>
									<option value="10">Hindustan Motors</option>
									<option value="11">Honda</option>
									<option value="12">Hummer</option>
									<option value="13">Hyundai</option>
									<option value="14">Isuzu</option>
									<option value="15">Jaguar</option>
									<option value="16">Jeep</option>
									<option value="17">Lamborghini</option>
									<option value="18">Land Rover</option>
									<option value="19">Mahindra</option>
									<option value="20">Mahindra-Renault</option>
									<option value="21">Maruti Suzuki</option>
									<option value="22">Mercedes-Benz</option>
									<option value="23">Mitsubishi</option>
									<option value="24">Nissan</option>
									<option value="25">Peugeot</option>
									<option value="26">Porsche</option>
									<option value="27">Premier</option>				
									<option value="28">Renault</option>
									<option value="29">Rolls-Royce</option>
									<option value="30">Skoda</option>
									<option value="31">Tata</option>
									<option value="32">Toyota</option>
									<option value="33">Volkswagen</option>
									<option value="34">Volvo</option>
								</select>
      						</div>
      						<input type="hidden" name="company" id="company">
    						<div class="form-group">
  								<label for="model"><i class="material-icons">assignment</i>  Car Model & Version:</label>
  								<input class="form-control" id="model" name="model" type="text" required>
							</div>
 							<div class="form-group">
      							<label for="fuel"><i class="material-icons">local_gas_station</i>  Fuel Options :</label>
							    <select id="fuel" class="form-control" name="fuel" onchange="return fuel_change()">
							        <option value=" ">--Select--</option>
							        <option value="petrol">Petrol Only</option>
							        <option value="diesel">Diesel</option>
							        <option value="other">Other (CNG)</option>
							    </select>
							</div>
							<input type="hidden" name="fuelh" id="fuelh">
  							<div class="form-group">  
  								<label for="year"><i class="material-icons">date_range</i>  Make Year:</label>
       								 <select id="year" class="form-control" name="year"></select>
							</div>
    						<div class="form-group">
  								<label for="kms"><i class="material-icons">traffic</i>  Kilometers Driven:</label>
  								<input class="form-control" id="kms" name="kms" type="number" required>
							</div>
							<div class="form-group">
      							<label for="selectstate"><i class="material-icons">my_location</i>  State :</label>
        						<select id="selectstate" class="form-control" name="selectstate" onchange="return state_change()">
        							<option value=" ">--Select State--</option>
									<option value="1">Andaman Nicobar</option>
									<option value="2">Andhra Pradesh</option>
									<option value="3">Arunachal Pradesh</option>
									<option value="4">Assam</option>
									<option value="5">Bihar</option>
									<option value="6">Chandigarh</option>
									<option value="7">Chhattisgarh</option>
									<option value="8">Daman &amp; Diu</option>
									<option value="9">Delhi</option>
									<option value="10">Goa</option>
									<option value="11">Gujarat</option>
									<option value="12">Haryana</option>
									<option value="13">Himachal Pradesh</option>
									<option value="14">Jammu &amp; Kashmir</option>
									<option value="15">Jharkhand</option>
									<option value="16">Karnataka</option>
									<option value="17">Kerala</option>
									<option value="18">Madhya Pradesh</option>
									<option value="19">Maharashtra</option>
									<option value="20">Manipur</option>
									<option value="21">Meghalaya</option>
									<option value="22">Mizoram</option>
									<option value="23">Nagaland</option>
									<option value="24">Orissa</option>
									<option value="25">Pondicherry</option>
									<option value="26">Punjab</option>
									<option value="27">Rajasthan</option>
									<option value="28">Sikkim</option>
									<option value="29">Tamil Nadu</option>
									<option value="30">Telangana</option>
									<option value="31">Tripura</option>
									<option value="32">Uttar Pradesh</option>
									<option value="33">Uttaranchal</option>
									<option value="34">Uttrakhand</option>
									<option value="35">West Bengal</option>
								</select>
    						</div>
    						<input type="hidden" name="stateh" id="stateh">
							<div class="form-group">
  								<label for="city"><i class="material-icons">place</i>  City:</label>
								<input class="form-control" id="city" name="city" type="text" required>
							</div>
							<div class="form-group">
							  <label for="price"><i class="material-icons">local_atm</i>  Expected Price:</label>
							  <input class="form-control" name="price" id="price" type="number" required>
							</div>
						    <div class="form-group">
						    	<label for="details"><i class="material-icons">insert_comment</i>  Car Details:</label>
						    	<textarea class="form-control" name="details" rows="4" id="details" placeholder="Enter Car Details Here" required></textarea>
						    </div>
						    <div class="form-group">
						    <div class="row">
						    	<div class="col-md-4">
						    	<!-- <div class="col-md-8"> -->
						    	<label for="cimage_front"><i class="material-icons">add_a_photo</i>  Car Image (Front):</label>
						        <input type="file" id="cimage_front" name="cimage_front" accept="image/*" class="file" data-preview-file-type="any">
						        <!-- </div> -->
						        </div>
						        <div class="col-md-2"></div>
						        <div class="col-md-4">
						        <!-- <div class="col-md-8"> -->
						        <label for="cimage_right"><i class="material-icons">add_a_photo</i>  Car Image (Right):</label>
						        <input type="file" id="cimage_right" name="cimage_right" accept="image/*" class="file" data-preview-file-type="any">
						        <!-- </div> -->
						        </div>
						    </div>
						    <div class="row">
						        <div class="col-md-4">
						        <!-- <div class="col-md-8"> -->
						        <label for="cimage_left"><i class="material-icons">add_a_photo</i>  Cars Image (Left):</label>
						        <input type="file" id="cimage_left" name="cimage_left" accept="image/*" class="file" data-preview-file-type="any">
						        <!-- </div> -->
						        </div>
						        <div class="col-md-2"></div>
						        <div class="col-md-4">
						        <!-- <div class="col-md-8"> -->
						        <label for="cimage_rear"><i class="material-icons">add_a_photo</i>  Car Image (Rear):</label>
						        <input type="file" id="cimage_rear" name="cimage_rear" accept="image/*" class="file" data-preview-file-type="any">
						        <!-- </div> -->
						        </div>
						    </div>
						    <div class="row">
						        <div class="col-md-4">
						        <!-- <div class="col-md-8"> -->
						        <label for="cimage_in"><i class="material-icons">add_a_photo</i>  Car Image (Inside):</label>
						        <input type="file" id="cimage_in" name="cimage_in"  accept="image/*" class="file" data-preview-file-type="any">
						        <!-- </div> -->
						        </div>
						    </div>
						    </div>
						    <div class="form-group">
						    <label for="cphone_no" class="control-label"><i class="material-icons">phone_android</i>  Phone Number:</label>
						    <input type="text" id="cphone_no" name="cphone_no" class="form-control" maxlength="10" required/>&nbsp;<span id="errorc" style="color:red"></span>
						    <p class="help-block"><i class="material-icons">https</i> This Phone Number Will Be Visible To Only Verified Users</p>
						    </div>
						    <div class="form-group">
						    	<div class="col-md-10 col-md-offset-2">
						    		<button type="button" class="btn btn-default btn-lg" onclick="clearall()">Clear</button>
						    		<input type="submit" id="submit" class="btn btn-primary btn-lg" value="Submit" name="submit"></button>
						    	</div>
						    </div>
						</fieldset>   
					</form>
 				</div>
				<div role="tabpanel" class="tab-pane fade" id="bikes">
					<form class="form-horizontal" action="http://localhost/te-wt/php/bike-registration.php" method="post" id="bikeform" enctype="multipart/form-data">
						<fieldset></br>
							<!--Company For Bike -->
							<div class="form-group">
						    	<label for="selectbike"><i class="material-icons">build</i>  Bike Company :</label>
						        <select id="selectbike" name="selectbike" class="form-control" onchange="return company_change_bike()">
								  	<option value="0">--Select Bike Company--</option>
									<option value="1">Bajaj</option>
									<option value="2">BMW</option>
									<option value="3">Ducati</option>
									<option value="4">Harley Davidson</option>
									<option value="5">Hero</option>
									<option value="6">Hero Electric</option>
									<option value="7">Hero Honda</option>
									<option value="8">Honda</option>
									<option value="9">Hyosung</option>
									<option value="10">Indian</option>
									<option value="11">Kawasaki</option>
									<option value="12">KTM</option>
									<option value="13">Mahindra</option>
									<option value="14">Royal Enfield</option>
									<option value="15">Suzuki</option>
									<option value="16">TVS</option>
									<option value="17">Vespa</option>
									<option value="18">Yamaha</option>
								</select>
    						</div>
    						<input type="hidden" name="bcompany" id="bcompany">
							<div class="form-group">
								<label for="bmodel"><i class="material-icons">assignment</i>  Bike Model & Version:</label>
							  	<input class="form-control" id="bmodel" name="bmodel" type="text" required>
							</div>
						    <div class="form-group"> 
						        <label for="yearb"><i class="material-icons">date_range</i>  Make Year:</label>
						        <select id="yearb" name="yearb" class="form-control"></select>
							</div>
							<div class="form-group">
								<label for="bkms"><i class="material-icons">traffic</i>  Kilometers Driven:</label>
							  	<input class="form-control" name="bkms" id="bkms" type="number" required>
							</div>
							<div class="form-group">
      							<label for="bselectstate"><i class="material-icons">my_location</i>  State :</label>
        						<select id="bselectstate" name="bselectstate" class="form-control" onchange="return state_change_bike()">
								    <option value=" ">--Select State--</option>
									<option value="1">Andaman Nicobar</option>
									<option value="2">Andhra Pradesh</option>
									<option value="3">Arunachal Pradesh</option>
									<option value="4">Assam</option>
									<option value="5">Bihar</option>
									<option value="6">Chandigarh</option>
									<option value="7">Chhattisgarh</option>
									<option value="8">Daman &amp; Diu</option>
									<option value="9">Delhi</option>
									<option value="10">Goa</option>
									<option value="11">Gujarat</option>
									<option value="12">Haryana</option>
									<option value="13">Himachal Pradesh</option>
									<option value="14">Jammu &amp; Kashmir</option>
									<option value="15">Jharkhand</option>
									<option value="16">Karnataka</option>
									<option value="17">Kerala</option>
									<option value="18">Madhya Pradesh</option>
									<option value="19">Maharashtra</option>
									<option value="20">Manipur</option>
									<option value="21">Meghalaya</option>
									<option value="22">Mizoram</option>
									<option value="23">Nagaland</option>
									<option value="24">Orissa</option>
									<option value="25">Pondicherry</option>
									<option value="26">Punjab</option>
									<option value="27">Rajasthan</option>
									<option value="28">Sikkim</option>
									<option value="29">Tamil Nadu</option>
									<option value="30">Telangana</option>
									<option value="31">Tripura</option>
									<option value="32">Uttar Pradesh</option>
									<option value="33">Uttaranchal</option>
									<option value="34">Uttrakhand</option>
									<option value="35">West Bengal</option>
								</select>
    						</div>
    						<input type="hidden" name="bstateh" id="bstateh">
							<div class="form-group">
							  	<label for="bcity"><i class="material-icons">place</i>  City:</label>
							  	<input class="form-control" id="bcity" name="bcity" type="text" required>
							</div>
							<div class="form-group">
							  	<label for="bprice"><i class="material-icons">local_atm</i>  Expected Price:</label>
							  	<input class="form-control" id="bprice" name="bprice" type="number" required>
							</div>
						    <div class="form-group">
						     	<label for="bdetails"><i class="material-icons">insert_comment</i>  Bike Details:</label>
						       	<textarea class="form-control" rows="4" id="bdetails" name="bdetails" placeholder="Enter Bike Details Here" required></textarea>
						    </div>
						    <div class="form-group">
						    <div class="row">
						    	<div class="col-md-4">
						    	<!-- <div class="col-md-8"> -->
						    	<label for="bimage_front"><i class="material-icons">add_a_photo</i>  Bike Image (Front):</label>
						        <input type="file" id="bimage_front" name="bimage_front" accept="image/*" class="file" data-preview-file-type="any">
						        <!-- </div> -->
						        </div>
						        <div class="col-md-2"></div>
						        <div class="col-md-4">
						        <!-- <div class="col-md-8"> -->
						        <label for="bimage_right"><i class="material-icons">add_a_photo</i>  Bike Image (Right):</label>
						        <input type="file" id="bimage_right" name="bimage_right" accept="image/*" class="file" data-preview-file-type="any">
						        <!-- </div> -->
						        </div>
						    </div>
						    <div class="row">
						        <div class="col-md-4">
						        <!-- <div class="col-md-8"> -->
						        <label for="bimage_left"><i class="material-icons">add_a_photo</i>  Bike Image (Left):</label>
						        <input type="file" id="bimage_left" name="bimage_left" accept="image/*" class="file" data-preview-file-type="any">
						        <!-- </div> -->
						        </div>
						        <div class="col-md-2"></div>
						        <div class="col-md-4">
						        <!-- <div class="col-md-8"> -->
						        <label for="bimage_rear"><i class="material-icons">add_a_photo</i>  Bike Image (Rear):</label>
						        <input type="file" id="bimage_rear" name="bimage_rear" accept="image/*" class="file" data-preview-file-type="any">
						        <!-- </div> -->
						        </div>
						    </div>
						    </div>
						    <div class="form-group">
						    <label for="bphone_no" class="control-label"><i class="material-icons">phone_android</i>  Phone Number:</label>
						    <input type="text" id="bphone_no" name="bphone_no" class="form-control" maxlength="10" required/>&nbsp;<span id="error" style="color:red"></span>
						    <p class="help-block"><i class="material-icons">https</i> This Phone Number Will Be Visible To Only Verified Users</p>
						    </div>
						    <div class="form-group">
						    	<div class="col-md-10 col-md-offset-2">
						    		<button type="button" class="btn btn-default btn-lg" onclick="clearall()">Clear</button>
						    		<input type="submit" id="submit" class="btn btn-primary btn-lg" value="Submit" name="submit"></button>
						    	</div>
						    </div>
						</fieldset>   
					</form>
				</div>
			</div>
	</div>

	<!-- Placed at the end of the document so the pages load faster -->
	<!-- jQuery -->  
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="./js/bootstrap.min.js"></script>
  	<script src="./js/material.min.js"></script>     
  	<script src="./js/ripplesinit.js"></script>
  	<script src="./js/yearinit.js"></script>
  	<script src="./js/gettext.js"></script>  
  	<script src="./js/ripples.min.js"></script>
  	<script src="./js/validate.js"></script>
  	<script src="./js/fileinput.js"></script>
  	<script src="./js/fileinput.min.js"></script>
</body>
</html>