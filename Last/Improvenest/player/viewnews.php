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
<script src="../js/commonjs.js"></script>
</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/playersidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<?php
		if(isset($_GET["id"]))  
		{
			$id = $_GET["id"];
		}
		else
		{
			$id = $_SESSION['id'];
		}
		$_SESSION['id'] = $id;
		
		$sql = "SELECT * FROM news where news_id = '".$id."'";

		$result = $conn->query($sql);
								  
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{		
				echo"<div class='row input-form' style='padding:30px;'>
					<div class='column procol7'>
						<div class='row'>
							<div class='procol9'>
								<h1 style='text-align: center;font-family: Tahoma;font-size: 35px;'>".$row["title"]."</h1>
							</div>
							<div class='procol8'>
								<small style='float:right;'>".$row["added_date"]."</small>
							</div>
						</div>
						<div class='row' style='display: flex;'>
							<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Image' style='width:40%; height: 40%;margin: 15px 40px 50px 0px;float: left;'>
							<p style='float: right; text-align: justify;text-justify: inter-word;font-size: 16px;'>".nl2br($row["bigcontent"])."</p>
						</div>
						<br/>
						<div class='row'>						
							<center>
								<iframe width='800' height='400' src=".$row["link"]." title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
							</center>
						</div>	
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