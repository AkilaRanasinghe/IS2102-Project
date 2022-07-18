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
		<?php
		if(isset($_GET["eid"]))  
		{
			$eid = $_GET["eid"];
		}
		else
		{
			$eid = $_SESSION['eid'];
		}
		$_SESSION['eid'] = $eid;
		
		$sql = "SELECT * FROM (SELECT username, CONCAT(f_name, ' ', l_name) AS 'Oname', user_type FROM player UNION SELECT username, CONCAT(f_name, ' ', l_name) AS 'Oname', user_type FROM coach UNION SELECT username, name AS 'Oname', user_type FROM organiser UNION SELECT username, name AS 'Oname', user_type FROM federation) a, event e WHERE a.username = e.username AND e.occasion_id = '".$eid."'";

		$result = $conn->query($sql);
								  
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{		
				echo"<div class='row' style='padding:30px;'>
					<div class='procol5'>
						<h1>".$row["name"]."</h1>
						<h3 style='padding-left:10px;'>On&emsp;:&emsp;".$row["held_date"]."&emsp;&emsp;&emsp;&emsp;From&emsp;:&emsp;".date("g:i a", strtotime($row["start_time"]))."&emsp;&emsp;&emsp;&emsp;To&emsp;:&emsp;".date("g:i a", strtotime($row["end_time"]))."</h3>
						<div class='form-popup' id='myForm'>
							<form action='../php/reportevent.php' class='popup-container' method='POST'>
								<h2 style='text-align:center;'>Make Complain</h2>
								
								<select id='compType' name='compType' required>					
								   <option value='Fake Account' selected>Fake Account</option>
								   <option value='Illegal Session'>Illegal Session</option>
								   <option value='Fake News'>Fake News</option>
								   <option value='Other'>Other</option>					   
								</select>								

								<input type='text' name='complaint' placeholder='Complaint' style='padding: 10px;' required>

								<button id='hoverbtn' type='submit' value='Submit'>Submit</button>
								<button type='reset' onclick='closeForm()' style='background-color:#a32626;'>Cancel</button>
							</form>
						</div>					
					</div>
					<div class='procol4'>
						<div class='row'>
							<div class='accept half' style='float:left;'>
								<a style='padding:0px;' href='../php/joinevent.php?eid=".$eid."'><button style='height:80px;'>Join</button></a>
							</div>
							<div class='decline half' style='float:right'>
								<a style='padding:0px;'><button onclick='openForm()' style='height:80px;'>Report</button></a>
							</div>							
						</div>
					</div>
					<table class='protable' cellspacing='2' cellpadding='2' border='0' width='100%'>						
						<tr>
							<td style='width:18%;'>
								<p><b>Venue</b></p>
							</td>
							<td style='width:2%;'>
								<p><b>:</b></p>
							</td>							
							<td style='width:80%;'>
								<p><b>".$row["venue"]."</b></p>
							</td>
						</tr>						
						<tr>
							<td>
								<p><b>Organized By</b></p>
							</td>
							<td>
								<p><b>:</b></p>
							</td>							
							<td>";
								if($row["user_type"] == "Player")
								{
									$playerusername = $row["username"];
									$sqli="SELECT requester_username, receiver_username, status FROM player_request WHERE (requester_username = '" .$uname. "' AND receiver_username = '" .$playerusername. "') OR (requester_username = '" .$playerusername. "' AND receiver_username = '" .$uname. "')";
									$resulti = $conn->query($sqli);

									if($resulti->num_rows < 1)
									{
										echo"<a href='viewplayer.php?id=".$playerusername."' style='text-decoration: none; color:white;'><p><b>".$row["Oname"]."</b></p></a>";
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
													echo"<a href='requestedplayer.php?id=".$playerusername."' style='text-decoration: none; color:white;'><p><b>".$row["Oname"]."</b></p></a>";
												}
												elseif($receiver_username == $uname)
												{
													echo"<a href='viewplayerrequest.php?id=".$playerusername."' style='text-decoration: none; color:white;'><p><b>".$row["Oname"]."</b></p></a>";
												}
											}
											elseif($status == "Accepted")
											{
												echo"<a href='playerprofile.php?id=".$playerusername."' style='text-decoration: none; color:white;'><p><b>".$row["Oname"]."</b></p></a>";
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
										echo"<a href='viewcoach.php?id=".$coachusername."' style='text-decoration: none; color:white;'><p><b>".$row["Oname"]."</b></p></a>";
									}
									else
									{
										while($rowi = $resulti->fetch_assoc())
										{
											$status = $rowi["status"];
											if($status == "Pending")
											{
												echo"<a href='requestedcoach.php?id=".$coachusername."' style='text-decoration: none; color:white;'><p><b>".$row["Oname"]."</b></p></a>";
											}
											elseif($status == "Accepted")
											{
												echo"<a href='coachprofile.php?id=".$coachusername."'><p><b>".$row["Oname"]."</b></p></a>";
											}
										}
									}
								}
								else
								{
									echo"<p><b>".$row["Oname"]."</b></p>";
								}
							echo"</td>
						</tr>						
						<tr>
							<td>
								<p>Contact No</p>
							</td>
							<td>
								<p><b>:</b></p>
							</td>								
							<td>
								<p>".$row["contact_no"]."</p>
							</td>
						</tr>
						<tr>
							<td>
								<p>Entry Closing Date</p>
							</td>
							<td>
								<p><b>:</b></p>
							</td>								
							<td>
								<p>".$row["entry_closing_date"]."</p>
							</td>
						</tr>
						<tr>
							<td>
								<p>Entry Fee</p>	
							</td>
							<td>
								<p><b>:</b></p>
							</td>								
							<td>
								<p>Rs. ".$row["expenses_fees"]."</p>	
							</td>
						</tr>
						<tr>
							<td>
								<p>Sport</p>	
							</td>
							<td>
								<p><b>:</b></p>
							</td>								
								<td>";
									$sqlll = "SELECT * FROM event_sport WHERE occasion_id = '".$eid."'";
									$resulttt = $conn->query($sqlll);
									
									if($resulttt->num_rows > 0)
									{
										$dataa = array();
										while($rowww = $resulttt->fetch_assoc())
										{
											$dataa[] = $rowww["sport"];
										}
										for($x = 0 ; $x < count($dataa) ; $x++)
										{
											print_r($dataa[$x]);echo"&emsp;&emsp;";
										}
									}
								echo"</td>
						</tr>
						<tr>
							<td>
								<p>Event Aspects</p>	
							</td>
							<td>
								<p><b>:</b></p>
							</td>								
								<td>";
									$sqlli = "SELECT * FROM event_aspect WHERE occasion_id = '".$eid."'";
									$resultti = $conn->query($sqlli);
									
									if($resultti->num_rows > 0)
									{
										$datai = array();
										while($rowwi = $resultti->fetch_assoc())
										{
											$datai[] = $rowwi["aspect"];
										}
										for($x = 0 ; $x < count($datai) ; $x++)
										{
											print_r($datai[$x]);echo"&emsp;&emsp;";
										}
									}
								echo"</td>
						</tr>						
						<tr>
							<td style='vertical-align:top;'>
								<p>Conditions</p>	
							</td>
							<td style='vertical-align:top;'>
								<p><b>:</b></p>
							</td>							
							<td>
								<p style='text-align: justify;text-justify: inter-word;'>".nl2br($row["conditions"])."</p>	
							</td>
						</tr>					
					</table>
				</div>";
			}
		}
		?>
	</div>
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