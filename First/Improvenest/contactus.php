<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/headfoot.css">
<link rel="stylesheet" href="css/formstyle.css">
</head>
<body style="background-image:url('images/back.jpg');background-size: 100%;background-repeat: no-repeat;">
<!-----------HEADER START-------------->
<div class="row header">
	<img src="images/logS.png">
	<a href="login.php">LOGIN</a>	
	<a href="faq.php">FAQ</a>
	<a href="aboutus.php">ABOUT US</a>
	<a href="index.html">HOME</a>
</div>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<div class="column common" align="center">
		<img src="images/logL.png" style="width: 200px">
		<div style="padding-left:50px;padding-right:50px;">
			<div class="input-form">
				<h1 style="color:white">CONTACT US</h1>
				<h5 style="color:white">If you have any questions reguarding the system, fell free to contact us at any time.</h5>
				<form action="" method="POST">
				<table cellspacing="2" cellpadding="2" border="0" >
				<tr>
					<td colspan="2">
						<p>Name</p>
						<input type="text" placeholder="Name" name="Name" required>				
					</td>
				</tr>
				<tr>				
					<td colspan="2">
						<p>Email</p>
						<input type="text" placeholder="Email" name="EMail" pattern="[a-zA-Z0-9%_+-]+@[a-zA-Z]+\.[a-z]{2,3}" required>				
					</td>			
				</tr>
				<tr>				
					<td colspan="2">
						<p>Your Feedback</p>
						<textarea type="text" rows="4" name="Feedback" required></textarea>				
					</td>			
				</tr>
				<tr>
					<td colspan="2"><br/></td>
				</tr>				
				<tr align="center">
					<td>
						<button type="submit" value="Submit">Submit</button>				
					</td>
					<td>
						<button type="reset" value="Reset" style="background-color:red;">Reset</button>			
					</td>				
				</tr>				
				</table>
				</form>
			</div>	
		</div>	
	</div>
	<div class="column backimage"></div>
</div>
<br/><br/>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include 'php/commonfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>