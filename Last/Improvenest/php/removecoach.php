<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];

$id = "";

if(isset($_GET["id"]))  
{
	$id = $_GET["id"];
}

$sql = "DELETE FROM coach_request WHERE requester_username = '".$uname."' AND receiver_username = '".$id."'";

if(mysqli_query($conn,$sql))
{
	echo "<script type='text/javascript'>alert('Coach removed!'); window.location.href='http://localhost/Improvenest/player/coaches.php';</script>";
} 
else
{
	echo "<script type='text/javascript'>alert('Failed to remove coach. Please try again later.'); window.location.href='http://localhost/Improvenest/player/mycoaches.php';</script>";
}	
		
mysqli_close($conn)
?>