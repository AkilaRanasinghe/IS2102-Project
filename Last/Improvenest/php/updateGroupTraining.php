<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];

$occasion = "";
$sname = "";
$location = "";
$participants = "";
$closedate = "";
$focus = "";
$chk = "";

if(isset($_POST['occasionid']))  
{
	$occasion = $_POST ["occasionid"];
}
if(isset($_POST['SName']))  
{
	$sname = $_POST ["SName"];
}
if(isset($_POST['Location']))  
{
	$location = $_POST ["Location"];
}
if(isset($_POST['Participants']))  
{
	$participants = $_POST ["Participants"];
}
if(isset($_POST['CloseDate']))  
{
	$closedate = $_POST ["CloseDate"];
}
if(isset($_POST['Focus']))  
{
	$focus = $_POST ["Focus"];
}

$sql = "UPDATE event SET name='$sname', max_participants='$participants', venue='$location', entry_closing_date='$closedate' where occasion_id = '".$occasion."';";
$sql .= "DELETE FROM event_aspect WHERE occasion_id = '".$occasion."';";

if($conn->multi_query($sql)) 
{
	while ($conn->more_results() && $conn->next_result());
	foreach($focus as $chk)
	{
		$query = "INSERT INTO event_aspect (occasion_id,aspect) VALUES ('$occasion','$chk')";
		$query_run = mysqli_query($conn, $query);
	} 	 
	if($query_run)  
	{

		echo "<script type='text/javascript'>alert('Update Successfull!'); window.location.href='http://localhost/Improvenest/player/myevents.php';</script>";
	}  
	else  
	{  
		echo "<script type='text/javascript'>alert('Failed to update sports. Please try again later.'); window.location.href='http://localhost/Improvenest/player/editgrouptrainingsession.php';</script>"; 	
	}
} 
else
{
	echo "<script type='text/javascript'>alert('Update Failed. Please try again later.'); window.location.href='http://localhost/Improvenest/player/editgrouptrainingsession.php';</script>";
}		
	
mysqli_close($conn)
?>