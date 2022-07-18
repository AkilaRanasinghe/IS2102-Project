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
			<a href="#" class="active">Find Partners</a>
			<a href="mypartners.php">My Partners</a>
			<a href="myrequests.php">My Requests</a>
		</div>
		<div class="maintabcontent">		
			<div class="row search-form">
				<div class="column procol4">
					<h1>Find Partners</h1>
				</div>
				<div class="column procol5" style="padding-top:25px;">
					<form action="searchpartner.php" method="POST">
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
				$sql="SELECT DISTINCT pa.picture, pa.username, pa.f_name, pa.l_name, pa.achievement_level FROM player pa, player_sport ps WHERE ps.sport IN (SELECT sport FROM player_sport WHERE username = '" .$uname. "') AND pa.username = ps.username AND pa.username != '" .$uname. "' AND pa.account_status = 'Active'";
				$result = $conn->query($sql);
										  
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$receiver_username = $row["username"];
						$sqll="SELECT DISTINCT * FROM player_request WHERE (requester_username = '" .$uname. "' AND receiver_username = '" .$receiver_username. "') OR (requester_username = '" .$receiver_username. "' AND receiver_username = '" .$uname. "')";
						$resultt = $conn->query($sqll);
												  
						if($resultt->num_rows < 1)
						{
							echo"<div class='item'>
								<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' class='imge' alt='Avatar'>
								<a href='viewplayer.php?id=".$receiver_username."' style='text-decoration: none; color:white;'><h3 style='margin-bottom:5px;'>".$row["f_name"]." ".$row["l_name"]."</h3></a>									
								<p>".$row["achievement_level"]."</p>
								<a href='../php/requestplayer.php?id=".$receiver_username."'><button>Send Request</button></a>
							</div>";					
						}
					}
				}
				else 
				{
					echo "<div class='procol7'><h3>No Players Yet.</h3></div>";
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
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>