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
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/coachsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row tab">
			<a class="buttonlinks" onclick="openUser(event, 'My')" id="defaultOpen">My Trainees</a>
			<a class="buttonlinks" onclick="openUser(event, 'View')">View Requests</a>
		</div>

		<div id="My" class="tabcontent">
			<div class="row search-form">
				<div class="column procol4">
					<h1>My Trainees</h1>
				</div>
				<div class="column procol5" style="padding-top:25px;">
					<form action="searchtrainee.php" method="POST">
					<table cellspacing="2" cellpadding="2" border="0" width="100%" style="float:right">
					<tr>
						<td>
							<input type="text" placeholder="Search.." name="search" required>					
						</td>
						<td width="20px">
							<button type="submit"><img src="../images/csearch.png"></button>
						</td>
					</tr>
					</table>
					</form>
				</div>
			</div>
			<div class="row">
				<?php
				$traineename="";
				$traineecountry="";
				$traineeImage="";

				$sql= "SELECT * FROM player p,coach_request r WHERE p.username = r.requester_username AND r.receiver_username='$uname' AND r.status = 'Accepted'ORDER BY p.f_name,p.l_name ASC";
				$result= mysqli_query($conn,$sql);
				$resultchk= mysqli_num_rows($result);

				if($resultchk>0){

					while ($row = mysqli_fetch_assoc($result)) {

					$id = $row['username'];
					$traineefname= $row['f_name'];
					$traineelname= $row['l_name'];
					$traineecountry=  $row['country'];
					$traineeImage= $row['picture'];

					echo

				"<div class='item'>
					<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' class='imge' alt='Avatar'>
					<h3>".$row['f_name']." ".$row['l_name']."</h3>
					<h4>".$row['country']."</h4>
					<a href='playerprofile.php?id=".$id."'><button>View Profile</button></a>
				</div>";
			}
		}?>
			</div>
		</div>
		<div id="View" class="tabcontent">
			<div class="row search-form">
				<div class="column procol4">
					<h1>View Requests</h1>
				</div>
				<div class="column procol5" style="padding-top:10px;">
					<form action="" method="POST">
					<table cellspacing="2" cellpadding="2" border="0" style="float:right">
					<!--<tr>
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
					</tr>-->
					</table>
					</form>
				</div>
				</form>
			</div>
			<div class="row">
				<?php
				$traineename="";
				$traineecountry="";
				$traineeImage="";

				$sql= "SELECT * FROM player p,coach_request r WHERE p.username = r.requester_username AND r.receiver_username='$uname' AND r.status = 'Pending'";
				$result= mysqli_query($conn,$sql);
				$resultchk= mysqli_num_rows($result);

				if($resultchk>0){

					while ($row = mysqli_fetch_assoc($result)) {

					$traineefname= $row['f_name'];
					$traineelname= $row['l_name'];
					$traineecountry=  $row['country'];
					$traineeImage= $row['picture'];
					$id = $row['requester_username'];

					echo

				"<div class='item'>
				<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' class='imge' alt='Avatar'>
					<h3>".$row['f_name']." ".$row['l_name']."</h3>
					<h4>".$row['country']."</h4>
					<div class='row'>
					<div class='accept half' style='float:left;'>
						<a href='../php/coachAcceptPlayer.php?id=".$id."'><button>Accept</button></a>
					</div>
					<div class='decline half' style='float:right'>
						<a href='../php/coachRemovePlayer.php?id=".$id."'><button>Decline</button></a>
					</div>
					</div>
				</div>";
			}
		}
		else{
			echo
			"<div>
			<h3>
				No requests yet!
			</h3>
			</div>";
		}?>
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
<?php mysqli_close($conn);?>
<script src="../js/activejs.js" charset="utf-8"></script>
<!-----------FOOTER END-------------->
</body>
</html>
