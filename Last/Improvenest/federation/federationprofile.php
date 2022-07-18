<?php
include '../php/conn.php';
session_start();
$uname = $_SESSION['uname'];
?>

<!-- passwords 
sls 123456789ab
slb -->

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
	<?php include '../php/federationsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<?php
	$sql = "SELECT * FROM federation WHERE username = '".$uname."'";
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
						<form action='../php/updatedf.php' class='popup-container' method='POST' enctype='multipart/form-data'>
							<h2 style='text-align:center;'>Change Federation Picture</h2>

							<input type='file' name='Pimage' required>

							<button type='submit' value='Submit'>Update</button>
							<button type='reset' onclick='closeForm()' style='background-color:#a32626;'>Cancel</button>
						</form>
					</div>


				<br/>
				<br/>
				<br/>
				&emsp;
				
				<h1>".$row["name"]."</h1>
			
				<br>
				
				
		
		
			
			
				
			
			
		</div>
		<br/>
		
<div class='row'>
<div class='horitem'>
			<div class='column procol4'>
				<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Address</p>
				<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Email</p>
				<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Contact Number</p>
				
			</div>
			<div class='column procol5'>
				<p>:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;".$row["address"]."</p>
				<p>:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;".$row["email"]."</p>
				<p>:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;".$row["contact_no"]."</p>
				<br>
				<br>
							
			</div>
			</div>
			<div class='row' style='padding:20px 10px 0px 10px;' align='right'>
			<div class='column common'>
				<a href='editprofile.php'>  <button>Edit Profile</button>  </a>
			</div>
			</div>
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
<script>
	document.getElementById("defaultOpen").click();
</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<!-- <?php include '../php/userfooter.php';?> -->
<!-----------FOOTER END-------------->
</body>
</html>