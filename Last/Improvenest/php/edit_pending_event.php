<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];
$id = $_SESSION['id'];


$name = "";
$max_participants = "";
$conditions = "";
$contact_no = "";
$venue = "";
$held_date = "";
$entry_closing_date = "";
$start_time = "";
$end_time = "";
$expenses_fees = "";
$event_type = "";

if(isset($_POST['name']))  
{
	$name = $_POST ["name"];
}
if(isset($_POST['max_participants']))  
{
	$max_participants = $_POST ["max_participants"];
}
if(isset($_POST['conditions']))  
{
	$conditions = $_POST ["conditions"];
}
if(isset($_POST['contact_no']))  
{
	$contact_no = $_POST ["contact_no"];
}
if(isset($_POST['venue']))  
{
	$venue = $_POST ["venue"];
}
if(isset($_POST['held_date']))  
{
	$held_date = $_POST ["held_date"];
}
if(isset($_POST['entry_closing_date']))  
{
	$entry_closing_date = $_POST ["entry_closing_date"];
}
if(isset($_POST['start_time']))  
{
	$start_time = $_POST ["start_time"];
}
if(isset($_POST['end_time']))  
{
	$end_time = $_POST ["end_time"];
}
if(isset($_POST['expenses_fees']))  
{
	$expenses_fees = $_POST ["expenses_fees"];
}
if(isset($_POST['event_type']))  
{
	$event_type = $_POST ["event_type"];
}


$sql = "UPDATE event SET name='$name', max_participants='$max_participants', conditions='$conditions', contact_no='$contact_no', venue='$venue', held_date='$held_date', entry_closing_date='$entry_closing_date', start_time='$start_time', end_time='$end_time', expenses_fees='$expenses_fees', event_type='$event_type' where occasion_id = '$id'";

if (mysqli_query($conn, $sql)) {
	// echo "New record successfully";
	echo '<script> alert("Success!");</script>';
	echo '<script> location.href="../organizer/viewPendingEvent.php"</script>';
  } else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);
  ?>
