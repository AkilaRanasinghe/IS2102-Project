<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];

$name = "";
$email = "";
$feedback = "";

if(isset($_POST['Name']))  
{
	$name = $_POST ["Name"];
}
if(isset($_POST['EMail']))  
{
	$email = $_POST ["EMail"];
}
if(isset($_POST['Feedback']))  
{
	$feedback = $_POST ["Feedback"];
}

$sql = "INSERT INTO feedback (username,name,email,feedback,read_status) VALUES ('$uname','$name','$email','$feedback', 'false')";

if(mysqli_query($conn,$sql))
{
	echo "<script type='text/javascript'>alert('Thankyou for contacting us! We will get to you soon!'); history.go(-2);</script>";
}
else
{
	echo "<script type='text/javascript'>alert('Error, please try again later.'); window.location.href='http://localhost/Improvenest/contactus.php';</script>";
}

mysqli_close($conn);
?>