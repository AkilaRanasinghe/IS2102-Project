<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];
$id = $_REQUEST['id'];




$sql = "UPDATE feedback SET read_status='true' where feedback_id = $id";

if (mysqli_query($conn, $sql)) {
	// echo "New record successfully";
	echo '<script> alert("Marked as Read!");</script>';
	echo '<script> location.href="../admin/contactus.php"</script>';
  } else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);
  ?>
