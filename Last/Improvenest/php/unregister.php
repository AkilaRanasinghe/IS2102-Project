<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];
date_default_timezone_set('Asia/Colombo');
$notfidate = date('Y-m-d', time());
$time = date("H:i:s", time());

if(isset($_GET["id"]))  
{
	$id = $_GET["id"];
}

$sqli="SELECT * FROM (SELECT occasion_id, name, participants, occasion_type FROM event UNION SELECT occasion_id, name, participants, occasion_type FROM tournament) a WHERE occasion_id = '" .$id. "'";
$resulti = $conn->query($sqli);
												  
if($resulti->num_rows > 0)
{
	while($rowi = $resulti->fetch_assoc())
	{
		$name = $name = $rowi["name"];
		$participants = $rowi["participants"];
		$type = $rowi["occasion_type"];
	}
}

$new_participants = $participants - 1;

$notification = "You have successfully unregistered from the $type $name. Please note that no refund will be available for this unregistration!";

if($type == "Tournament")
{
	$sql = "DELETE FROM participate WHERE username = '".$uname."' AND occasion_id = '".$id."';";
	$sql .= "INSERT INTO player_notification (player_username,date,time,notification) VALUES ('$uname','$notfidate','$time','$notification');";
	$sql .= "UPDATE tournament SET participants = '".$new_participants."' WHERE occasion_id = '".$id."';";	
}
else
{
	$sql = "DELETE FROM participate WHERE username = '".$uname."' AND occasion_id = '".$id."';";
	$sql .= "INSERT INTO player_notification (player_username,date,time,notification) VALUES ('$uname','$notfidate','$time','$notification');";
	$sql .= "UPDATE event SET participants = '".$new_participants."' WHERE occasion_id = '".$id."';";	
	
}

if($conn->multi_query($sql)) 
{ 
	echo "<script type='text/javascript'>alert('Unregistration Successfull!'); window.location.href='http://localhost/Improvenest/player/schedule.php';</script>"; 	
} 
else
{
	echo "<script type='text/javascript'>alert('Failed to unregister session! Please try again later.'); window.location.href='http://localhost/Improvenest/player/schedule.php';</script>";
}

mysqli_close($conn);
?>