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
							<option value="mmm">MMM</option>
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
			$search = "";
			$sort ="";

			if(isset($_POST['search']))
				{
					$search = $_POST["search"];
				}
			if(isset($_POST['sort']))
				{
					$sort = $_POST["sort"];
				}

			if($sort == "squ")
			{
				$sql=" SELECT DISTINCT * FROM shop WHERE CONCAT(name, '', contact_no, '', address, '', description) LIKE '%" . $search . "%'";
				$result = $conn->query($sql);

				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$shopid = $row["shop_id"];
						$sqll = "SELECT sport FROM shop_sport WHERE shop_id = '".$shopid."'";
						$resultt = $conn->query($sqll);

						if($resultt->num_rows >= 0)
						{
							$data = array();
							while($roww = $resultt->fetch_assoc())
							{
								$data[] = $roww["sport"];
							}
						}

						if(in_array("Squash" ,$data ))
						{
							echo"<div class='shopitem'>
									<img class='imge' src='data:image/jpeg;base64," . base64_encode($row["image"]) . "' alt='Logo'>
									<h2>".$row["name"]."</h2>
									<h4>".$row["contact_no"]."</h4>
									<h5>".$row["address"]."</h5>
									<p>".$row["description"]."</p>
									<a href='viewshop.php?sid=".$shopid."'><button>Buy Items</button></a>
								</div>";
						}
					}
				}
				else
				{
					echo "<div class='procol7'><h3>No search results related to your keyword.</h3></div>";
				}				
			}
			elseif($sort == "ten")
			{
				$sql=" SELECT DISTINCT * FROM shop WHERE CONCAT(name, '', contact_no, '', address, '', description) LIKE '%" . $search . "%'";
				$result = $conn->query($sql);

				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$shopid = $row["shop_id"];
						$sqll = "SELECT sport FROM shop_sport WHERE shop_id = '".$shopid."'";
						$resultt = $conn->query($sqll);

						if($resultt->num_rows >= 0)
						{
							$data = array();
							while($roww = $resultt->fetch_assoc())
							{
								$data[] = $roww["sport"];
							}
						}

						if(in_array("Tennis" ,$data ))
						{
							echo"<div class='shopitem'>
									<img class='imge' src='data:image/jpeg;base64," . base64_encode($row["image"]) . "' alt='Logo'>
									<h2>".$row["name"]."</h2>
									<h4>".$row["contact_no"]."</h4>
									<h5>".$row["address"]."</h5>
									<p>".$row["description"]."</p>
									<a href='viewshop.php?sid=".$shopid."'><button>Buy Items</button></a>
								</div>";
						}
					}
				}
				else
				{
					echo "<div class='procol7'><h3>No search results related to your keyword.</h3></div>";
				}
			}
			elseif($sort == "bad")
			{
				$sql=" SELECT DISTINCT * FROM shop WHERE CONCAT(name, '', contact_no, '', address, '', description) LIKE '%" . $search . "%'";
				$result = $conn->query($sql);

				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$shopid = $row["shop_id"];
						$sqll = "SELECT sport FROM shop_sport WHERE shop_id = '".$shopid."'";
						$resultt = $conn->query($sqll);

						if($resultt->num_rows >= 0)
						{
							$data = array();
							while($roww = $resultt->fetch_assoc())
							{
								$data[] = $roww["sport"];
							}
						}

						if(in_array("Badminton" ,$data ))
						{
							echo"<div class='shopitem'>
									<img class='imge' src='data:image/jpeg;base64," . base64_encode($row["image"]) . "' alt='Logo'>
									<h2>".$row["name"]."</h2>
									<h4>".$row["contact_no"]."</h4>
									<h5>".$row["address"]."</h5>
									<p>".$row["description"]."</p>
									<a href='viewshop.php?sid=".$shopid."'><button>Buy Items</button></a>
								</div>";
						}
					}
				}
				else
				{
					echo "<div class='procol7'><h3>No search results related to your keyword.</h3></div>";
				}	
			}
			elseif($sort == "arc")
			{
				$sql=" SELECT DISTINCT * FROM shop WHERE CONCAT(name, '', contact_no, '', address, '', description) LIKE '%" . $search . "%'";
				$result = $conn->query($sql);

				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$shopid = $row["shop_id"];
						$sqll = "SELECT sport FROM shop_sport WHERE shop_id = '".$shopid."'";
						$resultt = $conn->query($sqll);

						if($resultt->num_rows >= 0)
						{
							$data = array();
							while($roww = $resultt->fetch_assoc())
							{
								$data[] = $roww["sport"];
							}
						}

						if(in_array("Archery" ,$data ))
						{
							echo"<div class='shopitem'>
									<img class='imge' src='data:image/jpeg;base64," . base64_encode($row["image"]) . "' alt='Logo'>
									<h2>".$row["name"]."</h2>
									<h4>".$row["contact_no"]."</h4>
									<h5>".$row["address"]."</h5>
									<p>".$row["description"]."</p>
									<a href='viewshop.php?sid=".$shopid."'><button>Buy Items</button></a>
								</div>";
						}
					}
				}
				else
				{
					echo "<div class='procol7'><h3>No search results related to your keyword.</h3></div>";
				}
			}
			elseif($sort == "mmm")
			{
				$sql=" SELECT DISTINCT * FROM shop WHERE CONCAT(name, '', contact_no, '', address, '', description) LIKE '%" . $search . "%'";
				$result = $conn->query($sql);

				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$shopid = $row["shop_id"];
						$sqll = "SELECT sport FROM shop_sport WHERE shop_id = '".$shopid."'";
						$resultt = $conn->query($sqll);

						if($resultt->num_rows >= 0)
						{
							$data = array();
							while($roww = $resultt->fetch_assoc())
							{
								$data[] = $roww["sport"];
							}
						}

						if(in_array("Mixed Martial Arts" ,$data ))
						{
							echo"<div class='shopitem'>
									<img class='imge' src='data:image/jpeg;base64," . base64_encode($row["image"]) . "' alt='Logo'>
									<h2>".$row["name"]."</h2>
									<h4>".$row["contact_no"]."</h4>
									<h5>".$row["address"]."</h5>
									<p>".$row["description"]."</p>
									<a href='viewshop.php?sid=".$shopid."'><button>Buy Items</button></a>
								</div>";
						}
					}
				}
				else
				{
					echo "<div class='procol7'><h3>No search results related to your keyword.</h3></div>";
				}
			}
			else
			{
				$sql=" SELECT DISTINCT * FROM shop WHERE CONCAT(name, '', contact_no, '', address, '', description) LIKE '%" . $search . "%'";
				$result = $conn->query($sql);

				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$shopid = $row["shop_id"];
						echo"<div class='shopitem'>
							<img class='imge' src='data:image/jpeg;base64," . base64_encode($row["image"]) . "' alt='Logo'>
							<h2>".$row["name"]."</h2>
							<h4>".$row["contact_no"]."</h4>
							<h5>".$row["address"]."</h5>
							<p>".$row["description"]."</p>
							<a href='viewshop.php?sid=".$shopid."'><button>Buy Items</button></a>
						</div>";
					}
				}
				else
				{
					echo "<div class='procol7'><h3>No search results related to your keyword.</h3></div>";
				}				
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
