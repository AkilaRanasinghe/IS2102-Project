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
	<?php include '../php/playersidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row tab">
			<a href="events.php">Find Events</a>
			<a href="myevents.php" class="active">My Events</a>
		</div>
		<div class="maintabcontent">
			<div class="row">
				<div class="column procol4">
					<h1>My Events</h1>
				</div>
				<div class="column procol5" style="padding-top:10px;">
					<a href="grouptrainingform.php"><button style="float:right;">Propose Group Training Session</button></a>
				</div>
			</div>
			<div class="row tab" style="padding-left:0px;">
				<a class="buttonlinks" onclick="openUser(event, 'Coming')" id="defaultOpen" style="width:25%;">Upcoming</a>
				<a class="buttonlinks" onclick="openUser(event, 'Open')" style="width:25%;">Registrations Open</a>
				<a class="buttonlinks" onclick="openUser(event, 'Closed')" style="width:25%;">Registrations Closed</a>
				<a class="buttonlinks" onclick="openUser(event, 'Expired')" style="width:25%;">Expired</a>
			</div>
			<div class='row'>
				<div id="Coming" class="tabcontent">
					<div class="row">
						<?php
						$sql="SELECT DISTINCT * FROM event e, group_training_session g, event_sport s WHERE g.username = '" .$uname. "' AND (e.held_date > (SELECT CURRENT_DATE())) AND e.occasion_id = g.occasion_id AND s.occasion_id = g.occasion_id ORDER BY e.held_date ASC";
						$result = $conn->query($sql);
										  
						if($result->num_rows > 0)
						{
							while($row = $result->fetch_assoc())
							{
								$occasion = $row["occasion_id"];
								echo"<div class='horitem'>
										<div class='procol5'>
											<h2>".$row["training_session_id"]." - ".$row["name"]."</h2>";
											$start = date("g:i a", strtotime($row["start_time"]));
											$end = date("g:i a", strtotime($row["end_time"]));
											echo"<div class='column procol6'>
													<h3>Date : ".$row["held_date"]."</h3>
													<p>Entry Closing Date : ".$row["entry_closing_date"]."</p>
													<p>Start Time : ".$start."</p>
													<p>Sport : ".$row["sport"]."</p>
													<p>Coach : ".$row["coach"]."</p>
												</div>
												<div class='column procol6'>
													<h3>Venue : ".$row["venue"]."</h3>
													<p>Participants : ".$row["participants"]."/".$row["max_participants"]."</p>
													<p>End Time : ".$end."</p>
													<p>Expenses : Rs. ".$row["expenses_fees"]."</p>
												</div>";							
											$sqll = "SELECT * FROM event_aspect WHERE occasion_id = '".$occasion."'";
											$resultt = $conn->query($sqll);
																		  
											if($resultt->num_rows > 0)
											{
												$data = array();
												while($roww = $resultt->fetch_assoc())
												{
													$data[] = $roww["aspect"];
												}
												echo"<div class='procol7'>";
														print_r("Main Focus Areas&emsp;:&emsp;");
														for($x = 0 ; $x < count($data) ; $x++)
														{
															print_r($data[$x]);echo"&emsp;&emsp;&emsp;";
														}
													echo"</div>";	
											}
										echo"</div>
										<div class='procol4'>
											<a href='editgrouptrainingsession.php?id=".$occasion."'><button id='uphalfbutton'>Edit</button></a>
											<a href='viewParticipants.php?id=".$occasion."'><button id='downhalfbutton'>View Participants</button></a>
										</div>							
									</div>";
							}
						}
						else 
						{
							echo "<div class='procol7'><h3>No Upcoming Events.</h3></div>";
						}
						?>		
					</div>					
				</div>			
				<div id="Open" class="tabcontent">
					<div class="row">
						<?php
						$sql="SELECT DISTINCT * FROM event e, group_training_session g, event_sport s WHERE g.username = '" .$uname. "' AND (e.entry_closing_date > (SELECT CURRENT_DATE()) AND e.participants < e.max_participants) AND e.occasion_id = g.occasion_id AND s.occasion_id = g.occasion_id ORDER BY e.entry_closing_date ASC";
						$result = $conn->query($sql);
										  
						if($result->num_rows > 0)
						{
							while($row = $result->fetch_assoc())
							{
								$occasion = $row["occasion_id"];
								echo"<div class='horitem'>
										<div class='procol5'>
											<h2>".$row["training_session_id"]." - ".$row["name"]."</h2>";
											$start = date("g:i a", strtotime($row["start_time"]));
											$end = date("g:i a", strtotime($row["end_time"]));
											echo"<div class='column procol6'>
													<h3>Entry Closing Date : ".$row["entry_closing_date"]."</h3>
													<p>Date : ".$row["held_date"]."</p>
													<p>Start Time : ".$start."</p>
													<p>Sport : ".$row["sport"]."</p>
												</div>
												<div class='column procol6'>
													<h3>Venue : ".$row["venue"]."</h3>
													<p>Participants : ".$row["participants"]."/".$row["max_participants"]."</p>
													<p>End Time : ".$end."</p>
													<p>Expenses : Rs. ".$row["expenses_fees"]."</p>
												</div>";							
											$sqll = "SELECT * FROM event_aspect WHERE occasion_id = '".$occasion."'";
											$resultt = $conn->query($sqll);
																		  
											if($resultt->num_rows > 0)
											{
												$data = array();
												while($roww = $resultt->fetch_assoc())
												{
													$data[] = $roww["aspect"];
												}
												echo"<div class='procol7'>";
														print_r("Main Focus Areas&emsp;:&emsp;");
														for($x = 0 ; $x < count($data) ; $x++)
														{
															print_r($data[$x]);echo"&emsp;&emsp;&emsp;";
														}
													echo"</div>";	
											}
										echo"</div>
										<div class='procol4'>
											<a href='editgrouptrainingsession.php?id=".$occasion."'><button id='uphalfbutton'>Edit</button></a>
											<a href='viewParticipants.php?id=".$occasion."'><button id='downhalfbutton'>View Participants</button></a>										
										</div>							
									</div>";
							}
						}
						else 
						{
							echo "<div class='procol7'><h3>No Open Events.</h3></div>";
						}
						?>		
					</div>					
				</div>
				<div id="Closed" class="tabcontent">
					<div class="row">
						<?php
						$sql="SELECT DISTINCT * FROM event e, group_training_session g, event_sport s WHERE g.username = '" .$uname. "' AND (e.entry_closing_date < (SELECT CURRENT_DATE()) OR e.participants = e.max_participants) AND e.held_date > (SELECT CURRENT_DATE()) AND e.occasion_id = g.occasion_id AND s.occasion_id = g.occasion_id ORDER BY e.entry_closing_date ASC";
						$result = $conn->query($sql);
										  
						if($result->num_rows > 0)
						{
							while($row = $result->fetch_assoc())
							{
								$occasion = $row["occasion_id"];
								echo"<div class='horitem'>
										<div class='procol5'>
											<h2>".$row["training_session_id"]." - ".$row["name"]."</h2>";
											$start = date("g:i a", strtotime($row["start_time"]));
											$end = date("g:i a", strtotime($row["end_time"]));
											echo"<div class='column procol6'>
													<h3>Entry Closing Date : ".$row["entry_closing_date"]."</h3>
													<p>Date : ".$row["held_date"]."</p>
													<p>Start Time : ".$start."</p>
													<p>Sport : ".$row["sport"]."</p>
												</div>
												<div class='column procol6'>
													<h3>Venue : ".$row["venue"]."</h3>
													<p>Participants : ".$row["participants"]."/".$row["max_participants"]."</p>
													<p>End Time : ".$end."</p>
													<p>Expenses : Rs. ".$row["expenses_fees"]."</p>
												</div>";							
											$sqll = "SELECT * FROM event_aspect WHERE occasion_id = '".$occasion."'";
											$resultt = $conn->query($sqll);
																		  
											if($resultt->num_rows > 0)
											{
												$data = array();
												while($roww = $resultt->fetch_assoc())
												{
													$data[] = $roww["aspect"];
												}
												echo"<div class='procol7'>";
														print_r("Main Focus Areas&emsp;:&emsp;");
														for($x = 0 ; $x < count($data) ; $x++)
														{
															print_r($data[$x]);echo"&emsp;&emsp;&emsp;";
														}
													echo"</div>";	
											}
										echo"</div>
										<div class='procol4'>
											<a href='viewParticipants.php?id=".$occasion."'><button>View Participants</button></a>										
										</div>							
									</div>";
							}
						}
						else 
						{
							echo "<div class='procol7'><h3>No Closed Events.</h3></div>";
						}
						?>		
					</div>					
				</div>
				<div id="Expired" class="tabcontent">
					<div class="row">
						<?php
						$sql="SELECT DISTINCT * FROM event e, group_training_session g, event_sport s WHERE g.username = '" .$uname. "' AND (e.held_date < (SELECT CURRENT_DATE())) AND e.occasion_id = g.occasion_id AND s.occasion_id = g.occasion_id ORDER BY e.held_date DESC";
						$result = $conn->query($sql);
										  
						if($result->num_rows > 0)
						{
							while($row = $result->fetch_assoc())
							{
								$occasion = $row["occasion_id"];
								echo"<div class='horitem'>
										<div class='procol5'>
											<h2>".$row["training_session_id"]." - ".$row["name"]."</h2>";
											$start = date("g:i a", strtotime($row["start_time"]));
											$end = date("g:i a", strtotime($row["end_time"]));
											echo"<div class='column procol6'>
													<h3>Date : ".$row["held_date"]."</h3>
													<p>Entry Closing Date : ".$row["entry_closing_date"]."</p>
													<p>Start Time : ".$start."</p>
													<p>Sport : ".$row["sport"]."</p>
												</div>
												<div class='column procol6'>
													<h3>Venue : ".$row["venue"]."</h3>
													<p>Participants : ".$row["participants"]."/".$row["max_participants"]."</p>
													<p>End Time : ".$end."</p>
													<p>Expenses : Rs. ".$row["expenses_fees"]."</p>
												</div>";							
											$sqll = "SELECT * FROM event_aspect WHERE occasion_id = '".$occasion."'";
											$resultt = $conn->query($sqll);
																		  
											if($resultt->num_rows > 0)
											{
												$data = array();
												while($roww = $resultt->fetch_assoc())
												{
													$data[] = $roww["aspect"];
												}
												echo"<div class='procol7'>";
														print_r("Main Focus Areas&emsp;:&emsp;");
														for($x = 0 ; $x < count($data) ; $x++)
														{
															print_r($data[$x]);echo"&emsp;&emsp;&emsp;";
														}
													echo"</div>";	
											}
										echo"</div>
										<div class='procol4'>
											<a href='viewParticipants.php?id=".$occasion."'><button>View Participants</button></a>										
										</div>							
									</div>";
							}
						}
						else 
						{
							echo "<div class='procol7'><h3>No Expired Events.</h3></div>";
						}
						$conn->close();
						?>		
					</div>				
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