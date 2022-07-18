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
		<?php include '../php/coachsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row search-form">
			<div class="column procol4">
				<h1>News</h1>
			</div>
			<div class="column procol5" style="padding-top:25px;">
				<form action="searchnews.php" method="POST">
				<table cellspacing="2" cellpadding="2" border="0" width="100%" style="float:right">
				<tr>
					<td>
						<input type="text" placeholder="Search.." name="search">
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
			<div class='row'>
				<div id="Updates" class="tabcontent">
					<div class="row">
						<?php
						$sql="SELECT DISTINCT nw.news_id, nw.title, nw.content, nw.added_date, nw.image FROM news nw, news_sport ns where nw.news_id = ns.news_id AND ns.sport IN (SELECT sport FROM coach_sport WHERE username = '" .$uname. "') AND nw.Category = 'Updates' ORDER BY nw.added_date DESC";
						$result = mysqli_query($conn,$sql);

						if(mysqli_num_rows($result) > 0)

						{
							while($row = mysqli_fetch_assoc($result))
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
										<p style='font-family: Garamond, serif;text-align: justify;text-justify: inter-word;'>".nl2br(substr($text, 0, 750))."</p>
										<a href='viewnews.php?id=".$id."' style='float:right; text-decoration: none; color:white;'><small>See More >>> </small></a>
									</div>
								</div>";
							}
						}
						else
						{
							echo "<div class='procol7'><h3>Await News.</h3></div>";
						}
						?>
					</div>
				</div>

					<div class='row'>
						<div id="Tips" class="tabcontent">
								<?php
								$sql="SELECT DISTINCT nw.news_id, nw.title, nw.content, nw.added_date, nw.image FROM news nw, news_sport ns where nw.news_id = ns.news_id AND ns.sport IN (SELECT sport FROM coach_sport WHERE username = '" .$uname. "') AND nw.Category = 'Tips' ORDER BY nw.added_date DESC";
								$result = mysqli_query($conn,$sql);

								if(mysqli_num_rows($result) > 0)

								{
									while($row = mysqli_fetch_assoc($result))
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
												<p style='font-family: Garamond, serif;text-align: justify;text-justify: inter-word;'>".nl2br(substr($text, 0, 750))."</p>
												<a href='viewnews.php?id=".$id."' style='float:right; text-decoration: none; color:white;'><small>See More >>> </small></a>
												</div>
										</div>";
									}
								}
								else
								{
									echo "<div class='procol7'><h3>Await News.</h3></div>";
								}
								?>
							</div>
				</div>
			</div>
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
