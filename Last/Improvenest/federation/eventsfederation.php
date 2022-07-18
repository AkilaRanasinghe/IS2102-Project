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
<link rel="stylesheet" href="../css/federation.css">
<link rel="stylesheet" href="../css/card.css"/>
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
	
	<div class="column contents">
	<div class="row tab">
	<a class="buttonlinks" onclick="openUser(event, 'Upcoming')" id="defaultOpen">Upcoming</a>
			<a class="buttonlinks" onclick="openUser(event, 'Finished')">Finished</a>

			<a href="addevent.php" button style="float:right;" class="fedadd">Add Event</button></a>

		</div>	

		<div id="Upcoming" class="tabcontent">
		<div class="row search-form">
		<div class="newssubhead">
		<h3> Upcoming events </h3>
				</div>

	
				</form>
				</div>
				<div class="row">
				
				
			

		<?php
				$count = 1;
                    
                $sql_query = "SELECT * FROM event where username='".$uname."' AND status='approved' ORDER BY event_id";
                $result = mysqli_query($conn, $sql_query);
                    
				while ($row = mysqli_fetch_assoc($result)) { 
					
					
					?>
			<div class="row">
			<div class='horitem'>
			<div class='row'>
			<div class='procol5'>
			<h2><?php echo $row["event_id"]; ?>&emsp; <?php echo $row["name"]; ?></h2>
				</div>

				<div class='procol6'>


				<b><h3>Held on : <?php echo $row["held_date"]; ?>
						 
						 </h3></b>
								 <p> Venue : <?php echo $row["venue"]; ?> 
								
								 <p>Organized by : <?php echo $row["username"]; ?> </p> Contact No. : <?php echo $row["contact_no"]; ?> </p>
						 </div>
						 
								  <div class='column procol6'>
								  <b><h3> Entry closing date : <?php echo $row["entry_closing_date"]; ?></h3></b>
								  
							 
								  
								  <p> Registration fee :<?php echo $row["expenses_fees"]; ?></p>
								  <p> End time :<?php echo $row["end_time"]; ?></p>
								  <p> No. of joined players : <?php echo $row["participants"]; ?>/<?php echo $row["max_participants"]; ?>  &emsp;
						  <a href="" button class="occas">View all participants</button></a></p> 
								 
								 </div>
								 
								 </div>
								 <div class="row">
								 <div class='column procol6'>
								 <p>Conditions : <?php echo $row["conditions"]; ?> </p></div>
								 <p>Start time : <?php echo $row["start_time"]; ?></p><p>Conditions : <?php echo $row["status"]; ?> </p></div>
								 

								 </div>
						
			
						</div>
						</div>
						<?php $count++;
            } ?>
				
	
				
				



					
						
					
						
					
		
			

		<div id="Finished" class="tabcontent">
		<div class="row search-form">
		<div class="newssubhead">
		<h3> Finished events</h3>
				</div>

		
				</form>
				</div>
				<div class="row">
				
				
		
		<?php
				$count = 1;
                    
                $sql_query = "SELECT * FROM event where username='".$uname."' AND status='approved'";
                $result = mysqli_query($conn, $sql_query);
                    
				while ($row = mysqli_fetch_assoc($result)) { ?>
			<div class="row">
				<div class="horitem">
				<div class='row'>
			<div class='procol5'>
			<h2><?php echo $row["event_id"]; ?>&emsp; <?php echo $row["name"]; ?></h2>
				</div>

				<div class='procol6'>


				<b><h3>Held on : <?php echo $row["held_date"]; ?>
						 
						 </h3></b>
								 <p> Venue : <?php echo $row["venue"]; ?> 
								 
								 <p>Organized by : <?php echo $row["username"]; ?> </p> Contact No. : <?php echo $row["contact_no"]; ?> </p>
						 </div>
						 
								  <div class='column procol6'>
								  <b><h3> Entry closing date : <?php echo $row["entry_closing_date"]; ?></h3></b>
								  
							 
								  
								  <p> Registration fee :<?php echo $row["expenses_fees"]; ?></p>
								  <p> End time :<?php echo $row["end_time"]; ?></p>
								  <p> No. of joined players : <?php echo $row["participants"]; ?>/<?php echo $row["max_participants"]; ?> &emsp;
						  <a href="" button class="occas">View all participants</button></a></p>
								 
								 </div>
								 
								 </div>
								 <div class="row">
								 <div class='column procol6'>
								 <p>Conditions : <?php echo $row["conditions"]; ?> </p></div>
								 <p>Start time : <?php echo $row["start_time"]; ?></p><p>Conditions : <?php echo $row["status"]; ?> </p></div>
								 

								 </div>
						
			
						</div>
						</div>
						<?php $count++;
            } ?>
				
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