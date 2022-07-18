<?php
include '../php/coachcalendar.php';
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
	<?php include '../php/coachsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<?php
		$today = date('Y-m-d', time());
		$calendar = new Calendar($today);

		$sql= "SELECT DISTINCT * FROM event WHERE username = '" .$uname. "'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			while($row= mysqli_fetch_assoc($result)){
				$color="";
				$time="";
				$id = $row["occasion_id"];
				$date = $row['held_date'];
				$status=$row['status'];
				$eventname=$row['name'];
				$type=$row['occasion_type'];
				$venue=$row['venue'];
				if($row["start_time"] != "" && $row["end_time"] != "")
				{
					$stime = date("g:i a", strtotime($row["start_time"]));
					$etime = date("g:i a", strtotime($row["end_time"]));
					$time = $stime." - ".$etime;
				}
				if($status == "Approved")
				{
					$color = "session";
					$calendar->add_event($eventname, $date, 1, $color, $venue, $time, $id);
				}

			}
		}

			/*if(mysqli_num_rows($result)>0){

			echo(mysqli_num_rows($result));
			while($row = $result->fetch_assoc())
			{
				$colour = "";
				$time = "";
				$id = $row["occasion_id"];
				$date = $row["date"];
				$status = $row["status"];
				$name = $row["name"];
				$type = $row["occasion_type"];
				$venue = $row["venue"];
				if($row["start_time"] != "" && $row["end_time"] != "")
				{
					$stime = date("g:i a", strtotime($row["start_time"]));
					$etime = date("g:i a", strtotime($row["end_time"]));
					$time = $stime." - ".$etime;
				}

				if($status == "Active")
				{
					$colour = "session";
					$calendar->add_event($name, $date, 1, $colour, $venue, $time, $id);
				}
			}
		}*/
		?>
		<div class="row">
			<div class="column procol4">
				<h1>My Schedule</h1>
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
