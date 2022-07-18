<?php
$uname = "";
session_start();
$uname = $_SESSION['uname'];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/headfoot.css">
<link rel="stylesheet" href="css/formstyle.css">
<link rel="stylesheet" href="css/card.css"/>
</head>
<body style="background-image:url('images/back.jpg');background-size: 100%;background-repeat: no-repeat;">
<!-----------HEADER START-------------->
<?php 
if($uname == "")
{
	require sprintf('php/commonheader.php',__DIR__);		
}
else
{
	echo"<div class='row header'>
			<img src='images/logS.png'>
			<a href='php/logout.php'>LOGOUT</a>		
			<a href='faq.php'>FAQ</a>
			<a class='active' href='aboutus.php'>ABOUT US</a>	
		</div>";
}
?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<div class="column common" align="center">
		<img src="images/logL.png" style="width: 200px">
		<div style="color:white;padding-left:50px;padding-right:50px;">
			<div class="input-form">
				<h1>ABOUT US</h1>
				<p style="width:80%;font-size: 16px;">Improvenest is being built as a platform to interconnect sport related communities to 
				effectively and efficiently manage individual trainings of sportsmen and sports events. 
				It facilitates Players, Coaches, Organizers and Sports Federations to connect with each other. 
				Providing a long term practical solution for the identified problem is the goal of this system. 
				The measures this system offers are developed with the consultation of the professionals in the field.
				This project will enhance the current sports competitiveness of athletes by providing necessary 
				facilities and it will encourage others who have an interest in sports to enter the sports industry.</p>
				<div class="row">
					<div class="ite">
						<div class="card">
							<img src="images/Chavi.jpg" class="imge">
							<h3>Chavinda</h3>
							<h6>19020694</h6>
						</div>			
					</div>
					<div class="ite">
						<div class="card">
							<img src="images/Nethz.jpg" class="imge">
							<h3>Nethmini</h3>
							<h6>19020491</h6>
						</div>			
					</div>
					<div class="ite">
						<div class="card">
							<img src="images/Ruwa.jpg" class="imge">
							<h3>Ruwani</h3>
							<h6>19020473</h6>
						</div>			
					</div>
					<div class="ite">
						<div class="card">
							<img src="images/Aki.jpg" class="imge">
							<h3>Akila</h3>
							<h6>19020651</h6>
						</div>			
					</div>					
				</div>
			</div>
			<br/>
		</div>
		<div class="column backimage"></div>
	</div>
</div>
<br/><br/>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include 'php/commonfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>