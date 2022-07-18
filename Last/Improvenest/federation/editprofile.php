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
	
	<div class="column contents">
		<div class="input-form" style="padding:20px 150px 20px 150px;">
			<center> <h1>Edit Profile</h1> </center>
				<form action="../php/federationupdate.php" name="updateForm" method="POST" onsubmit="return epassword()">
				<?php
				$sql="SELECT * FROM federation WHERE username = '" .$uname. "'";
				$result=$conn->query ($sql);
				if ($result -> num_rows >0)
				{
					while ($row= $result -> fetch_assoc())
					{
						$name = $row ['name'];
						$contact_no = $row ['contact_no'];
						$email = $row ['email'];
						$address = $row ['address'];
						$Password = $row ['password'];
					}
				}
				?>


					
				<table cellspacing="2" cellpadding="2" border="0" >
			
				

				<tr>
					<td colspan="10">
						<p>Federation Name</p>
						<input type="text" placeholder="name" value="<?php echo $name ?>" name="name" required>	
					</td>			
				</tr>

				<tr>
					<td colspan="5">
						<p>Contact Number</p>
						<input type="text" placeholder="Contact Number" value="<?php echo $contact_no ?>" name="contact_no" pattern="[0-9]{10}" required>							
					</td>
					<td colspan="5">
						<p>Email</p>
						<input type="text" placeholder="Email" value="<?php echo $email ?>" name="email" pattern="[a-zA-Z0-9%_+-]+@[a-zA-Z]+\.[a-z]{2,3}" required>												
					</td>			
				</tr>
				<tr>
					<td colspan="10">
						<p>Address</p>
						<input type="text" placeholder="Address" value="<?php echo $address ?>" name="address" required>	
					</td>			
				</tr>

			
				<tr>
					<td colspan="5">
						<p>Password</p>
						<input type="password" placeholder="10-20 characters including @, #, $, %, &" value="<?php echo $Password ?>" name="Password" pattern="[a-zA-Z0-9%@#$&]{10,20}" required>			
					</td>
					<td colspan="5">
						<p>Re-enter password</p>
						<input type="password" placeholder="Re-enter password" value="<?php echo $Password ?>" name="RPassword" required>				
					</td>			
				</tr>
				<tr>
					<td colspan="10">
						<br/><hr/><br/>				
					</td>
				</tr>
						
				<tr>
					<td colspan="10"><br/></td>
				</tr>
				<tr align="center">
					<td colspan="5">
						<button type="submit" id="usersbt" value="Submit">Update</button>				
					</td>
					<td colspan="5">
						<button type="reset" value="Reset" style="background-color:#a32626;">Reset</button>			
					</td>				
				</tr>			
				</table>
				</form>		
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
