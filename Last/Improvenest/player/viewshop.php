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
		<div class="row search-form">
			<div class="column procol4">
				<h1>Items</h1>
			</div>
			<div class="column procol5" style="padding-top:25px;">
				<form action="searchitem.php" method="POST">
				<table cellspacing="2" cellpadding="2" border="0" width="100%" style="float:right">
				<tr>
					<td>
						<input type="text" placeholder="Search.." name="search" required>					
					</td>
					<td width="150px">
						<select name="sort">
							<option value="" selected disabled>-Sort-</option>
							<option value="New">Brand New</option>
							<option value="Used">Re-conditioned</option>
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
			if(isset($_GET["sid"]))  
			{
				$sid = $_GET["sid"];
			}
			else
			{
				$sid = $_SESSION['sid'];
			}
			$_SESSION['sid'] = $sid;
			
			$sqll = "SELECT * FROM item WHERE shop_id = '".$sid."'";
			$resultt = $conn->query($sqll);
								  
			if($resultt->num_rows > 0)
			{
				while($roww = $resultt->fetch_assoc())
				{
					$itemid = $roww["item_id"];
					echo"<div class='item'>
						<img class='imge' src='data:image/jpeg;base64," . base64_encode($roww["image"]) . "' alt='Logo'>
						<h3>".$roww["name"]."</h3>
						<p>Rs. ".$roww["price"]."/=</p>";
						$type = $roww["type"];
						if($type == 'New')
						{
							echo"<small>Brand New</small>";
						}
						else
						{
							echo"<small>Re-conditoned</small>";
						}
						$stock = $roww["stock"];
						if($stock > 0)
						{
							echo"<a href='viewitem.php?iid=".$itemid."'><button>View Product</button></a>";							
						}
						else
						{
							echo"<a href=''><button style='color:#ff6161;' disabled>Out Of Stock</button></a>";							
						}
						echo"</div>";
				}							
			}
			else
			{
				echo "<div class='procol7'><h3>No items in the shop.</h3></div>";
			}
			?>	
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
