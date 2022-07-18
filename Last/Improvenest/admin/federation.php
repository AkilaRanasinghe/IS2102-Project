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
<script>
function opassword()	{
    var c=document.userForm.Password.value;
    var d=document.userForm.RPassword.value	
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


    <div class="row" > 
        <br />
	<div class="column common" align="center" style="margin-left:15%; margin-top:1%;">
		<div class="input-form">
			<h1 style="color:white;">Add New Federation</h1>

			<div id="User" class="tabcontent">
            <form action="add_federation.php" name="userForm" method="POST" onsubmit="return opassword()" enctype="multipart/form-data">
				<table cellspacing="2" cellpadding="2" border="0" >
				<tr>
					<td colspan="10">
						<p> <font size=3> Name </font></p>
						<input type="text" placeholder="Name" name="ntitle" required style="height:40px;">				
					</td>		
				</tr>
                <tr>
					<td colspan="10">
						<p> <font size=3>User Name </font></p>
						<input type="text" placeholder="User Name" name="username" required style="height:40px;">				
					</td>		
				</tr>
                <tr>
					<td colspan="10">
						<p> <font size=3>Sport</font></p>
						<input type="text" placeholder="Sport" name="sport" required style="height:40px;">				
					</td>		
				</tr>
                <tr>
					<td colspan="10">
						<p> <font size=3>Email Address</font></p>
						<input type="text" placeholder="Email" name="email" pattern="[a-zA-Z0-9%_+-]+@[a-zA-Z]+\.[a-z]{2,3}" required style="height:40px;">				
					</td>		
				</tr>
				<tr>
					<td colspan="10">
						<p> <font size=3>Contact Number</font></p>
						<input type="number" placeholder="Contact number" name="contact" required style="height:40px;">				
					</td>		
				</tr>


                <tr>
					<td colspan="10">
						<p><font size=3>Password</font></p>
						<input type="text" placeholder="10-20 characters including @, #, $, %, &" name="Password" pattern="[a-zA-Z0-9%@#$&]{10,20}" required style="height:40px;">
					</td>			
				</tr>

                <tr>
                <td colspan="5">
						<p><font size=3>Re-enter password</font></p>
						<input type="text" placeholder="Re-enter password" name="RPassword" required style="height:40px;">				
					</td>
                </tr>

                <tr> 
					<td>
						<button style="width:40%; margin-left: 30px;" type="submit" id="federationbtn" value="Submit">Submit</button>
						<button type="reset" value="Reset" style="background-color:#a32626; width:40%;">Reset</button>
                    </td>			
				</tr>	
				
</table>
</form>
</div></div>
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
