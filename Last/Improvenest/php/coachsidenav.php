<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];

$sql= "SELECT * FROM coach WHERE username = '$uname';";
$result = mysqli_query($conn,$sql);
$resultchk = mysqli_num_rows($result);

if($resultchk>0){
	$row = mysqli_fetch_assoc($result);}

$ssql= "SELECT * FROM coach_sport WHERE username = '$uname';";
$result_2 = mysqli_query($conn,$ssql);
$resultchk_2 = mysqli_num_rows($result_2);?>

<div class="column sidenav">
    <div class="row">
        <img <?php echo "src='data:image/jpeg;base64,".base64_encode($row['picture'])."'" ?> alt="profile picture">
        <h3 style="color:white;padding-top:7%; float:right">Hello <?php echo $row['f_name']  ?> !</h3>
    </div>
		<a class="normal" href="profile.php">MY PROFILE</a>
    <a class="normal" href="news.php">NEWS</a>
    <a class="normal" href="schedule.php">SCHEDULE</a>
    <a class="normal" href="trainees.php">TRAINEES</a>
    <a class="normal" href="events.php">EVENTS</a>
    <a class="normal" href="shops.php">SHOPS</a>
</div>
