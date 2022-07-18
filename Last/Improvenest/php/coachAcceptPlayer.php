<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];

$id = "";
$status = "Accepted";

if(isset($_GET["id"]))
{
	$id = $_GET["id"];
}

$sql = "UPDATE coach_request SET status='$status' where requester_username = '".$id."' AND receiver_username = '".$uname."'";

if(mysqli_query($conn,$sql))
{
	echo "<script type='text/javascript'>alert('Request Accepted'); window.location.href='http://localhost/Improvenest/coach/trainees.php';</script>";
}
else
{
	echo "<script type='text/javascript'>alert('Failed to accept request. Please try again later.'); window.location.href='http://localhost/Improvenest/coach/trainees.php';</script>";
}

mysqli_close($conn)
?>
