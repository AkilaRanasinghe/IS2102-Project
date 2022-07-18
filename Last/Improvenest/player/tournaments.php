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
		<div class="row search-form">
			<div class="column procol4">
				<h1>Tournaments</h1>
			</div>
			<div class="column procol5" style="padding-top:25px;">
				<form action="searchtournament.php" method="POST">
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
					$sql="SELECT DISTINCT * FROM (SELECT username, name AS 'Oname', user_type FROM organiser UNION SELECT username, name AS 'Oname', user_type FROM federation) a, tournament t WHERE a.username = t.username AND (t.entry_closing_date >= (SELECT CURRENT_DATE()) AND t.participants < t.max_participants) AND (t.sport = 'ALL' OR t.sport IN (SELECT sport FROM player_sport WHERE username = '" .$uname. "')) AND t.status = 'Approved'";
					$result = $conn->query($sql);
											  
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{
							$tournament_id = $row["occasion_id"];
							$sqll="SELECT DISTINCT * FROM participate WHERE occasion_id = '" .$tournament_id. "' AND username = '" .$uname. "'";
							$resultt = $conn->query($sqll);
													  
							if($resultt->num_rows < 1)
							{
								$has = true;
								echo"<div class='horitem'>
									<div class='procol5'>
										<h2>".$row["name"]."</h2>
										<div class='column procol6'>
											<h3>Entry Closing Date : ".$row["entry_closing_date"]."</h3>
											<p>Start Date : ".$row["start_date"]."</p>
											<p>Entry Fee : RS ".$row["entry_fee"]."</p>
											<p>Organised By : ".$row["Oname"]."</p>
										</div>
										<div class='column procol6'>
											<h3>Venue : ".$row["venue"]."</h3>
											<p>End Date : ".$row["end_date"]."</p>
											<p>No of Registered Participants : ".$row["participants"]."/".$row["max_participants"]."</p>
											<p>Sport : ".$row["sport"]."</p>
										</div>
									</div>
									<div class='procol4'>
										<a href='viewtournament.php?tid=".$tournament_id."'><button>View</button></a>
									</div>				
								</div>";				
							}
						}
						if($has == false)
						{
							echo "<div class='procol7'><h3>No tournaments Yet.</h3></div>";
						}
					}
					else 
					{
						echo "<div class='procol7'><h3>No tournaments Yet.</h3></div>";
					}
					?>				
				</div>							
			</div>
			<div id="Closed" class="tabcontent">
				<div class="row">
					<?php
					$has = false;
					$sql="SELECT DISTINCT * FROM (SELECT username, name AS 'Onmae', user_type FROM organiser UNION SELECT username, name AS 'Onmae', user_type FROM federation) a, tournament t WHERE a.username = t.username AND (t.entry_closing_date < (SELECT CURRENT_DATE()) OR t.participants = t.max_participants) AND (t.sport = 'ALL' OR t.sport IN (SELECT sport FROM player_sport WHERE username = '" .$uname. "')) AND t.status = 'Approved'";
					$result = $conn->query($sql);
											  
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{
							$tournament_id = $row["occasion_id"];
							$sqll="SELECT DISTINCT * FROM participate WHERE occasion_id = '" .$tournament_id. "' AND username = '" .$uname. "'";
							$resultt = $conn->query($sqll);
													  
							if($resultt->num_rows < 1)
							{
								$has = true;
								echo"<div class='horitem'>
									<div class='procol5'>
										<h2>".$row["name"]."</h2>
										<div class='column procol6'>
											<h3>Entry Closing Date : ".$row["entry_closing_date"]."</h3>
											<p>Start Date : ".$row["start_date"]."</p>
											<p>Entry Fee : RS ".$row["entry_fee"]."</p>
											<p>Organised By : ".$row["username"]."</p>
										</div>
										<div class='column procol6'>
											<h3>Venue : ".$row["venue"]."</h3>
											<p>End Date : ".$row["end_date"]."</p>
											<p>No of Registered Participants : ".$row["participants"]."/".$row["max_participants"]."</p>
											<p>Sport : ".$row["sport"]."</p>
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
							echo "<div class='procol7'><h3>No closed tournaments.</h3></div>";
						}						
					}
					else 
					{
						echo "<div class='procol7'><h3>No closed tournaments.</h3></div>";
					}
					?>		
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