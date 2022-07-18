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
			<a href="partners.php">Find Partners</a>
			<a href="#" class="active">My Partners</a>
			<a href="myrequests.php">My Requests</a>
		</div>
		<div class="maintabcontent">		
			<div class="row search-form">
				<div class="column procol4">
					<h1>My Partners</h1>
				</div>
				<div class="column procol5" style="padding-top:25px;">
				</div>
			</div>
			<div class="row">
				<?php
				$sql="SELECT DISTINCT * FROM player_request WHERE (requester_username = '" .$uname. "' OR receiver_username = '" .$uname. "') AND status = 'Accepted'";
				$result = $conn->query($sql);
										  
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$requester_username = $row["requester_username"];
						$receiver_username = $row["receiver_username"];
						if($requester_username == $uname)
						{
							$id = $row["receiver_username"];
							$sqll="SELECT DISTINCT * FROM player WHERE username = '" .$id. "' AND account_status = 'Active'";
							$resultt = $conn->query($sqll);
													  
							if($resultt->num_rows > 0)
							{
								while($roww = $resultt->fetch_assoc())
								{
									echo"<div class='item'>
										<img src='data:image/jpeg;base64," . base64_encode($roww['picture']) . "' class='imge' alt='Avatar'>
										<h3>".$roww["f_name"]." ".$roww["l_name"]."</h3>
										<p>".$roww["country"]."</p>
										<a href='playerprofile.php?id=".$id."'><button>View Profile</button></a>
										</div>";									
								}				
							}														
						}
						elseif($receiver_username == $uname)
						{
							$id = $row["requester_username"];
							$sqll="SELECT DISTINCT * FROM player WHERE username = '" .$id. "' AND account_status = 'Active'";
							$resultt = $conn->query($sqll);
													  
							if($resultt->num_rows > 0)
							{
								while($roww = $resultt->fetch_assoc())
								{
									echo"<div class='item'>
										<img src='data:image/jpeg;base64," . base64_encode($roww['picture']) . "' class='imge' alt='Avatar'>
										<h3>".$roww["f_name"]." ".$roww["l_name"]."</h3>
										<p>".$roww["country"]."</p>
										<a href='playerprofile.php?id=".$id."'><button>View Profile</button></a>
										</div>";									
								}												
							}
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