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
			<a href="mypartners.php">My Partners</a>
			<a href="#" class="active">My Requests</a>
		</div>
		<div class="maintabcontent">		
			<div class="row search-form">
				<div class="column procol4">
					<h1>View Requests</h1>
				</div>
				<div class="column procol5" style="padding-top:25px;">
				</div>
			</div>
			<div class="row">
				<?php
				$sql="SELECT DISTINCT * FROM player pa, player_request pr WHERE pr.receiver_username = '" .$uname. "' AND pr.requester_username = pa.username AND pr.status = 'Pending' AND pa.account_status = 'Active'";
				$result = $conn->query($sql);
										  
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$id = $row["requester_username"];
						echo"<div class='item'>
							<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' class='imge' alt='Avatar'>
							<a href='viewplayerrequest.php?id=".$id."' style='text-decoration: none; color:white;'><h3>".$row["f_name"]." ".$row["l_name"]."</h3></a>
							<p>".$row["achievement_level"]."</p>
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
				else 
				{
					echo "<div class='procol7'><h3>No Requests Yet.</h3></div>";
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