<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/headfoot.css">
<link rel="stylesheet" href="css/formstyle.css">
</head>
<body style="background-image:url('images/back.jpg');background-size: 100%;background-repeat: no-repeat;">
<!-----------HEADER START-------------->
<?php require sprintf('php/commonheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<div class="column common" align="center">
		<img src="images/logL.png" style="width: 200px">
		<div style="padding-left:100px;padding-right:100px;">
			<div class="input-form" style="padding-bottom:25px;">
				<h1 style="color:white">LOGIN</h1>
				<form action="php/userLogin.php" method="POST">
				<br>
				<input style="width:80%" type="text" placeholder="Username" name="Uname" required>
				<br>
				<input style="width:80%" type="password" placeholder="Password" name="Password" required>
				<br><br>
				<button type="submit" value="Submit" style="background-color:#005b96;">SUBMIT</button>
				</form>
				<br>
				<hr>		
				<h3 style="color:white;">No Account Yet?</h3>
				<a href="signup.php"><button>SIGN UP</button></a>
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