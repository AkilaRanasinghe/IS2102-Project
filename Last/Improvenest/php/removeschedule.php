<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];

$id = "";
$date = "";

if(isset($_GET["id"]))  
{
	$id = $_GET["id"];
}
if(isset($_GET["date"]))  
{
	$date = $_GET["date"];
}

$sql = "UPDATE participate SET status = 'Inactive' WHERE username = '".$uname."' AND occasion_id = '".$id."' AND date = '".$date."'";

if(mysqli_query($conn,$sql))
{
	echo "<script type='text/javascript'>alert('Session Hided!'); window.location.href='http://localhost/Improvenest/player/schedule.php';</script>";
} 
else
{
	echo "<script type='text/javascript'>alert('Failed to hide session. Please try again later.'); window.location.href='http://localhost/Improvenest/player/schedule.php';</script>";
}	

mysqli_close($conn)

?>