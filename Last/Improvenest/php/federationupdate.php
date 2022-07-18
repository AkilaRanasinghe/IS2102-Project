<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];


$name = "";
$contact_no = "";
$email = "";
$address = "";
$Password = "";

if(isset($_POST['name']))  
{
	$name = $_POST ["name"];
}
if(isset($_POST['contact_no']))  
{
	$contact_no = $_POST ["contact_no"];
}
if(isset($_POST['email']))  
{
	$email = $_POST ["email"];
}
if(isset($_POST['address']))  
{
	$address = $_POST ["address"];
}
if(isset($_POST['Password']))  
{
	$Password = $_POST ["Password"];
}
$sql = "UPDATE federation SET contact_no='$contact_no', email='$email', address='$address', password='$Password', name='$name' where username = '".$uname."'";

if(mysqli_query($conn,$sql))
{
	echo "<script type='text/javascript'>alert('Update Successfull!'); window.location.href='http://localhost/Improvenest/federation/federationprofile.php';</script>";
} 
else
{
	echo "<script type='text/javascript'>alert('Update Failed. Please try again later.'); window.location.href='http://localhost/Improvenest/federation/editprofile.php';</script>";
}		
		
mysqli_close($conn)
?>