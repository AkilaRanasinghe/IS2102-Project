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
				<form method="post"  class="data" action="add_event.php" enctype='multipart/form-data'>
  	  					<h1 style="padding-top: 10px;"> <center>  Add event</center></h1>
						<hr />
						<br />
						
        				<label for="name">event name : </label> 
						
						<input style="height: 30px; width: 200px"type="text" placeholder=" Enter event name......" name="name" id="name" required>
						
					&emsp; 
					<label for="max_participants">max_participants : </label> 
						
						<input style="height: 30px; width: 270px" type="number" placeholder="     Enter max_participants......" name="max_participants" id="max_participants" required>
						<br />
						<br />
						<label for="participants">participants : </label> 
						
						<input style="height: 30px; width: 270px" type="number" placeholder="     Enter participants......" name="participants" id="participants" required>
						<br />
						<br />
						<label for="conditions">conditions : </label> 
						
						<input style="height: 30px; width: 200px"type="text" placeholder=" Enter conditions......" name="conditions" id="conditions" required>
						
					&emsp; 
        				<label for="contact_no">Contact number : </label> 
						
						<input style="height: 30px; width: 270px" type="text" placeholder="     Enter contact number......" name="contact_no" id="contact_no" required>
						<br />
						<br />

						<label for="venue">venue : </label> 
						
						<input style="height: 30px; width: 200px"type="text" placeholder=" Enter venue......" name="venue" id="venue" required>
						
					&emsp; 
					<p>Date</p>
					<input type="date" name="held_date" required>
						<input type="date" name="entry_closing_date" required>
						

						
						<p>Start Time</p>
						<input type="time" placeholder="start_time " name="start_time" required>
						
						<p>end_time</p>
						<input type="time" placeholder="end_time " name="end_time" required>



											<br >
											
						<input type="date" name="end_date" required>
						
						
						
					&emsp; 
					<label for="expenses_fees">expenses_fees : </label> 
						
						<input style="height: 30px; width: 270px" type="text" placeholder="     Enter expenses_fees......" name="expenses_fees" id="expenses_fees" required>
						<br />
						<br />
						
						
					&emsp; 

											<br >			
						<label for="status">status : </label> 
						<select id="status" input style="height: 30px; width: 200px" name="status" required>
						   <option value="" selected disabled>status</option>
						   <option value="approved">approved</option>
						   <option value="pending">pending</option>
						   
						   
						</select>	
<br />

<label for="event_type">event_type : </label> 
						
						<input style="height: 30px; width: 200px"type="text" placeholder=" Enter event_type......" name="event_type" id="event_type" required>

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