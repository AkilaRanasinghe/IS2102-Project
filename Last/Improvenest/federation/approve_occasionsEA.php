<?php
include '../php/conn.php';
session_start();
$uname = $_SESSION['uname'];

$event_id = "";

if(isset($_GET["event_id"]))  
{
	$event_id = $_GET["event_id"];
}


$sql = "UPDATE event SET status='approved' where event_id = '".$event_id."'";

if(mysqli_query($conn,$sql))
{
	echo "<script type='text/javascript'>alert('Update Successfull!'); window.location.href='http://localhost/Improvenest/federation/tournamentsapproval.php';</script>";
} 
else
{
	echo "<script type='text/javascript'>alert('Update Failed. Please try again later.'); window.location.href='http://localhost/Improvenest/federation/tournamentsapproval.php';</script>";
}		
		
mysqli_close($conn)
?>

