<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];

$id = "";

if(isset($_GET["id"]))  
{
	$id = $_GET["id"];
}

$sql = "DELETE FROM coach_request WHERE (requester_username = '".$uname."' AND receiver_username = '".$id."') OR (requester_username = '".$id."' AND receiver_username = '".$uname."')";

if(mysqli_query($conn,$sql))
{
	echo "<script type='text/javascript'>alert('Player removed!'); window.location.href='http://localhost/Improvenest/coach/trainees.php';</script>";
} 
else
{
	echo "<script type='text/javascript'>alert('Failed to remove player. Please try again later.'); window.location.href='http://localhost/Improvenest/coach/trainees.php';</script>";
}	
		
mysqli_close($conn)
?>