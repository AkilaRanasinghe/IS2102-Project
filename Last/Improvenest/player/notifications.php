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
<link rel="stylesheet" href="../css/pagination.css"/>
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
				<h1>Your Messages</h1>
			</div>		
		</div>
		<div class="maintabcontent">
			<div class="row" style="padding-bottom:20px;">
				<div style="width:95%; margin:0 auto;">
					<center>  
						<?php
							$limit = 5;    
							if (isset($_GET["page"]))
							{    
								$page_number  = $_GET["page"];    
							}
							else 
							{
								 $page_number=1;
							}
							date_default_timezone_set('Asia/Colombo');

							$initial_page = ($page_number-1) * $limit;       
							$getQuery = "SELECT * FROM player_notification WHERE player_username = '".$uname."' ORDER BY date DESC, time DESC LIMIT $initial_page, $limit";     
							$result = mysqli_query ($conn, $getQuery);    
	  
							echo"<br>   
							<div>";
							
								if($result->num_rows > 0)
								{
									echo"<table style='border-spacing: 0 15px;'>    
										<tbody>"; 
										
										while ($row = mysqli_fetch_array($result)) 
										{
											$time = date("g:i a", strtotime($row["time"]));
											$today = date('Y-m-d', time());
											$date = $row["date"];
											if($date == $today)
											{
												echo "<tr class='horitemtoday' style='float:none;padding:10px;'>
														<td style='border-radius: 5px 0px 0px 5px;width:85%;padding:30px;text-align:justify;text-justify:inter-word;'><p>".$row['notification']."</p></td>
														<td style='border-radius: 0px 5px 5px 0px;text-align: right;width:15%;padding:30px;'><small>".$row["date"]."</small><br><small>".$time."</small></td>
													</tr>";												
											}
											else
											{
												echo "<tr class='horitem' style='float:none;padding:10px;'>
														<td style='border-radius: 5px 0px 0px 5px;width:85%;padding:30px;text-align:justify;text-justify:inter-word;'><p>".$row['notification']."</p></td>
														<td style='border-radius: 0px 5px 5px 0px;text-align: right;width:15%;padding:30px;'><small>".$row["date"]."</small><br><small>".$time."</small></td>
													</tr>";												
											}							
										}
										echo"</tbody>
									</table>";								
								}
								else
								{
									echo "<div class='procol7'><h3>No messages received.</h3></div>";
								}   

								echo"<div class='items'>";
									$getQuery = "SELECT COUNT(*) FROM player_notification WHERE player_username = '".$uname."'";     
									$result = mysqli_query($conn, $getQuery);     
									$row = mysqli_fetch_row($result);     
									$total_rows = $row[0];              

									echo "</br>";

									$total_pages = ceil($total_rows / $limit);     
									$pageURL = "";             

									if($page_number>=2)
									{
										echo "<a style='border-radius:5px 0px 0px 5px;' href='notifications.php?page=".($page_number-1)."'>  Prev </a>";   
									}                          

									for ($i=1; $i<=$total_pages; $i++) 
									{   
										if ($i == $page_number) 
										{   
											$pageURL .= "<a class = 'active' href='notifications.php?page=".$i."'>".$i." </a>";   
										}               
										else
										{   
											$pageURL .= "<a href='notifications.php?page=".$i."'>".$i." </a>";     
										}
									}    

									echo $pageURL;    

									if($page_number<$total_pages)
									{   
										echo "<a style='border-radius:0px 5px 5px 0px;' href='notifications.php?page=".($page_number+1)."'>  Next </a>";   
									}
								echo"</div>
							</div>";
						?> 
					</center>				  
				</div>			
			</div>			
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
