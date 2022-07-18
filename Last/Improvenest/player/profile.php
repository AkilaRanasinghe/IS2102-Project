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
<link rel="stylesheet" href="../css/message.css">
<script>
function delete_profile()
{
	if(confirm("Are you sure you want to delete your profile?"))
	{
		window.location.href="../php/deleteplayerprofile.php";
	}
}
</script>
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
	<?php
	$sqli = "SELECT * FROM player_notification WHERE player_username = '".$uname."' AND date = (SELECT CURRENT_DATE())";
	$resulti = $conn->query($sqli);
	$msgcount = mysqli_num_rows($resulti);
	
	$sql = "SELECT * FROM player WHERE username = '".$uname."'";
	$result = $conn->query($sql);
							  
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo"<div class='column contents'>			
					<div class='row'>
						<div class='column procol1'>
							<div class='row'>
								<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' alt='Avatar'>
							</div>
							<div class='row'>
								<button id='change' onclick='openForm()'><img id='change' src='../images/change.png'></button>
							</div>						
						</div>
						<div class='form-popup' id='myForm'>
							<form action='../php/updatedp.php' class='popup-container' method='POST' enctype='multipart/form-data'>
								<h2 style='text-align:center;'>Change Profile Picture</h2>

								<input type='file' name='Pimage' required>

								<button id='hoverbtn' type='submit' value='Submit'>Update</button>
								<button type='reset' onclick='closeForm()' style='background-color:#a32626;'>Cancel</button>
							</form>
						</div>
						<div class='column procol5'>
						<div style='float: right;'>
							<a href='notifications.php'>
								<div class='messages'>";
									if($msgcount > 0)
									{
										echo"<div class='badge'>
											<div class='message-count'>".$msgcount."</div>
										</div>";									
									}
								echo"</div>
							</a>
						</div>						
							<div class='row'>
								<div class='row'>
									<h1 style='margin-bottom:10px;'>&emsp;&emsp;".$row["f_name"]." ".$row["l_name"]."</h1>
							<div class='row' style='margin-bottom:20px;'>
								<small style='margin-left:120px;'>Username : ".$row["username"]."</small>
							</div>										
									<br >
								</div>
								<div class='row'>
									<table class='protable' cellspacing='2' cellpadding='2' border='0' width='100%'>
										<tr>
											<td>
												<p>NIC/Passport</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["nic_passport"]."</p>
											</td>
											<td>
												<p>Address</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["address"]."</p>
											</td>
										</tr>
										<tr>
											<td>
												<p>Gender</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["gender"]."</p>
											</td>
											<td>
												<p>Birthday</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["dob"]."</p>
											</td>
										</tr>
										<tr>
											<td>
												<p>Country</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["country"]."</p>
											</td>
											<td>
												<p>Email</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["email"]."</p>
											</td>
										</tr>
										<tr>
											<td>
												<p>Sports</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>";
												$sqll = "SELECT * FROM player_sport WHERE username = '".$uname."'";
												$resultt = $conn->query($sqll);
												
												if($resultt->num_rows > 0)
												{
													$data = array();
													while($roww = $resultt->fetch_assoc())
													{
														$data[] = $roww["sport"];
													}
													for($x = 0 ; $x < count($data) ; $x++)
													{
														print_r($data[$x]);echo"&emsp;&emsp;";
													}
												}
											echo"</td>
											<td>
												<p>Mobile</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["contact_no"]."</p>
											</td>
										</tr>
									</table>
								</div>								
							</div>						
						</div>
					</div>
					<br/><br/>
					<div class='row' style='padding:30px 0px 30px 150px;overflow: hidden;background-color: rgba(0, 20, 61, 0.5);box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.5);'>
						<table class='protable' cellspacing='2' cellpadding='2' border='0' width='100%'>
							<tr>
								<td>
									<p>Achievement Level</p>
								</td>
								<td>
									<p>:</p>
								</td>
								<td colspan='4'>
									<p>".$row["achievement_level"]."</p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Current Fitness Level</p>
								</td>
								<td>
									<p>:</p>
								</td>
								<td colspan='4'>
									<p>".$row["fitness_level"]."</p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Trainig Aspects</p>
								</td>
								<td>
									<p>:</p>
								</td>
								<td colspan='4'>";
									$sqlll = "SELECT * FROM player_training_aspect WHERE username = '".$uname."'";
									$resulttt = $conn->query($sqlll);
									
									if($resulttt->num_rows > 0)
									{
										$dataa = array();
										while($rowww = $resulttt->fetch_assoc())
										{
											$dataa[] = $rowww["training_aspect"];
										}
										for($x = 0 ; $x < count($dataa) ; $x++)
										{
											print_r($dataa[$x]);echo"&emsp;&emsp;";
										}
									}
								echo"</td>
							</tr>
							<tr>
								<td>
									<p>Usual Training Place</p>
								</td>
								<td>
									<p>:</p>
								</td>
								<td colspan='4'>
									<p>".$row["province"]." Province&emsp;&emsp;&emsp;&emsp;".$row["city"]." District&emsp;&emsp;&emsp;&emsp;".$row["venue"]."</p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Notes</p>	
								</td>
								<td>
									<p>:</p>
								</td>
								<td colspan='4'>
									<p>".$row["note"]."</p>	
								</td>
							</tr>
						</table>
					</div>
					<div class='row' style='padding:20px 10px 0px 10px;' align='center'>
						<div class='column common'>
							<a href='editprofile.php'><button id='hoverbtn'>Edit Profile</button></a>
						</div>
						<div class='column common'>
							<button type='submit' onclick='delete_profile()' style='background-color:#a32626;'>Delete Profile</button>
						</div>
					</div>
				</div>";
		}
	}
	?>
	<!-----------CONTENTS END-------------->
</div>
<script>
function openForm() {
	document.getElementById("myForm").style.display = "block";
}

function closeForm() {
	document.getElementById("myForm").style.display = "none";
}
</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>
