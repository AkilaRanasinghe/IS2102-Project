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

<script>
function apassword()	{
    var c=document.adminProfileUpdate.Password.value;
    var d=document.adminProfileUpdate.RPassword.value;	
    if(c!=d)
	{
		alert("Passsword Mismatch!");
		return false;
    }
    if(c.length<8 || c.length>20)
	{
		alert("Password must contain only 8-20 characters");
		return false;
    }
    return( true );	
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
	<?php include '../php/adminsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="input-form" style="padding:20px 150px 20px 150px;">
			<h1>Edit Profile</h1>
				<form action="../php/adminUpdate.php" name="adminProfileUpdate" method="POST" onsubmit="return apassword()">
				<?php
				$sql="SELECT * FROM admin WHERE username = '" .$uname. "'";
				$result=$conn->query ($sql);
				if ($result -> num_rows >0)
				{
					while ($row= $result -> fetch_assoc())
					{
						$uname = $row ['username'];
						$mobile = $row ['contact_no'];
						$email = $row ['email'];
						$address = $row ['address'];
						$password = $row ['password'];
					}
				}
				?>				
				<table cellspacing="2" cellpadding="2" border="0" >
				<tr>
					<td colspan="5">
						<p>User Name</p>
						<input type="text" placeholder="User Name" value="<?php echo $uname ?>" name="uname" required disabled>				
					</td>			
				</tr>
                <tr>
					<td colspan="5">
						<p>Email</p>
						<input type="text" placeholder="Email" value="<?php echo $email ?>" name="EMail" pattern="[a-zA-Z0-9%_+-]+@[a-zA-Z]+\.[a-z]{2,3}" required disabled>												
					</td>			
				</tr>
				<tr>
					<td colspan="5">
						<p>Contact Number</p>
						<input type="text" placeholder="Contact Number" value="<?php echo $mobile ?>" name="Contact" pattern="[0-9]{10}" required>							
					</td>
                </tr>
				<tr>
					<td colspan="5">
						<p>Address</p>
						<input type="text" placeholder="Address" value="<?php echo $address ?>" name="Address" required>	
					</td>			
				</tr>
				<tr>
					<td colspan="5">
						<p>Password</p>
						<input type="password" placeholder="10-20 characters including @, #, $, %, &" value="<?php echo $password ?>" name="Password" pattern="[a-zA-Z0-9%@#$&]{10,20}" required>			
					</td>
                </tr>
                <tr>
					<td colspan="5">
						<p>Re-enter password</p>
						<input type="password" placeholder="Re-enter password" value="<?php echo $password ?>" name="RPassword" required>				
					</td>			
				</tr>
				<tr>
					<td colspan="10"><br/></td>
				</tr>
				<tr align="center">
					<td colspan="3">
						<button type="submit" id="adminsbt" value="Submit">Update</button>				
					</td>
					<td colspan="3">
						<button type="reset" value="Reset" style="background-color:#a32626;">Reset</button>			
					</td>				
				</tr>			
				</table>
				</form>		
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