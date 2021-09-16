<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<script>
function delete_profile()
{
	if(confirm("Are you sure you want to delete your profile?"))
	{
		window.location.href="#";
	}
}
</script>
</head>
<body>
<!-----------HEADER START-------------->
<div class="row header">
	<img src="../images/logS.png">
	<div class="headerdropdown active">
		<button class="dropbtn" style="color:white">PROFILE</button>
		<div class="headerdropdown-content">
			<a href="#">MY PROFILE</a>
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
		<a href="news.php">NEWS</a>
		<a href="schedule.php">SCHEDULE</a>
		<a href="partners.php">PARTNERS</a>
		<a href="coaches.php">COACHES</a>
		<a href="tournaments.php">TOURNAMENTS</a>
		<a href="events.php">EVENTS</a>
		<a href="shops.php">SHOPS</a>
	</div>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row">
			<div class="column procol1">
				<img src="../images/avatar.png" alt="Avatar">
				<p>P7254</p>
			</div>
			<div class="column procol2">
				<h1>Jhon Miller</h1>
				<p>984562147V</p>
				<p>Male</p>
				<p>Sri Lanka</p>
				<p>Squash&emsp;&emsp;&emsp;&emsp;Archery</p>
			</div>
			<div class="column procol3">
				<p>No 89, MainStreet, Borella, Colombo</p>
				<p>09/02/1993</p>
				<p>jhonmiller@gmail.com</p>
				<p>0715485621</p>			
			</div>
		</div>
		<br/><br/>
		<div class="row" style="padding:10px 0px 10px 150px;overflow: hidden;background-color: rgba(0, 20, 61, 0.5);box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.5);">
			<div class="column procol4">
				<p>Achievement Level</p>
				<p>Current Fitness Level</p>
				<p>Usual Training Places</p>
				<p>Notes</p>				
			</div>
			<div class="column procol5">
				<p>:&emsp;&emsp;&emsp;&emsp;Plate Winner</p>
				<p>:&emsp;&emsp;&emsp;&emsp;Casual Training Level</p>
				<p>:&emsp;&emsp;&emsp;&emsp;Western Province&emsp;&emsp;&emsp;&emsp;Colombo&emsp;&emsp;&emsp;&emsp;Sugathadasa Ground</p>
				<p>:&emsp;&emsp;&emsp;&emsp;Recovering from a hand tear</p>				
			</div>
		</div>
		<div class="row" style="padding:20px 10px 0px 10px;" align="center">
			<div class="column common">
				<a href="editprofile.php"><button>Edit Profile</button></a>
			</div>
			<div class="column common">
				<button type='submit' onclick='delete_profile()' style="background-color:#a32626;">Delete Profile</button>
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
