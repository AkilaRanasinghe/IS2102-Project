<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/headfoot.css">
<link rel="stylesheet" href="css/accordion.css">
</head>
<body style="background-image:url('images/back.jpg');background-size: 100%;background-repeat: no-repeat;">
<!-----------HEADER START-------------->
<div class="row header">
	<img src="images/logS.png">
	<a href="login.php">LOGIN</a>	
	<a href="#" class="active">FAQ</a>
	<a href="aboutus.php">ABOUT US</a>
	<a href="index.html">HOME</a>
</div>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<div class="column common" align="center">
		<img src="images/logL.png" style="width: 200px">
		<div style="color:white;padding-left:50px;padding-right:50px;">
			<h1>FREQUENTLY ASKED QUESTIONS</h1>
			<br/>
			<button class="accordion">Question 1</button>
			<div class="panel">
				<p>Answer 1</p>
				<hr/>
			</div>
			<button class="accordion">Question 2</button>
			<div class="panel">
				<p>Answer 2</p>
				<hr/>
			</div>
			<button class="accordion">Question 3</button>
			<div class="panel">
				<p>Answer 3</p>
				<hr/>
			</div>
			<button class="accordion">Question 4</button>
			<div class="panel">
				<p>Answer 4</p>
				<hr/>
			</div>
			<button class="accordion">Question 5</button>
			<div class="panel">
				<p>Answer 5</p>
				<hr/>
			</div>
			<button class="accordion">Question 6</button>
			<div class="panel">
				<p>Answer 6</p>
				<hr/>
			</div>			
		</div>	
	</div>
	<div class="column backimage"></div>
</div>
<br/><br/>
<script src="js/commonjs.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include 'php/commonfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>