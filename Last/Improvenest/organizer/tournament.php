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
	<?php include '../php/organisersidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row tab">
			<a href="tournament.php" class="active">Approved</a>
			<a href="tournamentpending.php">Pending</a>
			<a href="tournamentrejected.php">Rejected</a>
	
			<a href="addtournament.php"><button type="submit" style="width:100%; background-color: #50AEC4; font-family:arial; width: 200%; height: 40px; font-size: 17px; margin-top: -40px; margin-bottom: -40px; margin-left: 220%; padding-top: 7px; border-radius: 5px 5px 5px 5px;">Add Tournament</button></a>

</div>
		<div class="maintabcontent">		
			<div class="row search-form">
				<div class="column procol4">
					<h1>Approved</h1>
				</div>
				<div class="column procol5" style="padding-top:25px;">
					<form action="searchapprovedtournament.php" method="POST">
					<table cellspacing="2" cellpadding="2" border="0" width="100%" style="float:right">
					<tr>
						<td>
							<input type="text" placeholder="Search.." name="search" required>					
						</td>
						
						<td width="20px">
							<button type="submit"><img src="../images/csearch.png"></button>
						</td>
					</tr>
					</table>
					</form>
				</div>
			</div>
			<div class="row">
				<?php
					$sql="SELECT * FROM tournament WHERE status='Approved' AND username='$uname' ORDER BY start_date DESC";
					$result = $conn->query($sql);
								  
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{
							$id = $row["occasion_id"];
							$helddate = $row["start_date"];
							$enddate = $row["end_date"];
							date_default_timezone_set('Asia/Colombo');
							$today = date("Y-m-d");
							$clss = "";

							if($helddate < $today)
							{
								echo"<div class='disabledhoritem'>
										<div class='procol5'>
											<h2>".$row["occasion_id"]." - ".$row["name"]."</h2>";

												echo"<div class='column procol6'>
														<h3>Starting Date : ".$row["start_date"]."</h3>
														<p>Venue : ".$row["venue"]."</p>
														<p>Sport : ".$row["sport"]."</p>
														<p>Organizer : ".$row["username"]."</p>											
												</div>

												<div class='column procol6'>
													<h3>Ending Date : ".$row["end_date"]."</h3>
													<p>Entry Closing Date : ".$row["entry_closing_date"]."</p>
													<p>Entry Fee : Rs.".$row["entry_fee"]."</p>
													<p>Contact No : ".$row["contact_no"]."</p>
												</div>
										
												<p>Rules and Regulations : ".$row["rules_regulations"]."</p>
										";	
																
										
								echo"</div>
								<h2><font color='red'> Closed </font></h2>

									<br />

								<a href='viewClosedTournament.php?id=".$id."'><button type='submit' align='left' style='width:23%; background-color: #F94545; font-family:arial; height: 150px; font-size: 22px; margin: 0; border-radius: 5px 5px 5px 5px;'>View Tournament</button></a>
								<div class='procol4'></div>
                                    							
							</div>";
						}
						else
						{
							echo"<div class='horitem'>
									<div class='procol5'>
										<h2>".$row["occasion_id"]." - ".$row["name"]."</h2>";
									
										echo"<div class='column procol6'>
												<h3>Starting Date : ".$row["start_date"]."</h3>
												<p>Venue : ".$row["venue"]."</p>
											
												<p>Sport : ".$row["sport"]."</p>
												<p>Organizer : ".$row["username"]."</p>
											
										</div>

										<div class='column procol6'>
											<h3>Ending Date : ".$row["end_date"]."</h3>
											<p>Entry Closing Date : ".$row["entry_closing_date"]."</p>
											<p>Entry Fee : Rs.".$row["entry_fee"]."</p>
											<p>Contact No : ".$row["contact_no"]."</p>
										</div>
										
										<p>Rules and Regulations : ".$row["rules_regulations"]."</p>
										";	
																
										$sqll = "SELECT * FROM event_aspect WHERE occasion_id = '".$id."'";
										$resultt = $conn->query($sqll);
																  
										if($resultt->num_rows > 0)
										{
											$data = array();
											while($roww = $resultt->fetch_assoc())
											{
												$data[] = $roww["aspect"];
											}
											echo"<div class='procol7'>";
												print_r("Aspect of the event&emsp;:&emsp;");
												for($x = 0 ; $x < count($data) ; $x++)
												{
													print_r($data[$x]);echo"&emsp;&emsp;&emsp;";
												}
											echo"</div>";	
										}
									echo"</div>
									<br /> <br /><br /><br />
									<a href='viewTournament.php?id=".$id."'><button type='submit' align='left' style='width:23%; background-color: #45C5F9; font-family:arial; height: 150px; font-size: 22px; margin: 0; border-radius: 5px 5px 5px 5px;'>View Tournament</button></a>
									
									
									<div class='procol4'></div>							
								</div>";
						}
					}
				}
				else 
				{
					echo "<div class='procol7'><h3>No Approved Tournaments.</h3></div>";
				}
				
				$conn->close();
				?>
				
				
				
			</div>	
			
	</div>
	<!-----------CONTENTS END-------------->
</div>
<script>
	document.getElementById("defaultOpen").click();
</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<br > 
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>