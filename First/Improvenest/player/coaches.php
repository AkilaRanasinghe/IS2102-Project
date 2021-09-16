<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css">
<link rel="stylesheet" href="../css/card.css"/>
<script src="../js/commonjs.js"></script>
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
		<a class="active" href="coaches.php">COACHES</a>
		<a href="tournaments.php">TOURNAMENTS</a>
		<a href="events.php">EVENTS</a>
		<a  href="shops.php">SHOPS</a>
	</div>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row tab">
			<a class="buttonlinks" onclick="openUser(event, 'Find')" id="defaultOpen">Find Coaches</a>
			<a class="buttonlinks" onclick="openUser(event, 'My')">My Coaches</a>
		</div>	
		<div id="Find" class="tabcontent">
			<div class="row search-form">
				<div class="column procol4">
					<h1>Find Coaches</h1>
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
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 1</h3>
					<p>Details</p>
					<a href="#"><button>Send Request</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 2</h3>
					<p>Details</p>
					<a href="#"><button>Send Request</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 3</h3>
					<p>Details</p>
					<a href="#"><button>Send Request</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 4</h3>
					<p>Details</p>
					<a href="#"><button>Send Request</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 5</h3>
					<p>Details</p>
					<a href="#"><button>Send Request</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 6</h3>
					<p>Details</p>
					<a href="#"><button>Send Request</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 7</h3>
					<p>Details</p>
					<a href="#"><button>Send Request</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 8</h3>
					<p>Details</p>
					<a href="#"><button>Send Request</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 9</h3>
					<p>Details</p>
					<a href="#"><button>Send Request</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 10</h3>
					<p>Details</p>
					<a href="#"><button>Send Request</button></a>
				</div>					
			</div>			
		</div>
		<div id="My" class="tabcontent">
			<div class="row search-form">
				<div class="column procol4">
					<h1>My Coaches</h1>
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
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 1</h3>
					<a href="../coach/coachprofile.php"><button>View Profile</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 2</h3>
					<a href="../coach/coachprofile.php"><button>View Profile</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 3</h3>
					<a href="../coach/coachprofile.php"><button>View Profile</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 4</h3>
					<a href="../coach/coachprofile.php"><button>View Profile</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 5</h3>
					<a href="../coach/coachprofile.php"><button>View Profile</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 6</h3>
					<a href="../coach/coachprofile.php"><button>View Profile</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 7</h3>
					<a href="../coach/coachprofile.php"><button>View Profile</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 8</h3>
					<a href="../coach/coachprofile.php"><button>View Profile</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 9</h3>
					<a href="../coach/coachprofile.php"><button>View Profile</button></a>
				</div>
				<div class="item">
					<img src="../images/avatar.png" class="imge">
					<h3>Coach 10</h3>
					<a href="../coach/coachprofile.php"><button>View Profile</button></a>
				</div>					
			</div>				
		</div>		
	</div>
	<!-----------CONTENTS END-------------->
</div>
<script>
document.getElementById("defaultOpen").click();
</script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>