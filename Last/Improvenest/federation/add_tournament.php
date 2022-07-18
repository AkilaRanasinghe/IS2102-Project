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
$entry_closing_date = ($_POST['entry_closing_date']);
$start_date = ($_POST['start_date']);
$end_date = ($_POST['end_date']);
$sport = ($_POST['sport']);
$entry_fee = ($_POST['entry_fee']);
$rules_regulations = ($_POST['rules_regulations']);
$status = ($_POST['status']);



$sql = "INSERT INTO tournament (username,name,max_participants,conditions,contact_no,venue,entry_closing_date,start_date,end_date,sport,entry_fee,rules_regulations,status) VALUES('$uname','$name','$max_participants','$conditions','$contact_no','$venue','$entry_closing_date','$start_date','$end_date','$sport','$entry_fee','$rules_regulations','$status')";

if (mysqli_query($conn, $sql)) {
  // echo "New record successfully";
  echo '<script> alert("Success!");</script>';
  echo '<script> location.href="./tournamentsfederation.php"</script>';
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>