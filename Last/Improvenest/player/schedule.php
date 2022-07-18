<?php
include '../php/conn.php';
include '../php/calendar.php';
session_start();
$uname = $_SESSION['uname'];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/calender.css">
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
		$today = "2022-04-05";		
		$calendar = new Calendar($today);
		
		$sql="SELECT DISTINCT * FROM participate WHERE username = '" .$uname. "'";
		$result = $conn->query($sql);
										  
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$colour = "";
				$time = "";
				$id = $row["occasion_id"];
				$date = $row["date"];
				$status = $row["status"];
				if($row["start_time"] != "" && $row["end_time"] != "")
				{
					$stime = date("g:i a", strtotime($row["start_time"]));
					$etime = date("g:i a", strtotime($row["end_time"]));
					$time = $stime." - ".$etime;
				}				
				
				$sqli="SELECT * FROM (SELECT occasion_id, name, venue, occasion_type FROM event UNION SELECT occasion_id, name, venue, occasion_type FROM tournament) a WHERE occasion_id = '" .$id. "'";
				$resulti = $conn->query($sqli);
												  
				if($resulti->num_rows > 0)
				{
					while($rowi = $resulti->fetch_assoc())
					{
						$name = $rowi["name"];
						$type = $rowi["occasion_type"];
						$venue = $rowi["venue"];
						if($status == "Approved")
						{
							if($type == "Tournament")
							{
								$colour = "tournament";
							}
							else
							{
								$colour = "session";
							}
							$calendar->add_event($name, $date, 1, $colour, $venue, $time, $id);
						}						
					}
				}
			}
		}	
		?>
		<div class="row">
			<div class="column procol4">
				<h1>My Schedule</h1>
			</div>
			<div class="column procol5">
				<small style="float:right;"> - Tournaments</small><div style="float:right;" id="tournamentindicator"></div><br>
				<small style="float:right;"> - Events</small><div style="float:right;" id="eventindicator"></div>
			</div>	
		</div>
		<div class="content home">
			<?=$calendar?>
		</div> 
	</div>
	<!-----------CONTENTS END-------------->
</div>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>