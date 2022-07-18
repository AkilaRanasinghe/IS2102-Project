<?php
include '../php/conn.php';
session_start();



$uname = $_SESSION['uname'];
$name = ($_POST['name']);
$maxp = ($_POST['maxp']);
$hdate = ($_POST['hdate']);
$rcdate = ($_POST['rcdate']);
$starttime = ($_POST['starttime']);
$endtime =($_POST['endtime']);
$etype = ($_POST['etype']);
$entryfee = ($_POST['entryfee']);
$venue = ($_POST['venue']);
$contact = ($_POST['contact']);
$condition = ($_POST['condition']);
$next = "";
$status = "PENDING";
$occasion_type = "Event";
$current = 0;

$Focus = ($_POST['Focus']);
$sport = ($_POST['sport']);

$chk = "";



$sql1 = "SELECT contact_no FROM organiser where username = '" .$uname. "'";
$result1 = $conn->query($sql1);

if($result1->num_rows > 0)
{
	$data = array();
	while($row1 = $result1->fetch_assoc())
	{
		$phone = $row1["contact_no"];
	}
}

$sql2 = "SELECT occasion_id FROM event UNION SELECT occasion_id FROM tournament";
$result2 = $conn->query($sql2);
													  
if($result2->num_rows > 0)
{
	$data = array();
	while($row2 = $result2->fetch_assoc())
	{
		$data[] = $row2["occasion_id"];
	}
	$next = max($data) + 1; 
}
else
{
	$next = 1;
}

#$sql = "INSERT INTO event (occasion_id,username,name,max_participants,conditions,contact_no,venue,held_date,entry_closing_date,start_time,end_time,expenses_fees,status,occassion_type,event_type,participants) VALUES('$next','$uname','$name','$maxp','$condition','$contact','$venue','$hdate','$rcdate','$starttime','$endtime','$entryfee','pending','Event','$etype', '$current');";
#$sql = "INSERT INTO event (username, name, max_participants, held_date, entry_closing_date, start_time, event_type, expenses_fees, venue, contact_no, conditions, occasion_id, status, occasion_type, participants) VALUES ('$uname', '$name', '$maxp', '$hdate', '$rcdate', '$starttime', '$endtime', '$etype', '$entryfee', '$venue', '$contact', '$condition', '$next', '$status', '$occasion_type', '$current')";
$sql = "INSERT INTO event (occasion_id,username,name,max_participants,participants,contact_no,venue,held_date,entry_closing_date,start_time,end_time,expenses_fees,status,occasion_type,event_type) VALUES ('$next','$uname','$name','$maxp','$current','$contact','$venue','$hdate','$rcdate','$starttime','$endtime','$entryfee','$status','$occasion_type','$etype');";

$sql .= "INSERT INTO event_sport (occasion_id,sport) VALUES ('$next','$sport');";


if($conn->multi_query($sql)) 
{	
	while ($conn->more_results() && $conn->next_result());
	foreach($Focus as $chk)
	{
		$query1 = "INSERT INTO event_aspect (occasion_id,aspect) VALUES ('$next','$chk')";
		$query_run = mysqli_query($conn, $query1);
	}  
	if($query_run)  
	{  
		echo "<script type='text/javascript'>alert('Group Training Session Added!'); window.location.href='http://localhost/Improvenest/organizer/event.php';</script>";
	}  
	else  
	{  
		echo "<script type='text/javascript'>alert('Failed to add group training session 1'); window.location.href='http://localhost/Improvenest/organizer/event.php';</script>"; 	
	}
} 

else
{
	echo "<script type='text/javascript'>alert('Failed to add group training session 2'); window.location.href='http://localhost/Improvenest/organizer/event.php';</script>";
}

mysqli_close($conn);
?>