<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];



$mobile = "";
$address = "";
$password = "";


if(isset($_POST['Contact']))  
{
	$mobile = $_POST ["Contact"];
}

if(isset($_POST['Address']))  
{
	$address = $_POST ["Address"];
}
if(isset($_POST['Password']))  
{
	$password = $_POST ["Password"];
}

$sql = "UPDATE admin SET contact_no='$mobile', address='$address', password='$password' where username = '".$uname."'";

if(mysqli_query($conn,$sql))
{
	echo "<script type='text/javascript'>alert('Update Successfull!'); window.location.href='http://localhost/Improvenest/admin/profile.php';</script>";
} 
else
{
	echo "<script type='text/javascript'>alert('Update Failed. Please try again later.'); window.location.href='http://localhost/Improvenest/admin/profile.php';</script>";
}		
		
mysqli_close($conn)
?>