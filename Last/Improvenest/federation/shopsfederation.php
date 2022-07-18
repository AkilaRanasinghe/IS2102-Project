

<?php
include '../php/conn.php';
session_start();
$uname = $_SESSION['uname'];
?>

<?php
$query = mysqli_query($conn, "SELECT * FROM shop WHERE username='$uname'") or die("echo(mysqli_error())");
$row = mysqli_fetch_array($query);
$id = $row["shop_id"];			
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
		<div class="row tab">
			
			<a class="buttonlinks" onclick="openUser(event, 'Details')" id="defaultOpen">Shops</a>
		
			<a class="buttonlinks" onclick="openUser(event, 'Online Purchasing')">Online Purchasing</a>
			
			<a href="addshop.php" button style="float:right" class="fedadd">Add online shop</button></a>
					<a href="addshop.php" button style="float:right" class="fedadd">Add shop details</button></a>

					</div>

		<div id="Details" class="tabcontent">
			<div class="row search-form">
				<div class="approved">
					<h3>Sport shops details and guide</h3>
				</div>
				
				</form>
				</div>
			
				<div class="row">
				
				
				<table width="100%" cellpadding="10px" border="1" style="border-collapse: collapse; ">
    	<thead> 
		</thead>
		<tbody>
            <?php
				$count = 1;
                    
                $sql_query = "SELECT * FROM shop where username='".$uname."' AND Category='Stores'";
                $result = mysqli_query($conn, $sql_query);
                    
				while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr class="raw">
					<div class="shopitem">
					
					
					
								<h2><?php echo $row["name"]; ?></h2>
								
								<?php echo "<img class='imge' src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Avatar'>
								"?>

								
								
								
								<h4><?php echo $row["contact_no"]; ?></h4>
								<h5><?php echo $row["address"]; ?></h5>
								<p><?php echo $row["description"]; ?></p>
								
							
												
							
						<br/>
                    </tr>
				<?php $count++;
            } ?>
        </tbody>
		</table>
						
				
			
	
					
					</div>			
		</div>
	
					
		


<div id="Online Purchasing" class="tabcontent">
        <div class="row search-form">
				<div class="approved">
					<h3>Online Purchasing stores</h3>
				</div>
				
				</form>
				
			</div>
				<div class="row">
			<?php
			$sql="SELECT DISTINCT shop_id FROM shop_sport WHERE sport IN (SELECT sport FROM player_sport WHERE username = '" .$uname. "')";
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
							<div class='row'>
									<img class='imge' src='data:image/jpeg;base64," . base64_encode($roww["image"]) . "' alt='Logo'>
									<h2>".$roww["name"]."</h2>
									<h4>".$roww["contact_no"]."</h4>
									<h5>".$roww["address"]."</h5>
									<p>".$roww["description"]."</p>
									<a href='viewshop.php?sid=".$shopid."'><button>Buy Items</button></a>
								</div>
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