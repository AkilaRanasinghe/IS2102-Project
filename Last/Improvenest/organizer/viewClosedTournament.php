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
<script>
function delete_profile()
{
	if(confirm("Are you sure you want to delete your profile?"))
	{
		window.location.href="organiserdelete.php";
	}
}
</script>
</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/organisersidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<?php

	if(isset($_GET["id"]))  
	{
		$id = $_GET["id"];
	}
	else
	{
		$id = $_SESSION['id'];
	}

	$_SESSION['id'] = $id;

	$sql = "SELECT * FROM tournament WHERE occasion_id = '".$id."'";
	$result = $conn->query($sql);
							  
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo"<div class='column contents'>
					<div class='row'>
					<center>
						<div class='column procol5'>
							<div class='row'>
								<div class='row'>
								
									<h1>".$row["name"]."</h1>
									<br >
								</div>
								<div class='row' style='padding:20px 10px 0px 100px;' align='center'>
									<table class='protable' cellspacing='2' cellpadding='2' border='0' width='100%'>
										<tr>
											<td>
												<p>Sport</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["sport"]."</p>
											</td>
											<td>
												<p>Max Participants</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["max_participants"]."</p>
											</td>
										</tr>
										<tr>
											<td>
												<p>Contact Number</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["contact_no"]."</p>
											</td>
											<td>
												<p>Venue</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["venue"]."</p>
											</td>
										</tr>

										<tr>
											<td>
												<p>Entry Fee</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["entry_fee"]."</p>
											</td>
											<td>
												<p>Entry Closing Date</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["entry_closing_date"]."</p>
											</td>
										</tr>

										<tr>
											<td>
												<p>Start Date</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["start_date"]."</p>
											</td>
											<td>
												<p>End Date</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["end_date"]."</p>
											</td>
										</tr>

									<tr>
										<td>
											<p>Conditions</p>
										</td>
										<td>
											<p>:</p>
										</td>
										<td colspan='4'>
											<p>".$row["conditions"]."</p>
										</td>
									</tr>

									
									<tr>
										<td>
											<p>Rules and Regulations</p>
										</td>
										<td>
											<p>:</p>
										</td>
										<td colspan='4'>
											<p>".$row["rules_regulations"]."</p>
										</td>
									</tr>


									
									</table>
								</div>								
							</div>						
						</div>
					</div>
					<br/><br/>
					
					<div class='row' style='padding:20px 10px 0px 10px;' align='center'>

						<div class='column common'>
						<a href='registeredPlayers.php?id=".$id."'><button>Registrations</button></a>
							<br />
							<br />  <br />  <br />						<br />
							<br />  <br />  <br />						<br />
							<br />  <br />  <br />
							</div>

					</div>
				</div>";
		}
	}
	?>
	<!-----------CONTENTS END-------------->
</div>
<script>
function openForm() {
	document.getElementById("myForm").style.display = "block";
}

function closeForm() {
	document.getElementById("myForm").style.display = "none";
}
</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>
