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
			<a href="coaches.php">Find Coaches</a>
			<a href="#" class="active">My Coaches</a>
		</div>
		<div class="maintabcontent">		
			<div class="row search-form">
				<div class="column procol4">
					<h1>My Coaches</h1>
				</div>
				<div class="column procol5" style="padding-top:25px;">
				</div>
			</div>
			<div class="row">
				<?php
				$sql="SELECT DISTINCT * FROM coach co, coach_request cr WHERE cr.requester_username = '" .$uname. "' AND cr.receiver_username = co.username AND cr.status = 'Accepted' AND co.account_status = 'Active'";
				$result = $conn->query($sql);
										  
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$id = $row["username"];
						echo"<div class='item'>
							<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' class='imge' alt='Avatar'>
							<h3>".$row["f_name"]." ".$row["l_name"]."</h3>
							<p>".$row["qualification"]."</p>
							<a href='coachprofile.php?id=".$id."'><button>View Profile</button></a>
						</div>";
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