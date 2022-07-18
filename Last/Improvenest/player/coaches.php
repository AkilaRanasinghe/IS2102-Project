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
		<div class="row tab">
			<a href="#" class="active">Find Coaches</a>
			<a href="mycoaches.php">My Coaches</a>
		</div>
		<div class="maintabcontent">		
			<div class="row search-form">
				<div class="column procol4">
					<h1>Find Coaches</h1>
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
			<div class="row">
				<?php
				$count = 0;
				$sql="SELECT DISTINCT co.picture, co.username, co.f_name, co.l_name, co.note FROM coach co, coach_sport cs WHERE cs.sport IN (SELECT sport FROM player_sport WHERE username = '" .$uname. "') AND co.username = cs.username AND co.account_status = 'Active'";
				$result = $conn->query($sql);
										  
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$receiver_username = $row["username"];
						$count = $count + 1;
						$sqll="SELECT DISTINCT * FROM coach_request WHERE requester_username = '" .$uname. "' AND receiver_username = '" .$receiver_username. "'";
						$resultt = $conn->query($sqll);
												  
						if($resultt->num_rows < 1)
						{
								echo"<div class='item'>
									<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' class='imge' alt='Avatar'>
									<a href='viewcoach.php?id=".$receiver_username."' style='text-decoration: none; color:white;'><h3 style='margin-bottom:5px;'>".$row["f_name"]." ".$row["l_name"]."</h3></a>";
									
									$sqlll = "SELECT SUM(stars) DIV COUNT(stars) AS Average FROM coach_request WHERE receiver_username = '".$receiver_username."'";

									$resulttr = $conn->query($sqlll);
														  
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
									echo"<a href='../php/requestcoach.php?id=".$receiver_username."'><button>Send Request</button></a>
									</div>";					
						}
					}
				}
				else 
				{
					echo "<div class='procol7'><h3>No Coaches Yet.</h3></div>";
				}
				?>				
			</div>
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