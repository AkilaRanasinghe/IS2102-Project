<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css">
<link rel="stylesheet" href="../css/card.css"/>
</head>
<body>
<!-----------HEADER START-------------->
<div class="row header">
	<img src="../images/logS.png">
	<div class="headerdropdown">
		<button class="dropbtn">PROFILE</button>
		<div class="headerdropdown-content">
			<a href="profile.php">MY PROFILE</a>
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
		<a class="active" href="#">TOURNAMENTS</a>
		<a href="events.php">EVENTS</a>
		<a href="shops.php">SHOPS</a>
	</div>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row search-form">
			<div class="column procol4">
				<h1>Tournaments</h1>
			</div>
			<div class="column procol5" style="padding-top:10px;">
				<form action="" method="POST">
				<table cellspacing="2" cellpadding="2" border="0" style="float:right">
				<tr>
					<td>
						<input type="text" placeholder="Search.." name="search">					
					</td>
					<td>
						<select name="sort">
							<option value="" selected disabled>-Sort-</option>
							<option value="asce">Ascending</option>
							<option value="desc">Descending</option>
						</select>					
					</td>
					<td>
						<button type="submit"><img src="../images/csearch.png"></button>
					</td>
				</tr>
				</table>
				</form>
			</div>
			</form>
		</div>
		<div class="row">
			<div class="horitem">
				<div class="procol5">
					<h3>Tournament 1</h3>
					<p>Description 1</p>
				</div>
				<div class="procol4">
					<a href="#"><button>Register</button></a>
				</div>				
			</div>
			<div class="horitem">
				<div class="procol5">
					<h3>Tournament 2</h3>
					<p>Description 2</p>
				</div>
				<div class="procol4">
					<a href="#"><button disabled>Closed</button></a>
				</div>				
			</div>
			<div class="horitem">
				<div class="procol5">
					<h3>Tournament 3</h3>
					<p>Description 3</p>
				</div>
				<div class="procol4">
					<a href="#"><button>Register</button></a>
				</div>				
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