<?php
include 'conn.php';
$sname="";
$helddate="";
$closedate="";
$stime="";
$etime="";
$location="";
$maxpart="";
$fees="";
$sport="";

if(isset($_POST["update"])){
if(isset($_POST["SName"])){
  $sname = $_POST["SName"];
}
if (isset($_POST['HeldDate'])) {
  $helddate = $_POST['HeldDate'];
}
if (isset($_POST['CloseDate'])){
  $closedate = $_POST['CloseDate'];
}
if (isset($_POST['STime'])){
  $stime = $_POST['STime'];
}
if (isset($_POST['ETime'])){
  $etime = $_POST['ETime'];
}
if (isset($_POST['Location'])){
  $location = $_POST['Location'];
}
if (isset($_POST['Participants'])){
  $maxpart = $_POST['Participants'];
}
if (isset($_POST['Expenses'])){
  $fees = $_POST['Expenses'];
}

if (isset($_POST['id'])){
  $occasion = $_POST['id'];
}

if(isset($_POST["Sport"])){
  $sport = $_POST["Sport"];
}

if(isset($_POST['Focus']))
{
	$focus = $_POST ["Focus"];
}

$sql1= "UPDATE event  SET name = '$sname', max_participants='$maxpart', venue='$location',
held_date='$helddate', entry_closing_date='$closedate', start_time='$stime', end_time='$etime', expenses_fees='$fees' WHERE occasion_id='$occasion'; ";

$sql2 = "UPDATE event_sport SET sport = '$sport' WHERE occasion_id='$occasion';";

$sql3 = "DELETE FROM event_aspect WHERE occasion_id = '".$occasion."';";

if(mysqli_query($conn,$sql1) && mysqli_query($conn,$sql2))
{
  if (mysqli_query($conn,$sql3))
  {
    foreach($focus as $chk)
    {
      $query = "INSERT INTO event_aspect (occasion_id,aspect) VALUES ('$occasion','$chk')";
      $query_run = mysqli_query($conn, $query);
    }
  }
}



$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);

if($result1 && $result2){
  //echo "Error:". $sql . "<br />" . mysqli_error($conn);
  echo "<script type='text/javascript'>alert('Update Successfull!'); window.location.href='http://localhost/Improvenest/Coach/events.php';</script>";
}
else
{
  echo "Error:". $sql . "<br />" . mysqli_error($conn);
  //echo "<script type='text/javascript'>alert('Update Failed. Please try again later.'); window.location.href='http://localhost/Improvenest/Coach/events.php';</script>";
}
}
