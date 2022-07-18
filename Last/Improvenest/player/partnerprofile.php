<?php
include '../php/conn.php';
session_start();
$uname = $_SESSION['uname'];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<script>
function remove_partner()
{
	if(confirm("Are you sure you want to remove partner?"))
	{
		window.location.href="#";
	}
}
function report_partner() {
	let text;
	let complaint = prompt("Please enter your complaint :", "");
	if (complaint == null || complaint == "") {
		window.location.href="#";
	} 
	else {
		window.location.href="#";
	}
}
</script>
</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/playersidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row">
			<div class="column procol1">
				<img src="../images/avatar.png" alt="Avatar">
			</div>
			<div class="column procol2">
				<h1>Ross Geller</h1>
				<p>Male</p>
				<p>United Kingdom</p>
				<p>Mixed Martial Arts</p>
				<p>0765478521</p>
			</div>
			<div class="column procol3">
				<p>No 57, MainStreet, Kaduwela, Colombo</p>
				<p>08/10/1996</p>
				<p>rossgeller@gmail.com</p>		
			</div>
		</div>
		<br/><br/>
		<div class="row" style="padding:10px 0px 10px 150px;overflow: hidden;background-color: rgba(0, 20, 61, 0.5);box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.5);">
			<div class="column procol4">
				<p>Achievement Level</p>
				<p>Current Fitness Level</p>
				<p>Trainig Aspect</p>
				<p>Usual Training Places</p>
				<p>Notes</p>				
			</div>
			<div class="column procol5">
				<p>:&emsp;&emsp;&emsp;&emsp;Plate Winner</p>
				<p>:&emsp;&emsp;&emsp;&emsp;Competition Level</p>
				<p>:&emsp;&emsp;&emsp;&emsp;Sports Technique</p>
				<p>:&emsp;&emsp;&emsp;&emsp;Western Province&emsp;&emsp;&emsp;&emsp;Colombo District&emsp;&emsp;&emsp;&emsp;Race Course Ground</p>
				<p>:&emsp;&emsp;&emsp;&emsp;Recovering from a leg injury</p>				
			</div>
		</div>
		<div class="row" style="padding:20px 10px 0px 10px;" align="center">
			<div class="column common">
				<a href=""><button onclick="report_partner()">Report</button></a>
			</div>
			<div class="column common">
				<button type='submit' onclick='remove_partner()' style="background-color:#a32626;">Remove</button>
			</div>
		</div>	
	</div>
	<!-----------CONTENTS END-------------->
</div>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>