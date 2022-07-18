<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];
$eid = $_SESSION['eid'];
date_default_timezone_set('Asia/Colombo');
$notfidate = date('Y-m-d', time());
$time = date("H:i:s", time());
$status = "Approved";

$sql = "SELECT * FROM event WHERE occasion_id = '" .$eid. "'";

$result = $conn->query($sql);

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		$name = $name = $row["name"];
		$date = $row["held_date"];
		$stime = $row["start_time"];
		$etime = $row["end_time"];
		$venue = $row["venue"];
		$fee = $row["expenses_fees"];
		$participants = $row["participants"];
	}
}

$start = date("g:i a", strtotime($row["start_time"]));
$end = date("g:i a", strtotime($row["end_time"]));
$new_participants = $participants + 1;

$notification = "You have successfully joined the event $name which will be held on $date from $start to $end at the $venue premisis by paying the entree fee of LKR $fee.";

$sql = "INSERT INTO participate (username,occasion_id,date,start_time,end_time,status) VALUES ('$uname','$eid','$date','$stime','$etime','$status');";
$sql .= "INSERT INTO player_notification (player_username,date,time,notification) VALUES ('$uname','$notfidate','$time','$notification');";
$sql .= "UPDATE event SET participants = '".$new_participants."' WHERE occasion_id = '".$eid."';";

if($conn->multi_query($sql)) 
{ 
	echo "<script type='text/javascript'>alert('Successfully joined the event!'); window.location.href='http://localhost/Improvenest/player/events.php';</script>"; 	
} 
else
{
	echo "<script type='text/javascript'>alert('Failed to join event! Please try again later.'); window.location.href='http://localhost/Improvenest/player/events.php';</script>";
}

mysqli_close($conn);
?>