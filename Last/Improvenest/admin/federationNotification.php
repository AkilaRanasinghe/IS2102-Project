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
<script src="../js/adminjs.js"></script>

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


    <div class="row" > 
        <br />
	<div class="column common" align="center" style="margin-left:15%; margin-top:3%;">
		<div class="input-form">
			<h1 style="color:white;">Federation Details</h1>	
			<div id="User" class="tabcontent">
<br />
            
</div>

</div>
<br /> <br />
<table width="10%" cellpadding="10px" border="1" style="border-collapse: collapse; ">
					<thead> 
					</thead>
					<tbody>
						<?php
							$count = 1;
								
							$sql_query = "SELECT * FROM federation WHERE username='$username'";
							$result = mysqli_query($conn, $sql_query);
								
							while ($row = mysqli_fetch_assoc($result)) { ?>
								<tr class="raw"> 
									<div class="row">
										<div class="horitem">
											<div class="procol5">
												<h3>Offender's User name: <?php echo $row["reporter_username"]; ?></h3>
												<p>Reported by: <?php echo $row["reported_username"]; ?></p>
												<p>Complaint: <?php echo $row["complain"]; ?>
												<p><font color="red">Please delete this user. </font></p>
											</div>

											<div class="procol4">
											<a href="deletecoach.php?reporter_username=<?php echo $row["reporter_username"]; ?>"><button style="background-color: #ED5F5F;">Delete User</button></a>
											</div>				
										</div>
									</div>	
									<br/>
								</tr>
							<?php $count++;
							} ?>
					</tbody>
				</table>		
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
