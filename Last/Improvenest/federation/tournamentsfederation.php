
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
<link rel="stylesheet" href="../css/viewpart.css">
<link rel="stylesheet" href="../css/card.css"/>
<script src="../js/commonjs.js"></script>
<script src="../js/playerlist.js"></script>
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

			<a href="addtournament.php" button style="float:right;" class="fedadd">Add Tournament</button></a>

		</div>	
		<div id="Upcoming" class="tabcontent">
		<div class="row search-form">
		<div class="newssubhead">
		<h3> Upcoming tournaments </h3>
				</div>

		
				</form>
				</div>



				
				<div class="row">
				
				
				<table width="100%" cellpadding="10px" border="1" style="border-collapse: collapse; ">
    	<thead> 
		</thead>
		<tbody>

		<?php
			date_default_timezone_set('Asia/Colombo');
			$today = date("Y-m-d");
			
				$count = 1;
                    
                $sql_query = "SELECT * FROM tournament where username='".$uname."' AND status='approved' AND entry_closing_date>'".$today."'";
				
				
                $result = mysqli_query($conn, $sql_query);
                    
				while ($row = mysqli_fetch_assoc($result)) { 
					
							
						
							
					?>
			<div class="row">
				<div class="horitem">
				<div class='row'>
					
				<div class='procol5'>
				<h2><?php echo $row["tournament_id"]; ?>&emsp; <?php echo $row["name"]; ?></h2>
				</div>
			

						<div class='procol6'>
						<b><h3>Start Date : <?php echo $row["start_date"]; ?>
						 &emsp;   &emsp;  &emsp;    End date : <?php echo $row["end_date"]; ?>
				</h3></b>
						<p> Venue : <?php echo $row["venue"]; ?> 
						<p>Organized by: <?php echo $row["username"]; ?> </p> Contact No. : <?php echo $row["contact_no"]; ?> </p>
				</div>
				
						 <div class='column procol6'>
						 <b><h3> Entry closing date : <?php echo $row["entry_closing_date"]; ?></h3></b>
						 
					
						 No. of joined players : <?php echo $row["participants"]; ?>/<?php echo $row["max_participants"]; ?>&emsp;
						  <input type="button" button id="myBtn" class="occas" value="View all participants"></button>
						<!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header">
	<span class="close">&times;</span>
	<h2><?php echo $row["name"]; ?> participants</h2>
  </div>
  <div class="modal-body">
	<p>Some text in the Modal Body</p>
	
  </div>
 
</div>

</div>
						 <p> Entry fee :<?php echo $row["entry_fee"]; ?></p>
						
						
						</div>
						
						</div>
						<div class="row">
						<div class='column procol6'>
						<p>Conditions : <?php echo $row["conditions"]; ?> </p></div>
						<div class='column procol6'><p>Rules and regulations : <?php echo $row["rules_regulations"]; ?> </p>
						</div>
						
						</div>
						</div>
						</div>		
		</div>
						
				<?php $count++;
            } ?>
			 </tbody>
		</table>

			
			</div>		
		</div>



		<div id="Finished" class="tabcontent">
		<div class="row search-form">
		<div class="newssubhead">
		<h3> Finished tournaments</h3>
				</div>

		
				<div class="row">
				
				
				<table width="100%" cellpadding="10px" border="1" style="border-collapse: collapse; ">
    	<thead> 
		</thead>
		<tbody>

<?php
		$count = 1;
			
		$sql_query = "SELECT * FROM tournament where username='".$uname."' AND status='approved' ";
		$result = mysqli_query($conn, $sql_query);
			
		while ($row = mysqli_fetch_assoc($result)) { ?>
	<div class="row">
		<div class="disabledhoritem">
		<div class='row'>
			
		<div class='procol5'>
		<h2><?php echo $row["tournament_id"]; ?>&emsp; <?php echo $row["name"]; ?></h2>
		</div>
	

				<div class='procol6'>
				<b><h3>Started on : <?php echo $row["start_date"]; ?>
				 &emsp;   &emsp;  &emsp;    Ended on : <?php echo $row["end_date"]; ?>
		</h3></b>
				<p> Venue : <?php echo $row["venue"]; ?> 
				<p>Organized by: <?php echo $row["username"]; ?> </p> Contact No. : <?php echo $row["contact_no"]; ?> </p>
		</div>
		
				 <div class='column procol6'>
				 <b><h3> Entry closed on : <?php echo $row["entry_closing_date"]; ?></h3></b>
				 
			
				 No. of joined players : <?php echo $row["participants"]; ?>/<?php echo $row["max_participants"]; ?>&emsp;
				  <a href="" button class="past">View all participants</button></a>
				
				 <p> Entry fee :<?php echo $row["entry_fee"]; ?></p>
				
				
				</div>
				
				</div>
				<div class="row">
				<div class='column procol6'>
				<p>Conditions : <?php echo $row["conditions"]; ?> </p></div>
				<div class='column procol6'><p>Rules and regulations : <?php echo $row["rules_regulations"]; ?> </p>
				</div>
				
				</div>
				</div>
				</div>		
</div>
				
		<?php $count++;
	} ?>
	 </tbody>
</table>

	
	</div>		
</div>




		</div>		
		</div>



	

    
	<!-----------CONTENTS END-------------->
</div>
<script>
	document.getElementById("defaultOpen").click();

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}



</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>