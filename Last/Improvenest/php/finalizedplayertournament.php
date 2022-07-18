<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];
$tid = $_SESSION['tid'];
date_default_timezone_set('Asia/Colombo');
$notfidate = date('Y-m-d', time());
$time = date("H:i:s", time());
$status = "Approved";

$sql = "SELECT * FROM tournament WHERE occasion_id = '" .$tid. "'";

$result = $conn->query($sql);

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		$name = $row["name"];
		$venue = $row["venue"];
		$sdate = $row["start_date"];
		$edate = $row["end_date"];
		$fee = $row["entry_fee"];
		$participants = $row["participants"];
	}
}

$begin = new DateTime($sdate);
$end = new DateTime($edate);
$end = $end->modify('+1 day');
$interval = new DateInterval('P1D');
$daterange = new DatePeriod($begin, $interval ,$end);

$new_participants = $participants + 1;

$notification = "You have successfully joined the tournament $name which will be held from $sdate to $edate at the $venue premisis by paying the entree fee of LKR $fee.";

$sql = "INSERT INTO player_notification (player_username,date,time,notification) VALUES ('$uname','$notfidate','$time','$notification');";
$sql .= "UPDATE tournament SET participants = '".$new_participants."' WHERE occasion_id = '".$tid."';";

if($conn->multi_query($sql)) 
{
	while ($conn->more_results() && $conn->next_result());
	foreach($daterange as $date)
	{
		$date = $date->format('Y-m-d');
		$query = "INSERT INTO participate (username,occasion_id,date,status) VALUES ('$uname','$tid','$date','$status')";
		$query_run = mysqli_query($conn, $query);		
	}	 
	if($query_run)  
	{
		echo "<script type='text/javascript'>alert('Successfully registered to the tournament!'); window.location.href='http://localhost/Improvenest/player/tournaments.php';</script>";
	}  
	else  
	{  
		echo "<script type='text/javascript'>alert('Failed registered to the tournament! Please try again later.'); window.location.href='http://localhost/Improvenest/player/tournaments.php';</script>";
	}
} 
else
{
	echo "<script type='text/javascript'>alert('Failed registered to the tournament! Please try again later.'); window.location.href='http://localhost/Improvenest/player/tournaments.php';</script>";
}

mysqli_close($conn);
?>