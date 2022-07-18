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
		<?php
		if(isset($_GET["id"]))  
		{
			$id = $_GET["id"];
		}
		else
		{
			$id = $_SESSION['id'];
		}
		$_SESSION['id'] = $id;
		
		$sql = "SELECT * FROM player where username = '".$id."'";

		$result = $conn->query($sql);
								  
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{		
				echo"<div class='row'>
					<div class='column procol1'>
						<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' alt='Avatar'>
						<a href='../php/requestplayer.php?id=".$id."'><button id='hoverbtn' style='cursor: pointer;font-family: arial;border: none;outline: 0;padding: 12px;width: 97%;font-size: 14px;margin-top: 30px;'>Send Request</button></a>
					</div>
						<div class='column procol5'>
							<div class='row'>
								<div class='row'>
									<h1>".$row["f_name"]." ".$row["l_name"]."</h1>
										<br >
								</div>
								<div class='row'>
									<table class='protable' cellspacing='2' cellpadding='2' border='0' width='100%'>
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
												<p>Country</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>
												<p>".$row["country"]."</p>
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
												<p>Sports</p>
											</td>
											<td>
												<p>:</p>
											</td>
											<td colspan='4'>";
												$sqll = "SELECT * FROM player_sport WHERE username = '".$id."'";
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
											<td colspan='6'></td>
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
									<p>Training Aspects</p>
								</td>
								<td>
									<p>:</p>
									</td>
								<td colspan='4'>";
									$sqlll = "SELECT * FROM player_training_aspect WHERE username = '".$id."'";
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
									<p>Ususl Training Place</p>
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
					</div>";
			}
		}
		?>						
		<br/>
	</div>			
</div>
	<!-----------CONTENTS END-------------->
</div>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>