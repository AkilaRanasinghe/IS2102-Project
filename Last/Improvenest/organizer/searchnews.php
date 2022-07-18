<?php
include '../php/conn.php';
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too
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
	<?php include '../php/organisersidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row search-form">
			<div class="column procol4">
				<h1>Search Results</h1>
			</div>
			<div class="column procol5" style="padding-top:25px;">
				<form action="searchnews.php" method="POST">
				<table cellspacing="2" cellpadding="2" border="0" width="100%" style="float:right">
				<tr>
					<td>
						<input type="text" placeholder="Search.." name="search" required>					
					</td>
					<td width="150px">
						<select name="sort">
							<option value="" selected disabled>-Sort-</option>
							<option value="desc">Latest</option>
							<option value="asce">Oldest</option>
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
		<div class="maintabcontent">
			<div class="row tab" style="padding-left:0px;">
				<a class="buttonlinks" onclick="openUser(event, 'Updates')" id="defaultOpen" style="width:50%;">Sports Updates</a>
				<a class="buttonlinks" onclick="openUser(event, 'Tips')" style="width:50%;">Improving Tips</a>
			</div>
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

			if($sort == "desc" || $sort == "")
			{
				echo"<div class='row'>
					<div id='Updates' class='tabcontent'>
						<div class='row'>";
						
							$sql="SELECT DISTINCT * FROM news WHERE CONCAT(title, '', content) LIKE '%" . $search . "%' AND Category = 'Updates' ORDER BY added_date DESC";
							$result = $conn->query($sql);

							if($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{
									$id = $row["news_id"];
									$text = $row["content"];
									echo"<div class='horitem'>
										<div class='procol4'>
											<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Image' class='horimge'>
										</div>
										<div class='procol5' style='padding:0px 30px 0px 30px;'>
											<div class='row'>
												<div class='procol9'>
													<h2>".$row["title"]."</h2>
												</div>
												<div class='procol8'>
													<small style='float:right;'>".$row["added_date"]."</small>
												</div>
											</div>
											<p>".$row["content"]."</p>
											<a href='viewnews.php?id=".$id."' style='float:right; text-decoration: none; color:white;'><small>See More >>> </small></a>
										</div>							
									</div>";										
								}
							}
							else
							{
								echo "<div class='procol7'><h3>No search results related to your keyword.</h3></div>";
							}
						echo"</div>					
					</div>				
				</div>
				<div class='row'>
					<div id='Tips' class='tabcontent'>
						<div class='row'>";
						
							$sql="SELECT DISTINCT * FROM news WHERE CONCAT(title, '', content) LIKE '%" . $search . "%' AND Category = 'Tips' ORDER BY added_date DESC";
							$result = $conn->query($sql);

							if($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{
									$id = $row["news_id"];
									$text = $row["content"];
									echo"<div class='horitem'>
										<div class='procol4'>
											<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Image' class='horimge'>
										</div>
										<div class='procol5' style='padding:0px 30px 0px 30px;'>
											<div class='row'>
												<div class='procol9'>
													<h2>".$row["title"]."</h2>
												</div>
												<div class='procol8'>
													<small style='float:right;'>".$row["added_date"]."</small>
												</div>
											</div>
											<p>".$row["content"]."</p>
											<a href='viewnews.php?id=".$id."' style='float:right; text-decoration: none; color:white;'><small>See More >>> </small></a>
										</div>							
									</div>";										
									
								}
							}
							else
							{
								echo "<div class='procol7'><h3>No search results related to your keyword.</h3></div>";
							}							
						echo"</div>					
					</div>				
				</div>";
			}
			else
			{
				echo"<div class='row'>
					<div id='Updates' class='tabcontent'>
						<div class='row'>";
						
							$sql="SELECT DISTINCT * FROM news WHERE CONCAT(title, '', content) LIKE '%" . $search . "%' AND Category = 'Updates' ORDER BY added_date ASC";
							$result = $conn->query($sql);

							if($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{
									$id = $row["news_id"];
									$text = $row["content"];
									echo"<div class='horitem'>
										<div class='procol4'>
											<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Image' class='horimge'>
										</div>
										<div class='procol5' style='padding:0px 30px 0px 30px;'>
											<div class='row'>
												<div class='procol9'>
													<h2>".$row["title"]."</h2>
												</div>
												<div class='procol8'>
													<small style='float:right;'>".$row["added_date"]."</small>
												</div>
											</div>
											<p>".$row["content"]."</p>
											<a href='viewnews.php?id=".$id."' style='float:right; text-decoration: none; color:white;'><small>See More >>> </small></a>
										</div>							
									</div>";										
										
								}
							}
							else
							{
								echo "<div class='procol7'><h3>No search results related to your keyword.</h3></div>";
							}
						echo"</div>					
					</div>				
				</div>
				<div class='row'>
					<div id='Tips' class='tabcontent'>
						<div class='row'>";
						
							$sql="SELECT DISTINCT * FROM news WHERE CONCAT(title, '', content) LIKE '%" . $search . "%' AND Category = 'Tips' ORDER BY added_date ASC";
							$result = $conn->query($sql);

							if($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
								{
									$id = $row["news_id"];
									$text = $row["content"];
									echo"<div class='horitem'>
										<div class='procol4'>
											<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Image' class='horimge'>
										</div>
										<div class='procol5' style='padding:0px 30px 0px 30px;'>
											<div class='row'>
												<div class='procol9'>
													<h2>".$row["title"]."</h2>
												</div>
												<div class='procol8'>
													<small style='float:right;'>".$row["added_date"]."</small>
												</div>
											</div>
											<p>".$row["content"]."</p>
											<a href='viewnews.php?id=".$id."' style='float:right; text-decoration: none; color:white;'><small>See More >>> </small></a>
										</div>							
									</div>";										
										
								}
							}
							else
							{
								echo "<div class='procol7'><h3>No search results related to your keyword. 	</h3></div>";
							}							
						echo"</div> 					
					</div>	
							
				</div>";				
			}
			?>
		</div>
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