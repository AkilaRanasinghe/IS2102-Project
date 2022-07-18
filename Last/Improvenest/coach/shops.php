<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css">
<link rel="stylesheet" href="../css/card.css"/>
<script src="../js/common.js"></script>
<style>
.shopitem{
	height: 600px;
}
</style>
</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
<?php include '../php/coachsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row search-form">
			<div class="column procol4">
				<h1>Shops</h1>
			</div>
			<div class="column procol5" style="padding-top:25px;">
				<form action="searchShop.php" method="POST">
				<table cellspacing="2" cellpadding="2" border="0" width="100%" style="float:right">
				<tr>
					<td>
						<input type="text" placeholder="Search.." name="search">
					</td>
					<td width="150px">
						<select name="sort">
							<option value="" selected disabled>-Sort-</option>
							<option value="squ">Squash</option>
							<option value="ten">Tennis</option>
							<option value="bad">Badminton</option>
							<option value="arc">Archery</option>
							<option value="mma">MMA</option>
						</select>
					</td>
					<td width="20px">
						<button type="submit"><img src="../images/csearch.png"></button>
					</td>
				</tr>
				</table>
				</form>
			</div>
		</div>
		<div class="row">
			<?php
$sql="SELECT DISTINCT shop_id FROM shop_sport WHERE sport IN (SELECT sport FROM coach_sport WHERE username='".$uname."')";
			$result = $conn->query($sql);

			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					$shopid = $row["shop_id"];
					$sqll = "SELECT * FROM shop WHERE shop_id = '".$shopid."'";
					$resultt = $conn->query($sqll);

					if($resultt->num_rows > 0)
					{
						while($roww = $resultt->fetch_assoc())
						{
							echo"<div class='shopitem'>
									<img class='imge' src='data:image/jpeg;base64," . base64_encode($roww["image"]) . "' alt='Logo'>

									<h2>".$roww["name"]."</h2>
									<h4>".$roww["contact_no"]."</h4>
									<h5>".$roww["address"]."</h5>
									<p>".$roww["description"]."</p>
									<a href='viewshop.php?sid=".$shopid."'><button>Buy Items</button></a>
								</div>";
						}
					}
					else
					{
						echo "<div class='procol7'><h3>No details about shops.</h3></div>";
					}
				}
			}
			else
			{
				echo "<div class='procol7'><h3>No shops related to your sports.</h3></div>";
			}
			?>
		</div>
	</div>
	<!-----------CONTENTS END-------------->
</div>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<?php mysqli_close($conn);?>
<script src="../js/activejs.js" charset="utf-8"></script>
<!-----------FOOTER END-------------->
</body>
</html>
