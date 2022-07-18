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
	<?php include '../php/adminsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row tab">

	
			

</div>
		<div class="maintabcontent">		
			<div class="row search-form">
				<div class="column procol4">
				
					<h1>Credentials not sent</h1>
				</div>
				<div class="column procol5" style="padding-top:25px;">
					<form action="searchfederationcredential.php" method="POST">
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
					$sql="SELECT * FROM federation WHERE credentials_sent='false'";
					$result = $conn->query($sql);
								  
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{
							$id = $row["federation_id"];

							
								echo"<div class='horitem'>
										<div class='procol5'>
											<h2>".$row["federation_id"]." - ".$row["name"]."</h2>";

												echo"<div class='column procol6'>
														
														<p>Username : ".$row["username"]."</p>
														<p>email : ".$row["email"]."</p>
																								
												</div>

												<div class='column procol6'>

												</div>
										
												
										";	
																
										
								echo"</div>
								

									<br />

								<a href='sendEmail.php?id=".$id."'><button type='submit' align='left' style='width:23%; background-color: #45C5F9; font-family:arial; height: 150px; font-size: 22px; margin: 0; border-radius: 5px 5px 5px 5px;'>Send Email</button></a>
								<div class='procol4'></div>
                                    							
							</div>";
						}

					}
				

				
				$conn->close();
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
<br > 
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>