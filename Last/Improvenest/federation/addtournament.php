<!-- https://www.youtube.com/watch?v=Ze4Ei5y4tiE&t=340s -->

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
				<form method="post" onsubmit="return checktraining()" class="data" action="add_tournament.php" enctype='multipart/form-data'>
  	  					<h1 style="padding-top: 10px;"> <center>  Add tournament</center></h1>
						<hr />
						<br />
						
        				<label for="name">Tournament name : </label> 
						
						<input style="height: 30px; width: 600px"type="text" placeholder=" Enter tournament name......" name="name" id="name" required>
						<br />
						<br />
					<label for="max_participants">Maximum participants : </label> 
						
						<input style="height: 30px; width: 50px" type="number" placeholder=" " name="max_participants" id="max_participants" min="4" required>
						
						<!-- <label for="participants">Participants : </label> 
						
						<input style="height: 30px; width: 50px" type="number" placeholder="participants" min="4" required> -->
						<label for="contact_no">Contact number : </label> 
						
						<input style="height: 30px; width: 270px" type="text" placeholder=" contact no. " name="contact_no" id="contact_no" required>
						<br />
						<br />
						
						
					

						<label for="venue">Venue : </label> 
						
						<input style="height: 30px; width: 600px" type="text" placeholder=" Enter venue......" name="venue" id="venue" required>
						
						<br />
						<br />
					<p>Entry closing date
					<input style="height: 30px; width: 150px" type="date" name="entry_closing_date" required>
					Start date
						<input style="height: 30px; width: 150px" type="date" name="start_date" required>
						
											
											End date					
						<input style="height: 30px; width: 150px" type="date" name="end_date" required></p>
						<br />
						<br />
						<label for="sport">Sport : </label> 
						
						<input style="height: 30px; width: 130px"type="text" placeholder=" Enter sport......" name="sport" id="sport" required>
						
					&emsp; 
					<label for="entry_fee">Entry fee : </label> 
						
						<input style="height: 30px; width: 100px" type="text" placeholder="" name="entry_fee" id="entry_fee" min="0" required>
						<label for="status">Status : </label> 
						<select id="status" input style="height: 30px; width: 100px" name="status" required>
						   <option value="" selected disabled>status</option>
						   <option value="approved">approved</option>
						   <option value="pending">pending</option>
						   
						   
						</select>	
						<br />
						<br />
						<label for="rules_regulations">Rules and regulations : </label> 
						<br />
						<input style="height: 60px; width: 600px"type="text" placeholder=" rules regulations......" name="rules_regulations" id="rules_regulations" required>
						<br />
						<br />
						<label for="conditions">Conditions : </label> 
						<br />
						<input style="height: 60px; width: 600px"type="text" placeholder=" Enter conditions......" name="conditions" id="conditions" required>
						<br />	
						
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