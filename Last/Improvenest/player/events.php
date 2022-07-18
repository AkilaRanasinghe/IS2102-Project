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
			<a href="#" class="active">Find Events</a>
			<a href="myevents.php">My Events</a>
		</div>	
		<div class="maintabcontent">
			<div class="row search-form">
				<div class="column procol4">
					<h1>Find Events</h1>
				</div>
				<div class="column procol5" style="padding-top:25px;">
					<form action="searchevent.php" method="POST">
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
			<div class="row tab" style="padding-left:0px;">
				<a class="buttonlinks" onclick="openUser(event, 'Open')" id="defaultOpen" style="width:50%;">Registrations Open</a>
				<a class="buttonlinks" onclick="openUser(event, 'Closed')" style="width:50%;">Registrations Closed</a>
			</div>
			<div class='row'>		
				<div id="Open" class="tabcontent">
					<div class="row">
						<?php
						$has = false;
						$sql="SELECT DISTINCT ev.occasion_id, ev.name, ev.max_participants, ev.participants, ev.venue, ev.held_date, ev.entry_closing_date, ev.start_time, ev.end_time, ev.expenses_fees, a.username, a.Oname, a.user_type FROM (SELECT username, CONCAT(f_name, ' ', l_name) AS 'Oname', user_type FROM player UNION SELECT username, CONCAT(f_name, ' ', l_name) AS 'Oname', user_type FROM coach UNION SELECT username, name AS 'Oname', user_type FROM organiser UNION SELECT username, name AS 'Oname', user_type FROM federation) a, event ev, event_aspect ea, event_sport es WHERE ev.username = a.username AND ev.occasion_id = ea.occasion_id AND ev.occasion_id = es.occasion_id AND (ev.entry_closing_date >= (SELECT CURRENT_DATE()) AND ev.participants < ev.max_participants) AND (es.sport = 'ALL' OR es.sport IN (SELECT sport FROM player_sport WHERE username = '" .$uname. "')) AND ev.status = 'Approved' AND a.username != '" .$uname. "'";
						$result = $conn->query($sql);
												  
						if($result->num_rows > 0)
						{
							while($row = $result->fetch_assoc())
							{
								$event_id = $row["occasion_id"];
								$sqll="SELECT DISTINCT * FROM participate WHERE occasion_id = '" .$event_id. "' AND username = '" .$uname. "'";
								$resultt = $conn->query($sqll);
														  
								if($resultt->num_rows < 1)
								{
									$has = true;
									echo"<div class='horitem'>
										<div class='procol5'>
											<h2>".$row["name"]."</h2>
											<div class='column procol6'>
												<h3>Date : ".$row["held_date"]."</h3>
												<p>Entry Closing Date : ".$row["entry_closing_date"]."</p>
												<p>Start Time : ".date("g:i a", strtotime($row["start_time"]))."</p>";
												if($row["user_type"] == "Player")
												{
													$playerusername = $row["username"];
													$sqli="SELECT requester_username, receiver_username, status FROM player_request WHERE (requester_username = '" .$uname. "' AND receiver_username = '" .$playerusername. "') OR (requester_username = '" .$playerusername. "' AND receiver_username = '" .$uname. "')";
													$resulti = $conn->query($sqli);

													if($resulti->num_rows < 1)
													{
														echo"<a href='viewplayer.php?id=".$playerusername."' style='text-decoration: none; color:white;'><p>Organised By : ".$row["Oname"]."</p></a>";
													}
													else
													{
														while($rowi = $resulti->fetch_assoc())
														{
															$status = $rowi["status"];
															if($status == "Pending")
															{
																$requester_username = $rowi["requester_username"];
																$receiver_username = $rowi["receiver_username"];																
																if($requester_username == $uname)
																{
																	echo"<a href='requestedplayer.php?id=".$playerusername."' style='text-decoration: none; color:white;'><p>Organised By : ".$row["Oname"]."</p></a>";
																}
																elseif($receiver_username == $uname)
																{
																	echo"<a href='viewplayerrequest.php?id=".$playerusername."' style='text-decoration: none; color:white;'><p>Organised By : ".$row["Oname"]."</p></a>";
																}
															}
															elseif($status == "Accepted")
															{
																echo"<a href='playerprofile.php?id=".$playerusername."' style='text-decoration: none; color:white;'><p>Organised By : ".$row["Oname"]."</p></a>";
															}
														}
													}											
												}
												elseif($row["user_type"] == "Coach")
												{
													$coachusername = $row["username"];
													$sqli="SELECT status FROM coach_request WHERE requester_username = '" .$uname. "' AND receiver_username = '" .$coachusername. "'";
													$resulti = $conn->query($sqli);

													if($resulti->num_rows < 1)
													{
														echo"<a href='viewcoach.php?id=".$coachusername."' style='text-decoration: none; color:white;'><p>Organised By : ".$row["Oname"]."</p></a>";
													}
													else
													{
														while($rowi = $resulti->fetch_assoc())
														{
															$status = $rowi["status"];
															if($status == "Pending")
															{
																echo"<a href='requestedcoach.php?id=".$coachusername."' style='text-decoration: none; color:white;'><p>Organised By : ".$row["Oname"]."</p></a>";
															}
															elseif($status == "Accepted")
															{
																echo"<a href='coachprofile.php?id=".$coachusername."'><p>Organised By : ".$row["Oname"]."</p></a>";
															}
														}
													}
												}
												else
												{
													echo"<p>Organised By : ".$row["Oname"]."</p>";
												}
											echo"</div>
											<div class='column procol6'>
												<h3>Venue : ".$row["venue"]."</h3>
												<p>No of Joined Participants : ".$row["participants"]."/".$row["max_participants"]."</p>
												<p>End Time : ".date("g:i a", strtotime($row["end_time"]))."</p>
												<p>Entry Fee : Rs. ".$row["expenses_fees"]."</p>
											</div>
										</div>
										<div class='procol4'>
											<a href='viewevent.php?eid=".$event_id."'><button>View</button></a>
										</div>				
									</div>";				
								}
							}
							if($has == false)
							{
								echo "<div class='procol7'><h3>No events Yet.</h3></div>";
							}
						}
						else 
						{
							echo "<div class='procol7'><h3>No events Yet.</h3></div>";
						}
						?>		
					</div>						
				</div>
				<div id="Closed" class="tabcontent">
					<div class="row">
						<?php
						$has = false;
						$sql="SELECT DISTINCT ev.occasion_id, ev.name, ev.max_participants, ev.participants, ev.venue, ev.held_date, ev.entry_closing_date, ev.start_time, ev.end_time, ev.expenses_fees, a.username, a.Oname, a.user_type FROM (SELECT username, CONCAT(f_name, ' ', l_name) AS 'Oname', user_type FROM player UNION SELECT username, CONCAT(f_name, ' ', l_name) AS 'Oname', user_type FROM coach UNION SELECT username, name AS 'Oname', user_type FROM organiser UNION SELECT username, name AS 'Oname', user_type FROM federation) a, event ev, event_aspect ea, event_sport es WHERE ev.username = a.username AND ev.occasion_id = ea.occasion_id AND ev.occasion_id = es.occasion_id AND (ev.entry_closing_date < (SELECT CURRENT_DATE()) OR ev.participants = ev.max_participants) AND (es.sport = 'ALL' OR es.sport IN (SELECT sport FROM player_sport WHERE username = '" .$uname. "')) AND ev.status = 'Approved' AND a.username != '" .$uname. "'";
						$result = $conn->query($sql);
												  
						if($result->num_rows > 0)
						{
							while($row = $result->fetch_assoc())
							{
								$event_id = $row["occasion_id"];
								$sqll="SELECT DISTINCT * FROM participate WHERE occasion_id = '" .$event_id. "' AND username = '" .$uname. "'";
								$resultt = $conn->query($sqll);
														  
								if($resultt->num_rows < 1)
								{
									$has = true;
									echo"<div class='horitem'>
										<div class='procol5'>
											<h2>".$row["name"]."</h2>
											<div class='column procol6'>
												<h3>Date : ".$row["held_date"]."</h3>
												<p>Entry Closing Date : ".$row["entry_closing_date"]."</p>
												<p>Start Time : ".date("g:i a", strtotime($row["start_time"]))."</p>";
												if($row["user_type"] == "Player")
												{
													$playerusername = $row["username"];
													$sqli="SELECT requester_username, receiver_username, status FROM player_request WHERE (requester_username = '" .$uname. "' AND receiver_username = '" .$playerusername. "') OR (requester_username = '" .$playerusername. "' AND receiver_username = '" .$uname. "')";
													$resulti = $conn->query($sqli);

													if($resulti->num_rows < 1)
													{
														echo"<a href='viewplayer.php?id=".$playerusername."' style='text-decoration: none; color:white;'><p>Organised By : ".$row["Oname"]."</p></a>";
													}
													else
													{
														while($rowi = $resulti->fetch_assoc())
														{
															$status = $rowi["status"];
															if($status == "Pending")
															{
																$requester_username = $rowi["requester_username"];
																$receiver_username = $rowi["receiver_username"];																
																if($requester_username == $uname)
																{
																	echo"<a href='requestedplayer.php?id=".$playerusername."' style='text-decoration: none; color:white;'><p>Organised By : ".$row["Oname"]."</p></a>";
																}
																elseif($receiver_username == $uname)
																{
																	echo"<a href='viewplayerrequest.php?id=".$playerusername."' style='text-decoration: none; color:white;'><p>Organised By : ".$row["Oname"]."</p></a>";
																}
															}
															elseif($status == "Accepted")
															{
																echo"<a href='playerprofile.php?id=".$playerusername."' style='text-decoration: none; color:white;'><p>Organised By : ".$row["Oname"]."</p></a>";
															}
														}
													}											
												}
												elseif($row["user_type"] == "Coach")
												{
													$coachusername = $row["username"];
													$sqli="SELECT status FROM coach_request WHERE requester_username = '" .$uname. "' AND receiver_username = '" .$coachusername. "'";
													$resulti = $conn->query($sqli);

													if($resulti->num_rows < 1)
													{
														echo"<a href='viewcoach.php?id=".$coachusername."' style='text-decoration: none; color:white;'><p>Organised By : ".$row["Oname"]."</p></a>";
													}
													else
													{
														while($rowi = $resulti->fetch_assoc())
														{
															$status = $rowi["status"];
															if($status == "Pending")
															{
																echo"<a href='requestedcoach.php?id=".$coachusername."' style='text-decoration: none; color:white;'><p>Organised By : ".$row["Oname"]."</p></a>";
															}
															elseif($status == "Accepted")
															{
																echo"<a href='coachprofile.php?id=".$coachusername."'><p>Organised By : ".$row["Oname"]."</p></a>";
															}
														}
													}
												}
												else
												{
													echo"<p>Organised By : ".$row["Oname"]."</p>";
												}
											echo"</div>
											<div class='column procol6'>
												<h3>Venue : ".$row["venue"]."</h3>
												<p>No of Joined Participants : ".$row["participants"]."/".$row["max_participants"]."</p>
												<p>End Time : ".date("g:i a", strtotime($row["end_time"]))."</p>
												<p>Entry Fee : Rs. ".$row["expenses_fees"]."</p>
											</div>
										</div>
										<div class='procol4'>
											<a href='#'><button disabled>Registrations Closed</button></a>
										</div>				
									</div>";				
								}
							}
							if($has == false)
							{
								echo "<div class='procol7'><h3>No closed events.</h3></div>";
							}						
						}
						else 
						{
							echo "<div class='procol7'><h3>No closed events.</h3></div>";
						}
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