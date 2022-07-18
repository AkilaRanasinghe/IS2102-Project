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
		<h1>Participants</h1>
		<div class="input-form participants" style="padding:20px 50px 20px 50px;">
			<center>
				<table rules="all" width="100%" >
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Contact No</th>
						<th>Achievement Level</th>
						<th>Current Fitness Level</th>
					</tr>
					<?php
					$num = 0;
					$occasion = "";
					
					if(isset($_GET["id"]))  
					{
						$occasion = $_GET["id"];
					}	

					$sql = "SELECT * FROM player pl, participate pa WHERE pa.occasion_id = '".$occasion."' AND pa.username = pl.username AND pa.username != '".$uname."'";
					$result = $conn->query($sql);

					if($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{
							$num = $num + 1;
							echo "<tr>
							<td>".$num."</td>
							<td>".$row["f_name"]." ".$row["l_name"]."</td>
							<td>".$row["contact_no"]."</td>
							<td>".$row["achievement_level"]." ".$row["l_name"]."</td>
							<td>".$row["fitness_level"]."</td>							
							</tr>";
						}
					}	
					?>
				</table>
			</center>
		</div>
		</br>		
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