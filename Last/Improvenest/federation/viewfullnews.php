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
<link rel="stylesheet" href="../css/federation.css">
<link rel="stylesheet" href="../css/card.css"/>
<script src="../js/commonjs.js"></script>
</head>
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
		<?php
		if(isset($_GET["news_id"]))  
		{
			$news_id = $_GET["news_id"];
		}
		else
		{
			$news_id = $_SESSION['news_id'];
		}
		$_SESSION['news_id'] = $news_id;
		
		$sql = "SELECT * FROM news where news_id = '".$news_id."'";

		$result = $conn->query($sql);
								  
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{		
				echo"<div class='row input-form' style='padding:30px;'>
					<div class='column procol7'>
						<div class='row'>
						<div class='column procol6'>
					<h4><i>Added date : ".$row["added_date"]." </i></h4>
					</div>
						
							<div class='procol9'>
				
								<h1 style='text-align: center; text-decoration: underline; font-family: Tahoma;font-size: 35px;'>".$row["title"]."</h1>
							</div>
							
						</div>
						<div class='row' style='display: flex;'>
							<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Image' style='width:40%; height: 40%;margin: 15px 40px 50px 0px;float: left;'>
							<p style='float: right;  line-height: 150%; text-align: justify;text-justify: inter-word;font-size: 16px;'>".nl2br($row["content"])."</p>
						
							
						</div>

		
	
						<center>
						<iframe width='800' height='400' src= ".$row["link"]." title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
							</iframe></center>
						<br>
						<br>
						<br>
							<p style ='float: right; line-height: 150%; text-align: justify;text-justify: inter-word;font-size: 16px;'>".nl2br($row["bigcontent"])."</p>
						

					</div>
				</div>";
			}
		}
		?>						
		<br/>
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

