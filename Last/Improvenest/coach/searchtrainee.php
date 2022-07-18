<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too
?>

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
		<div class="row search-form">
			<div class="column procol4">
				<h1>Search Results</h1>
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
		<div class="maintabcontent">
			<div class="row tab" style="padding-left:0px;">
				<a class="buttonlinks" onclick="openUser(event, 'My')" id="defaultOpen">My Trainees</a>
				<a class="buttonlinks" onclick="openUser(event, 'View')">View Requests</a>
	</div>
			<?php
			$search = "";

			if(isset($_POST['search']))
			{
				$search = $_POST["search"];
			}

			echo"<div class='row'>
				<div id='My' class='tabcontent'>
					<div class='row'>";
					$sqll="SELECT DISTINCT pl.username, pl.f_name, pl.l_name, pl.country, pl.picture, pl.achievement_level FROM player pl, player_sport ps, player_training_aspect pt WHERE CONCAT(pl.f_name, '', pl.l_name, '', pl.country, '', pl.achievement_level, '', pl.fitness_level, '', pl.province, '', pl.city, '', pl.venue, '', pl.note, '', ps.sport, '', pt.training_aspect) LIKE '%" . $search . "%' AND pl.username != '" .$uname. "' AND pl.username = ps.username AND pl.username = pt.username";
					$resultt = $conn->query($sqll);

					if($resultt->num_rows > 0)
					{
						while($roww = $resultt->fetch_assoc())
						{
							$playerusername = $roww["username"];
							$sqli="SELECT requester_username, receiver_username, status FROM coach_request WHERE (requester_username = '" .$playerusername. "' AND receiver_username = '" .$uname. "')";
							$resulti = $conn->query($sqli);

							if($resulti->num_rows > 0)
							{
								while($rowi = $resulti->fetch_assoc())
								{
									$status = $rowi["status"];
									if($status == "Accepted")
									{
										$requester_username = $rowi["requester_username"];
										$receiver_username = $rowi["receiver_username"];
										if($receiver_username == $uname)
										{
											$id = $rowi["requester_username"];
											$sqlli="SELECT DISTINCT * FROM player WHERE username = '" .$id. "'";
											$resultti = $conn->query($sqlli);

											if($resultti->num_rows > 0)
											{
												while($rowwi = $resultti->fetch_assoc())
												{
													echo"<div class='item'>
														<img src='data:image/jpeg;base64," . base64_encode($rowwi['picture']) . "' class='imge' alt='Avatar'>
														<h3>".$rowwi["f_name"]." ".$rowwi["l_name"]."</h3>
														<p>".$rowwi["country"]."</p>
														<a href='../player/playerprofile.php?id=".$id."'><button>View Profile</button></a>
														</div>";
												}
											}
										}
									}
								}
							}
						}
					}
					else
					{
						echo "<div class='procol7'><h3>No search results related to your keyword.</h3></div>";
					}

					echo"</div>
				</div>
				<div class='row'>
					<div id='View' class='tabcontent'>
						<div class='row'>";
						$sqll="SELECT DISTINCT pl.username, pl.f_name, pl.l_name, pl.country, pl.picture, pl.achievement_level FROM player pl, player_sport ps, player_training_aspect pt WHERE CONCAT(pl.f_name, '', pl.l_name, '', pl.country, '', pl.achievement_level, '', pl.fitness_level, '', pl.province, '', pl.city, '', pl.venue, '', pl.note, '', ps.sport, '', pt.training_aspect) LIKE '%" . $search . "%' AND pl.username != '" .$uname. "' AND pl.username = ps.username AND pl.username = pt.username";
						$resultt = $conn->query($sqll);

						if($resultt->num_rows > 0)
						{
							while($roww = $resultt->fetch_assoc())
							{
								$playerusername = $roww["username"];
								$sqli="SELECT requester_username, status FROM coach_request WHERE requester_username = '" .$playerusername. "' AND receiver_username = '" .$uname. "'";
								$resulti = $conn->query($sqli);

								if($resulti->num_rows > 0)
								{
									while($rowi = $resulti->fetch_assoc())
									{
										$status = $rowi["status"];
										if($status == "Pending")
										{
											$id = $rowi["requester_username"];
											echo"<div class='item'>
												<img src='data:image/jpeg;base64," . base64_encode($roww['picture']) . "' class='imge' alt='Avatar'>
												<a href='viewplayerrequest.php?id=".$id."' style='text-decoration: none; color:white;'><h3>".$roww["f_name"]." ".$roww["l_name"]."</h3></a>
												<p>".$roww["achievement_level"]."</p>
												<div class='row'>
													<div class='accept half' style='float:left;'>
														<a href='../php/acceptplayer.php?id=".$id."'><button>Accept</button></a>
													</div>
													<div class='decline half' style='float:right'>
														<a href='../php/removeplayer.php?id=".$id."'><button>Decline</button></a>
													</div>
												</div>
											</div>";
										}
									}
								}
							}
						}
						else
						{
							echo "<div class='procol7'><h3>No search results related to your keyword.</h3></div>";
						}


					echo"</div>
					</div>
				</div>";

			?>
		</div>
	</div>
	<!-----------CONTENTS END-------------->
</div>
<script>
	document.getElementById("defaultOpen").click();
</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>
