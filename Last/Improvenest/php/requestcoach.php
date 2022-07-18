<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];

$id = "";
$status = "Pending";

if(isset($_GET["id"]))  
{
	$id = $_GET["id"];
}

$sql = "INSERT INTO coach_request (requester_username,receiver_username,status) VALUES ('$uname','$id','$status')";

if(mysqli_query($conn,$sql))
{
	echo "<script type='text/javascript'>alert('Request Sent'); window.location.href='http://localhost/Improvenest/player/coaches.php';</script>";
} 
else
{
	echo "<script type='text/javascript'>alert('Failed to send request. Please try again later.'); window.location.href='http://localhost/Improvenest/player/coaches.php';</script>";
}	
		
mysqli_close($conn)
?>