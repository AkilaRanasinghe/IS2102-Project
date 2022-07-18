<?php
session_start();
$_SESSION['uname'] = "";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/headfoot.css">
</head>
<body style="background-image:url('images/back.jpg');background-size: 100%;background-repeat: no-repeat;">
<!-----------HEADER START-------------->
<div class="row header">
	<img src="images/logS.png">
	<a href="login.php">LOGIN</a>	
	<a href="faq.php">FAQ</a>
	<a href="aboutus.php">ABOUT US</a>
	<a href="#" class="active">HOME</a>
</div>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<div class="column common" align="center">
		<div style="padding-left:100px;padding-right:100px;">
			<img src="images/logL.png" style="width: 200px">
			<p style="font-size: 22px; color: white;">Improvenest is a leading sports 
			management community in Sri Lanka. We 
			help our users find what is best for their 
			training sessions including training partners 
			and coaches in collaboration with sports 
			federations to offer the best events and 
			tournaments for you.</p>
		</div>
		<br/>
		<p style="font-size: 20px; color: white;">Join us today to start your training with a boost!</p>
		<br/><br/>
		<a href="signup.php"><button>SIGN UP NOW!</button></a>
	</div>
	<div class="column backimage"></div>
</div>
<br/><br/>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<div class="row footer">
	<div class="column colthird" align="center">
		<p>Copyright © Improvenest</p>
	</div>
	<div class="column colthird" align="center">
		<h1 style="margin:10px 0px 0px 0px;"><a href="contactus.php" style="text-decoration:none;color:black">Contact Us</a></h1>
	</div>
	<div class="column colthird" align="right">
		<div class="column colicon">
			<a href="#"><img class="logo" src="images/insta.png" width="35" height="35" alt="insta"></a>
		</div>
		<div class="column colicon">
			<a href="#"><img class="logo" src="images/whats.png" width="35" height="35" alt="whats"></a>
		</div>
		<div class="column colicon">
			<a href="#"><img class="logo" src="images/face.png" width="35" height="35" alt="face"></a>
		</div>
		<div class="column colicon">
			<a href="#"><img class="logo" src="images/twitter.png" width="35" height="35" alt="twitter"></a>
		</div>
	</div>
</div>
<!-----------FOOTER END-------------->
</body>
</html>