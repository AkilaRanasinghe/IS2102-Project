<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];




$name = "";
$mobile = "";
$email = "";
$address = "";
$password = "";

if(isset($_POST['uname']))  
{
	$uname = $_POST ["uname"];
}
if(isset($_POST['name']))  
{
	$name = $_POST ["name"];
}
if(isset($_POST['mobile']))  
{
	$mobile = $_POST ["mobile"];
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
	$password = $_POST ["Password"];
}



$sql = "UPDATE organiser SET username='$uname', contact_no='$mobile', name='$name', address='$address', password='$password', email='$email' where username = '$uname'";

if (mysqli_query($conn, $sql)) {
	// echo "New record successfully";
	echo '<script> alert("Success!");</script>';
	echo '<script> location.href="../organizer/profile.php"</script>';
  } else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);
  ?>
