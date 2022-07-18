<?php
include '../php/conn.php';
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too
session_start();	
$uname = $_SESSION['uname'];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css">
<link rel="stylesheet" href="../css/stars.css">
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
	<?php include '../php/playersidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row search-form">
			<div class="column procol4">
				<h1>Search Results</h1>
			</div>
			<div class="column procol5" style="padding-top:25px;">
					<form action="searchcoach.php" method="POST">
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
				<a class="buttonlinks" onclick="openUser(event, 'Find')" id="defaultOpen" style="width:33.333%;">Find Coaches</a>
				<a class="buttonlinks" onclick="openUser(event, 'Requested')" style="width:33.333%;">Requested Coaches</a>
				<a class="buttonlinks" onclick="openUser(event, 'My')" style="width:33.333%;">My Coaches</a>
			</div>
			<?php
			$search = "";

			if(isset($_POST['search']))
			{
				$search = $_POST["search"];
			}

			echo"<div class='row'>
				<div id='Find' class='tabcontent'>
					<div class='row'>";
						
						$sqll="SELECT DISTINCT co.username, co.picture, co.f_name, co.l_name, co.qualification FROM coach co, coach_sport cs WHERE CONCAT(co.f_name, '', co.l_name, '', co.country, '', co.specilization, '', co.qualification, '', co.province, '', co.city, '', co.venue, '', co.note, '', cs.sport) LIKE '%" . $search . "%' AND co.username = cs.username AND co.account_status = 'Active'";
						$resultt = $conn->query($sqll);

						if($resultt->num_rows > 0)
						{
							while($roww = $resultt->fetch_assoc())
							{
								$coachusername = $roww["username"];
								$sqli="SELECT status FROM coach_request WHERE requester_username = '" .$uname. "' AND receiver_username = '" .$coachusername. "'";
								$resulti = $conn->query($sqli);

								if($resulti->num_rows < 1)
								{
									echo"<div class='item'>
										<img src='data:image/jpeg;base64," . base64_encode($roww['picture']) . "' class='imge' alt='Avatar'>
										<a href='viewcoach.php?id=".$coachusername."' style='text-decoration: none; color:white;'><h3 style='margin-bottom:5px;'>".$roww["f_name"]." ".$roww["l_name"]."</h3></a>";
												
										$sqlll = "SELECT SUM(stars) DIV COUNT(stars) AS Average FROM coach_request WHERE receiver_username = '".$coachusername."'";

										$resulttr = $conn->query($sqlll);
										$count = $count + 1;
																	  
										if($resulttr->num_rows > 0)
										{
											while($rowww = $resulttr->fetch_assoc())
											{	
												$average = $rowww["Average"];
												echo"<div class='rate'>";
													if($average == 5)
													{
														echo"<input type='radio' id='retstar5' name='$count' value='5' checked/>
														<label for='retstar5' title='text'>5 stars</label>
														<input type='radio' id='retstar4' name='$count' value='4' disabled/>
														<label for='retstar4' title='text'>4 stars</label>										
														<input type='radio' id='retstar3' name='$count' value='3' disabled/>
														<label for='retstar3' title='text'>3 stars</label>
														<input type='radio' id='retstar2' name='$count' value='2' disabled/>
														<label for='retstar2' title='text'>2 stars</label>
														<input type='radio' id='retstar1' name='$count' value='1' disabled/>
														<label for='retstar1' title='text'>1 star</label>";
													}
													else if($average == 4)
													{
														echo"<input type='radio' id='retstar5' name='$count' value='5' disabled/>
														<label for='retstar5' title='text'>5 stars</label>
														<input type='radio' id='retstar4' name='$count' value='4' checked/>
														<label for='retstar4' title='text'>4 stars</label>										
														<input type='radio' id='retstar3' name='$count' value='3' disabled/>
														<label for='retstar3' title='text'>3 stars</label>
														<input type='radio' id='retstar2' name='$count' value='2' disabled/>
														<label for='retstar2' title='text'>2 stars</label>
														<input type='radio' id='retstar1' name='$count' value='1' disabled/>
														<label for='retstar1' title='text'>1 star</label>";									
													}
													else if($average == 3)
													{
														echo"<input type='radio' id='retstar5' name='$count' value='5' disabled/>
														<label for='retstar5' title='text'>5 stars</label>
														<input type='radio' id='retstar4' name='$count' value='4' disabled/>
														<label for='retstar4' title='text'>4 stars</label>										
														<input type='radio' id='retstar3' name='$count' value='3' checked/>
														<label for='retstar3' title='text'>3 stars</label>
														<input type='radio' id='retstar2' name='$count' value='2' disabled/>
														<label for='retstar2' title='text'>2 stars</label>
														<input type='radio' id='retstar1' name='$count' value='1' disabled/>
														<label for='retstar1' title='text'>1 star</label>";									
													}									
													else if($average == 2)
													{
														echo"<input type='radio' id='retstar5' name='$count' value='5' disabled/>
														<label for='retstar5' title='text'>5 stars</label>
														<input type='radio' id='retstar4' name='$count' value='4' disabled/>
														<label for='retstar4' title='text'>4 stars</label>										
														<input type='radio' id='retstar3' name='$count' value='3' disabled/>
														<label for='retstar3' title='text'>3 stars</label>
														<input type='radio' id='retstar2' name='$count' value='2' checked/>
														<label for='retstar2' title='text'>2 stars</label>
														<input type='radio' id='retstar1' name='$count' value='1' disabled/>
														<label for='retstar1' title='text'>1 star</label>";									
													}
													else if($average == 1)
													{
														echo"<input type='radio' id='retstar5' name='$count' value='5' disabled/>
														<label for='retstar5' title='text'>5 stars</label>
														<input type='radio' id='retstar4' name='$count' value='4' disabled/>
														<label for='retstar4' title='text'>4 stars</label>										
														<input type='radio' id='retstar3' name='$count' value='3' disabled/>
														<label for='retstar3' title='text'>3 stars</label>
														<input type='radio' id='retstar2' name='$count' value='2' disabled/>
														<label for='retstar2' title='text'>2 stars</label>
														<input type='radio' id='retstar1' name='$count' value='1' checked/>
														<label for='retstar1' title='text'>1 star</label>";									
													}
													else
													{
														echo"<input type='radio' id='retstar5' name='$count' value='5' disabled/>
														<label for='retstar5' title='text'>5 stars</label>
														<input type='radio' id='retstar4' name='$count' value='4' disabled/>
														<label for='retstar4' title='text'>4 stars</label>										
														<input type='radio' id='retstar3' name='$count' value='3' disabled/>
														<label for='retstar3' title='text'>3 stars</label>
														<input type='radio' id='retstar2' name='$count' value='2' disabled/>
														<label for='retstar2' title='text'>2 stars</label>
														<input type='radio' id='retstar1' name='$count' value='1' disabled/>
														<label for='retstar1' title='text'>1 star</label>";														
													}
												echo"</div>";
											}
										}									
										echo"<a href='../php/requestcoach.php?id=".$coachusername."'><button>Send Request</button></a>
									</div>";						
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
					<div id='Requested' class='tabcontent'>
						<div class='row'>";
						
						$sqll="SELECT DISTINCT co.username, co.picture, co.f_name, co.l_name, co.qualification FROM coach co, coach_sport cs WHERE CONCAT(co.f_name, '', co.l_name, '', co.country, '', co.specilization, '', co.qualification, '', co.province, '', co.city, '', co.venue, '', co.note, '', cs.sport) LIKE '%" . $search . "%' AND co.username = cs.username AND co.account_status = 'Active'";
						$resultt = $conn->query($sqll);

						if($resultt->num_rows > 0)
						{
							while($roww = $resultt->fetch_assoc())
							{
								$coachusername = $roww["username"];
								$sqli="SELECT status FROM coach_request WHERE requester_username = '" .$uname. "' AND receiver_username = '" .$coachusername. "'";
								$resulti = $conn->query($sqli);

								if($resulti->num_rows > 0)
								{
									while($rowi = $resulti->fetch_assoc())
									{
										$status = $rowi["status"];
										if($status == "Pending")
										{
											echo"<div class='item'>
												<img src='data:image/jpeg;base64," . base64_encode($roww['picture']) . "' class='imge' alt='Avatar'>
												<a href='requestedcoach.php?id=".$coachusername."' style='text-decoration: none; color:white;'><h3 style='margin-bottom:5px;'>".$roww["f_name"]." ".$roww["l_name"]."</h3></a>";
														
												$sqlll = "SELECT SUM(stars) DIV COUNT(stars) AS Average FROM coach_request WHERE receiver_username = '".$coachusername."'";

												$resulttr = $conn->query($sqlll);
												$count = $count + 1;
																			  
												if($resulttr->num_rows > 0)
												{
													while($rowww = $resulttr->fetch_assoc())
													{	
														$average = $rowww["Average"];
														echo"<div class='rate'>";
															if($average == 5)
															{
																echo"<input type='radio' id='retstar5' name='$count' value='5' checked/>
																<label for='retstar5' title='text'>5 stars</label>
																<input type='radio' id='retstar4' name='$count' value='4' disabled/>
																<label for='retstar4' title='text'>4 stars</label>										
																<input type='radio' id='retstar3' name='$count' value='3' disabled/>
																<label for='retstar3' title='text'>3 stars</label>
																<input type='radio' id='retstar2' name='$count' value='2' disabled/>
																<label for='retstar2' title='text'>2 stars</label>
																<input type='radio' id='retstar1' name='$count' value='1' disabled/>
																<label for='retstar1' title='text'>1 star</label>";
															}
															else if($average == 4)
															{
																echo"<input type='radio' id='retstar5' name='$count' value='5' disabled/>
																<label for='retstar5' title='text'>5 stars</label>
																<input type='radio' id='retstar4' name='$count' value='4' checked/>
																<label for='retstar4' title='text'>4 stars</label>										
																<input type='radio' id='retstar3' name='$count' value='3' disabled/>
																<label for='retstar3' title='text'>3 stars</label>
																<input type='radio' id='retstar2' name='$count' value='2' disabled/>
																<label for='retstar2' title='text'>2 stars</label>
																<input type='radio' id='retstar1' name='$count' value='1' disabled/>
																<label for='retstar1' title='text'>1 star</label>";									
															}
															else if($average == 3)
															{
																echo"<input type='radio' id='retstar5' name='$count' value='5' disabled/>
																<label for='retstar5' title='text'>5 stars</label>
																<input type='radio' id='retstar4' name='$count' value='4' disabled/>
																<label for='retstar4' title='text'>4 stars</label>										
																<input type='radio' id='retstar3' name='$count' value='3' checked/>
																<label for='retstar3' title='text'>3 stars</label>
																<input type='radio' id='retstar2' name='$count' value='2' disabled/>
																<label for='retstar2' title='text'>2 stars</label>
																<input type='radio' id='retstar1' name='$count' value='1' disabled/>
																<label for='retstar1' title='text'>1 star</label>";									
															}									
															else if($average == 2)
															{
																echo"<input type='radio' id='retstar5' name='$count' value='5' disabled/>
																<label for='retstar5' title='text'>5 stars</label>
																<input type='radio' id='retstar4' name='$count' value='4' disabled/>
																<label for='retstar4' title='text'>4 stars</label>										
																<input type='radio' id='retstar3' name='$count' value='3' disabled/>
																<label for='retstar3' title='text'>3 stars</label>
																<input type='radio' id='retstar2' name='$count' value='2' checked/>
																<label for='retstar2' title='text'>2 stars</label>
																<input type='radio' id='retstar1' name='$count' value='1' disabled/>
																<label for='retstar1' title='text'>1 star</label>";									
															}
															else if($average == 1)
															{
																echo"<input type='radio' id='retstar5' name='$count' value='5' disabled/>
																<label for='retstar5' title='text'>5 stars</label>
																<input type='radio' id='retstar4' name='$count' value='4' disabled/>
																<label for='retstar4' title='text'>4 stars</label>										
																<input type='radio' id='retstar3' name='$count' value='3' disabled/>
																<label for='retstar3' title='text'>3 stars</label>
																<input type='radio' id='retstar2' name='$count' value='2' disabled/>
																<label for='retstar2' title='text'>2 stars</label>
																<input type='radio' id='retstar1' name='$count' value='1' checked/>
																<label for='retstar1' title='text'>1 star</label>";									
															}
															else
															{
																echo"<input type='radio' id='retstar5' name='$count' value='5' disabled/>
																<label for='retstar5' title='text'>5 stars</label>
																<input type='radio' id='retstar4' name='$count' value='4' disabled/>
																<label for='retstar4' title='text'>4 stars</label>										
																<input type='radio' id='retstar3' name='$count' value='3' disabled/>
																<label for='retstar3' title='text'>3 stars</label>
																<input type='radio' id='retstar2' name='$count' value='2' disabled/>
																<label for='retstar2' title='text'>2 stars</label>
																<input type='radio' id='retstar1' name='$count' value='1' disabled/>
																<label for='retstar1' title='text'>1 star</label>";														
															}
														echo"</div>";
													}
												}									
												echo"<a href='../php/removecoach.php?id=".$coachusername."'><button>Undo Request</button></a>
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
				</div>
				<div class='row'>
					<div id='My' class='tabcontent'>
						<div class='row'>";
						
						$sqll="SELECT DISTINCT co.username, co.picture, co.f_name, co.l_name, co.qualification FROM coach co, coach_sport cs WHERE CONCAT(co.f_name, '', co.l_name, '', co.country, '', co.specilization, '', co.qualification, '', co.province, '', co.city, '', co.venue, '', co.note, '', cs.sport) LIKE '%" . $search . "%' AND co.username = cs.username AND co.account_status = 'Active'";
						$resultt = $conn->query($sqll);

						if($resultt->num_rows > 0)
						{
							while($roww = $resultt->fetch_assoc())
							{
								$coachusername = $roww["username"];
								$sqli="SELECT status FROM coach_request WHERE requester_username = '" .$uname. "' AND receiver_username = '" .$coachusername. "'";
								$resulti = $conn->query($sqli);

								if($resulti->num_rows > 0)
								{
									while($rowi = $resulti->fetch_assoc())
									{
										$status = $rowi["status"];
										if($status == "Accepted")
										{
											echo"<div class='item'>
												<img src='data:image/jpeg;base64," . base64_encode($roww['picture']) . "' class='imge' alt='Avatar'>
												<h3>".$roww["f_name"]." ".$roww["l_name"]."</h3>
												<p>".$roww["qualification"]."</p>
												<a href='coachprofile.php?id=".$coachusername."'><button>View Profile</button></a>
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
<?php
include '../php/userfooter.php';
?>
<!-----------FOOTER END-------------->
</body>
</html>