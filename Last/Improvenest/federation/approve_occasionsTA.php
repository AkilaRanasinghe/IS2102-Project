<?php
include '../php/conn.php';
session_start();
$uname = $_SESSION['uname'];

$tournament_id = "";


if(isset($_GET["tournament_id"]))  
{
	$tournament_id = $_GET["tournament_id"];
}


$sql = "UPDATE tournament SET status = 'approved' where tournament_id = '".$tournament_id."'";

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