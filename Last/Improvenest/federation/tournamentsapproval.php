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
			<a class="buttonlinks" onclick="openUser(event, 'Tournaments')" id="defaultOpen">Tournaments</a>
			<a class="buttonlinks" onclick="openUser(event, 'Events')">Events</a>
		</div>	
		<div id="Tournaments" class="tabcontent">
			
			
				<div class="row">
				
				
				
    	
			<?php
			date_default_timezone_set('Asia/Colombo');
			$today = date("Y-m-d");

				
              
              
			
				$count = 1;
                    
                $sql_query = "SELECT * FROM tournament where username='".$uname."' AND status='pending' AND auto_reject_date>'".$today."' ";
				
                $result = mysqli_query($conn, $sql_query);
                    
				while ($row = mysqli_fetch_assoc($result)) { ?>
			
					<div class="row">
					
				<div class='horitem'>
				<div class='row'>
				
				<div class='procol5'>
				<h2><?php echo $row["tournament_id"]; ?>&emsp; <?php echo $row["name"]; ?></h2>
				</div>
				<div class='procol6'>
						<b><h3>Start Date : <?php echo $row["start_date"]; ?>
						 &emsp;   &emsp;  &emsp;    End date : <?php echo $row["end_date"]; ?>
				</h3></b>
						<p> Venue : <?php echo $row["venue"]; ?> 
						<p>Contact No. : <?php echo $row["username"]; ?> </p> Contact No. : <?php echo $row["contact_no"]; ?> </p>
				</div>
				
						 <div class='column procol6'>
						 <b><h3> Entry closing date : <?php echo $row["entry_closing_date"]; ?></h3></b>
						 
					
						 <p> Maximum players : <?php echo $row["max_participants"]; ?> </p>
						 <p> Entry fee :<?php echo $row["entry_fee"]; ?></p>
						
						
						</div>
						
						</div>
						<div class="row">
						<div class='column procol6'>
						<p>Conditions : <?php echo $row["conditions"]; ?> </p></div>
						<div class='column procol6'><p>Rules and regulations : <?php echo $row["rules_regulations"]; ?> </p>
						</div>
						
						</div>
						<a href="approve_occasionsTA.php?tournament_id=<?php echo $row["tournament_id"]; ?>" button style="float:left" class="fedapprove">APPROVE</button></a>

						 
				
			
						<a href="approve_occasionsTR.php?tournament_id=<?php echo $row["tournament_id"]; ?>" button style="float:right" class="fedreject">REJECT</button></a>
						
						
			
						</div>
						</div>
						<br/>
                   
					
					<?php $count++;
            } ?>
				
	
				</div>
				</div>
				
				




				<div id="Events" class="tabcontent">
			
				<div class="row">
				
				
				
    	
			<?php
			date_default_timezone_set('Asia/Colombo');
			$today = date("Y-m-d");
			
				$count = 1;
                    
                $sql_query = "SELECT * FROM event where username='".$uname."' AND status='pending' AND auto_reject_date>'".$today."' ";
                $result = mysqli_query($conn, $sql_query);
                    
				while ($row = mysqli_fetch_assoc($result)) { ?>
			
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
						 
					
						 <p> Maximum players : <?php echo $row["max_participants"]; ?> </p>
						 <p> Registration fee :<?php echo $row["expenses_fees"]; ?></p>
						 <p> End time :<?php echo $row["end_time"]; ?></p>
						
						</div>
						
						</div>
						<div class="row">
						<div class='column procol6'>
						<p>Conditions : <?php echo $row["conditions"]; ?> </p></div>
						<p>Start time : <?php echo $row["start_time"]; ?></p><p>Conditions : <?php echo $row["status"]; ?> </p></div>
						
						
						<a href="approve_occasionsEA.php?event_id=<?php echo $row["event_id"]; ?>" button style="float:left" class="fedapprove">APPROVE</button></a>

						 
				
			
						<a href="approve_occasionsER.php?event_id=<?php echo $row["event_id"]; ?>" button style="float:right" class="fedreject">REJECT</button></a>
			
						</div>
						
			
						</div>
						</div>
						<br/>
                   
					
					<?php $count++;
            } ?>
				
	
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