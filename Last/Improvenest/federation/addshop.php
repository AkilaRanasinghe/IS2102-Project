<?php
include '../php/conn.php';
session_start();
$uname = $_SESSION['uname'];
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css">
<script src="../js/commonjs.js"></script>
</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/federationsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
    <div class="column contents" >
	<div class="input-form" style="padding:20px 150px 20px 150px;">
				<div class="mybox" style="width: 90%; margin-left: 5%; ">
				<form method="post"  class="data" action="add_shop.php" enctype='multipart/form-data'>
  	  					<h1 style="padding-top: 10px;"> <center>  Add shop </center></h1>
						<hr />
						<br />
						
        				<label for="name">Shop name : </label> 
						
						<input style="height: 30px; width: 200px"type="text" placeholder=" Enter Shop name......" name="name" id="name" required>
						
					&emsp; 

						
        				<label for="contact_no">Contact number : </label> 
						
						<input style="height: 30px; width: 270px" type="text" placeholder="     Enter contact number......" name="contact_no" id="contact_no" required>
						<br />
						<br />


						<label for="Category">Category : </label> 
						<select id="Category" input style="height: 30px; width: 200px" name="Category" required>
						   <option value="" selected disabled>Category</option>
						   <option value="Stores">Stores</option>
						   <option value="Used Equipment">Used Equipment</option>
						   <option value="Venues">Venues</option>
						   <option value="Online Purchasing">Online Purchasing</option>
						   
						</select>	
<br />
						<br />
        				<label for="address">Address &emsp; :</label>
						
						<input style="height: 30px; width: 600px"type="text" placeholder="Enter address....." name="address" id="address" required>
						<br />
						<br />
							
						<label for="image">Upload image  :</label>
						<input type='file' name='image' required>
						<br />
						<br />

						<label for="description">Description</label> 
						<br />
						
  	 		 			<input style="height: 100px; width: 700px" type="textarea"  placeholder="Enter details....." name="description" id="description" required>
						<br />
						<br />	
						<center>
						<button style="width:40%; margin-left: 30px;" type="submit" id="organisersbt" value="Submit" >Submit</button>
						<button type="reset" value="Reset" style="background-color:#a32626; width:40%;">Reset</button>	
						</center>
						<br />
											

					</form>
				</div>	
			</div>
			</div>
		</div>




    
	<!-----------CONTENTS END-------------->
</div>
<script>
	document.getElementById("defaultOpen").click();
</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>