<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];

$status = "Inactive";

$sql = "UPDATE player SET account_status='$status' WHERE username = '".$uname."'";

if(mysqli_query($conn,$sql))
{
	session_destroy();
	echo "<script type='text/javascript'>alert('Profile successfully deleted! Redirecting to home page.'); window.location.href='http://localhost/Improvenest/index.php';</script>";
} 
else
{
	echo "<script type='text/javascript'>alert('Failed to delete profile. Please try again later.'); window.location.href='http://localhost/Improvenest/player/profile.php';</script>";
}	
		
mysqli_close($conn)
?>