<?php
include "../php/conn.php";
session_start();
$uname = $_SESSION['uname'];
?>

<?php
$name= ($_POST['name']);
$max_participants= ($_POST['max_participants']);
// $participants= ($_POST['participants']);
$conditions= ($_POST['conditions']);
$contact_no = ($_POST['contact_no']);
$venue = ($_POST['venue']);
$held_date = ($_POST['held_date']);
$entry_closing_date = ($_POST['entry_closing_date']);
$start_time = ($_POST['start_time']);
$end_time = ($_POST['end_time']);
$expenses_fees = ($_POST['expenses_fees']);
$status = ($_POST['status']);
$event_type = ($_POST['event_type']);





$sql = "INSERT INTO event (username,name,max_participants,participants,conditions,contact_no,venue,held_date,entry_closing_date,start_time,end_time,expenses_fees,status,event_type) VALUES('$uname','$name','$max_participants','$participants','$conditions','$contact_no','$venue','$held_date','$entry_closing_date','$start_time','$end_time','$expenses_fees','$status','$event_type')";

if (mysqli_query($conn, $sql)) {
  // echo "New record successfully";
  echo '<script> alert("Success!");</script>';
  echo '<script> location.href="./eventsfederation.php"</script>';
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>