<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];
$id = $_SESSION['id'];


$name = "";
$max = "";
$conditions = "";
$contact = "";
$venue = "";
$entryClosing = "";
$startDate = "";
$endDate = "";
$sport = "";
$entryFee = "";
$rules = "";

if(isset($_POST['name']))  
{
	$name = $_POST ["name"];
}
if(isset($_POST['max']))  
{
	$max = $_POST ["max"];
}
if(isset($_POST['condition']))  
{
	$conditions = $_POST ["condition"];
}
if(isset($_POST['contact']))  
{
	$contact = $_POST ["contact"];
}
if(isset($_POST['venue']))  
{
	$venue = $_POST ["venue"];
}
if(isset($_POST['rcDate']))  
{
	$entryClosing = $_POST ["rcDate"];
}
if(isset($_POST['sDate']))  
{
	$startDate = $_POST ["sDate"];
}
if(isset($_POST['eDate']))  
{
	$endDate = $_POST ["eDate"];
}
if(isset($_POST['sport']))  
{
	$sport = $_POST ["sport"];
}
if(isset($_POST['eFee']))  
{
	$entryFee = $_POST ["eFee"];
}
if(isset($_POST['rules']))  
{
	$rules = $_POST ["rules"];
}


$sql = "UPDATE tournament SET name='$name', max_participants='$max', conditions='$conditions', contact_no='$contact', venue='$venue', entry_closing_date='$entryClosing', start_date='$startDate', end_date='$endDate', sport='$sport', entry_fee='$entryFee', rules_regulations='$rules' where occasion_id = $id";

if (mysqli_query($conn, $sql)) {
	// echo "New record successfully";
	echo '<script> alert("Success!");</script>';
	echo '<script> location.href="../organizer/viewPendingTournament.php"</script>';
  } else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);
  ?>
