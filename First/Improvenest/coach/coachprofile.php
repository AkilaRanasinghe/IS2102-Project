<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<script>
function remove_coach()
{
	if(confirm("Are you sure you want to remove coach?"))
	{
		window.location.href="#";
	}
}
function report_coach() {
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
<div class="row header">
	<img src="../images/logS.png">
	<div class="headerdropdown">
		<button class="dropbtn">PROFILE</button>
		<div class="headerdropdown-content">
			<a href="../player/profile.php">MY PROFILE</a>
			<a href="">LOGOUT</a>
		</div>
	</div>
	<a href="../faq.php">FAQ</a>
	<a href="../aboutus.php">ABOUT US</a>
	<a href="../index.html">HOME</a>
</div>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<div class="column sidenav">
		<div class="row">
			<img src="../images/avatar.png" alt="Avatar">
			<h1 style="color:white;float:right;padding-top:7%">Hello John!</h1>
		</div>
		<a href="../player/news.php">NEWS</a>
		<a href="../player/schedule.php">SCHEDULE</a>
		<a href="../player/partners.php">PARTNERS</a>
		<a class="active" href="../player/coaches.php">COACHES</a>
		<a href="../player/tournaments.php">TOURNAMENTS</a>
		<a href="../player/events.php">EVENTS</a>
		<a href="../player/shops.php">SHOPS</a>
	</div>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row">
			<div class="column procol1">
				<img src="../images/avatar.png" alt="Avatar">
			</div>
			<div class="column procol2">
				<h1>Chandler Bing</h1>
				<p>Male</p>
				<p>Sri Lanka</p>
				<p>Archery</p>
				<p>0751236547</p>
			</div>
			<div class="column procol3">
				<p>No 28, MainStreet, Malabe, Colombo</p>
				<p>05/15/1974</p>
				<p>chandlerbing@gmail.com</p>		
			</div>
		</div>
		<br/><br/>
		<div class="row" style="padding:10px 0px 10px 150px;overflow: hidden;background-color: rgba(0, 20, 61, 0.5);box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.5);">
			<div class="column procol4">
				<p>Qualification</p>
				<p>Specilization</p>
				<p>Training Locations</p>
				<p>Fees</p>
				<p>Notes</p>				
			</div>
			<div class="column procol5">
				<p>:&emsp;&emsp;&emsp;&emsp;----------------------------</p>
				<p>:&emsp;&emsp;&emsp;&emsp;----------------------------</p>
				<p>:&emsp;&emsp;&emsp;&emsp;Western Province&emsp;&emsp;&emsp;&emsp;Colombo&emsp;&emsp;&emsp;&emsp;Race Course Ground</p>
				<p>:&emsp;&emsp;&emsp;&emsp;1000 LKR per hour</p>
				<p>:&emsp;&emsp;&emsp;&emsp;None</p>				
			</div>
		</div>
		<div class="row" style="padding:20px 10px 0px 10px;" align="center">
			<div class="column common">
				<a href=""><button onclick="report_coach()">Report</button></a>
			</div>
			<div class="column common">
				<button type='submit' onclick='remove_coach()' style="background-color:#a32626;">Remove</button>
			</div>
		</div>	
	</div>
	<!-----------CONTENTS END-------------->
</div>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>