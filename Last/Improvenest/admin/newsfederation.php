
<!-- add view,  delete button
add attention grabber box and content box
add view page that views fullscreen blog style -->



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
	<?php include '../php/adminsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
    <div class="column contents">
		<div class="row tab">
			<a class="buttonlinks" onclick="openUser(event, 'Updates')" id="defaultOpen">Sports Updates</a>
			<a class="buttonlinks" onclick="openUser(event, 'Tips')">Improving Tips</a>
			
			
			
			<a href="addnews.php" button style="float:right" class="fedadd">Add news</button></a>

					</div>

		<div id="Updates" class="tabcontent">
			<div class="row search-form">
				<div class="newssubhead">
					<h3> Latest sport related news and updates </h3>
				</div>
				<div class="approvedsearch" style="padding-top:10px;">
					<form action="" method="POST">
					<table cellspacing="2" cellpadding="2" border="0" style="float:right">
					<tr>
						<td>
							<input type="text" placeholder="Search.." name="search">					
						</td>
						<td>
							<select name="sort">
								<option value="" selected disabled>-Sort-</option>
								<option value="asce">Ascending</option>
								<option value="desc">Descending</option>
							</select>					
						</td>
						<td>
							<button type="submit"><img src="../images/csearch.png"></button>
						</td>
					</tr>
					</table>
					</form>
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
                    
                $sql_query = "SELECT * FROM news where username='".$uname."' AND Category='Updates'";
                $result = mysqli_query($conn, $sql_query);
                    
				while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr class="raw">
					<div class="row">
					<div class="horitem">
					
					
								<h2><?php 
								
								echo $row["title"]; ?></h2>
								<div class="column procol4">
								<?php echo "<img class='shopimage' src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Avatar'>
								"?>
												
							</div>
							
							<div class="column procol5">
								
						
								<p><?php echo $row["content"]; ?></p>
								
								 
								
								<a href="viewfullnews.php?news_id=<?php echo $row["news_id"]; ?>" button style="float:right" class="newsaddfull">View more</button></a>
												
							</div>
						</div>
						<br/>
                    </tr>
				<?php $count++;
            } ?>
        </tbody>
		</table>
						
				
			
	
					
					</div>			
		</div>
	
					
		

		<div id="Tips" class="tabcontent">
        <div class="row search-form">
		<div class="newssubhead">
				
					<h3>Best tips and suggestions for improvement </h3>
				</div>
				<div class="approvedsearch" style="padding-top:10px;">
					<form action="" method="POST">
					<table cellspacing="2" cellpadding="2" border="0" style="float:right">
					<tr>
						<td>
							<input type="text" placeholder="Search.." name="search">					
						</td>
						<td>
							<select name="sort">
								<option value="" selected disabled>-Sort-</option>
								<option value="asce">Ascending</option>
								<option value="desc">Descending</option>
							</select>					
						</td>
						<td>
							<button type="submit"><img src="../images/csearch.png"></button>
						</td>
					</tr>
					</table>
					</form>
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
                    
                $sql_query = "SELECT * FROM news where username='".$uname."'  AND Category='Tips'";
                $result = mysqli_query($conn, $sql_query);
                    
				while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr class="raw">
					<div class="row">
					<div class="horitem">
					
					
								<h2><?php echo $row["title"]; ?></h2>
								<div class="column procol4">
								<?php echo "<img class='shopimage' src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Avatar'>
								"?>
												
							</div>
							
							<div class="column procol5">
								
						
								<p><?php echo $row["content"]; ?></p>
								
								
								<a href="viewfullnews.php?news_id=<?php echo $row["news_id"]; ?>" button style="float:right" class="newsaddfull">View more</button></a>
									
												
							</div>
						</div>
						<br/>
                    </tr>
				<?php $count++;
            } ?>
        </tbody>
		</table>
						
				
			
	
					
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