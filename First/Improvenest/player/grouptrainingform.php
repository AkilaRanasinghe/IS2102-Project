<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css">
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
		<a href="tournaments.php">TOURNAMENTS</a>
		<a href="events.php">EVENTS</a>
		<a href="shops.php">SHOPS</a>
	</div>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="input-form" style="padding:20px 150px 20px 150px;">
			<h1>Propose Group Training Session</h1>
			<form action="" name="proposeGroupTrain" method="POST">
				<table cellspacing="2" cellpadding="2" border="0" >
				<tr>
					<td colspan="10">
						<p>Session Name</p>
						<input type="text" placeholder="Session Name" name="SName" required>	
					</td>			
				</tr>				
				<tr>
					<td colspan="5">
						<p>Location</p>
						<input type="text" placeholder="Location" name="Location" required>				
					</td>
					<td colspan="5">
						<p>Number of Participants</p>
						<input type="number" placeholder="Number of Participants" name="Participants" required>				
					</td>			
				</tr>
				<tr>
					<td colspan="5">
						<p>Sport</p>
						<select id="sport" name="Sport" required>
						   <option value="" selected disabled>Sport</option>
						   <option value="Squash">Squash</option>
						   <option value="Tennis">Tennis</option>
						   <option value="Badminton">Badminton</option>
						   <option value="Archery">Archery</option>
						   <option value="Mixed Martial Arts">Mixed Martial Arts</option>
						</select>				
					</td>
					<td colspan="5">
						<p>Expenses</p>
						<input type="number" placeholder="Expenses" name="Expenses" required>				
					</td>					
				</tr>
				<tr>
					<td colspan="5">
						<p>Date</p>
						<input type="date" name="Date" required>			
					</td>
					<td colspan="5">
						<p>Entry Closing Date</p>
						<input type="date" name="CloseDate" required>			
					</td>			
				</tr>				
				<tr>
					<td colspan="5">
						<p>Start Time</p>
						<input type="time" placeholder="Start Time" name="STime" required>							
					</td>
					<td colspan="5">
						<p>End Time</p>
						<input type="time" placeholder="End Time" name="ETime" required>												
					</td>			
				</tr>								
				<tr>
					<td colspan="10"><br/></td>
				</tr>
				<tr align="center">
					<td colspan="5">
						<button type="submit" id="usersbt" value="Submit">Submit</button>				
					</td>
					<td colspan="5">
						<button type="reset" value="Reset" style="background-color:#a32626;">Reset</button>			
					</td>				
				</tr>			
				</table>
			</form>		
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