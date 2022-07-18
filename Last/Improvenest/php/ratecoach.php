<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];
$id = $_SESSION['id'];

$rate = "";
$review = "";

if(isset($_POST['Rate']))  
{
	$rate = $_POST ["Rate"];
}
if(isset($_POST['Review']))  
{
	$review = $_POST ["Review"];
}

$sql = "UPDATE coach_request SET stars='$rate', review='$review' WHERE requester_username = '".$uname."' AND receiver_username = '".$id."'";

if(mysqli_query($conn,$sql))
{
	echo "<script type='text/javascript'>alert('Thankyou for rating your coach!'); window.location.href='http://localhost/Improvenest/player/coachprofile.php';</script>";
} 
else
{
	echo "<script type='text/javascript'>alert('Failed to rate coach. Please try again later.'); window.location.href='http://localhost/Improvenest/player/coachprofile.php';</script>";
}	
		
mysqli_close($conn)
?>