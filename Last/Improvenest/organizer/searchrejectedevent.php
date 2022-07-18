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
	<?php include '../php/organisersidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row tab">
			<a href="event.php" >Approved</a>
			<a href="eventpending.php">Pending</a>
			<a href="eventrejected.php"  class="active">Rejected</a>

			<a href="addEvent.php"><button type="submit" style="width:100%; background-color: #50AEC4; font-family:arial; width: 200%; height: 40px; font-size: 17px; margin-top: -40px; margin-bottom: -40px; margin-left: 390%; padding-top: 7px; border-radius: 5px 5px 5px 5px;">Add Event</button></a> 
		</div>
		<div class="maintabcontent">		
			<div class="row search-form">
				<div class="column procol4">
					<h1>Search Results</h1>
				</div>
				<div class="column procol5" style="padding-top:25px;">
					<form action="searchrejectedevent.php" method="POST">
					<table cellspacing="2" cellpadding="2" border="0" width="100%" style="float:right">
					<tr>
						<td>
							<input type="text" placeholder="Search.." name="search" required>					
						</td>
						<td width="20px">
							<button type="submit"><img src="../images/csearch.png"></button>
						</td>
					</tr>
					</table>
					</form>
				</div>
			</div>

            <?php
                $search = "";
                

                if(isset($_POST['search']))
                {
                    $search = $_POST["search"];
                }

                
            ?>

			<div class="row">
				<?php
                    $sql = "SELECT DISTINCT * FROM event WHERE CONCAT (username, '', name, '', max_participants, '', conditions, '', contact_no, '', venue, '', held_date, '', entry_closing_date, '', start_time, '', end_time, '', expenses_fees, '', event_type) LIKE '%" . $search . "%' AND status='REJECTED' AND username='$uname' ORDER BY held_date DESC";    

                    $result = $conn->query($sql);
								  
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{
							$id = $row["occasion_id"];
							$helddate = $row["held_date"];
							$enddate = $row["entry_closing_date"];
							date_default_timezone_set('Asia/Colombo');
							$today = date("Y-m-d");
							$clss = "";


                            $sqli="SELECT * FROM event WHERE status='rejected' AND username='$uname' ORDER BY held_date DESC";
                            $resulti = $conn->query($sqli);

                            if($resulti->num_rows > 0)
                            {
                            if($helddate < $today)
							{
								echo"<div class='disabledhoritem'>
										<div class='procol5'>
											<h2>".$row["occasion_id"]." - ".$row["name"]."</h2>";

												echo"<div class='column procol6'>
														<h3>Held Date : ".$row["held_date"]."</h3>
														<p>Starting Time : ".$row["start_time"]."</p>
														<p>Venue : ".$row["venue"]."</p>
														<p>Event Focus : ".$row["event_type"]."</p>
														<p>Organizer : ".$row["username"]."</p>											
												</div>

												<div class='column procol6'>
													<h3>Entry Closing Date : ".$row["entry_closing_date"]."</h3>
													<p>Ending Time : ".$row["end_time"]."</p>
													
													<p>Entry Fee : Rs.".$row["expenses_fees"]."</p>
													<p>Contact No : ".$row["contact_no"]."</p>
												</div>
										
												<p>Conditions : ".$row["conditions"]."</p>
										";	
																
										$sqll = "SELECT * FROM event_aspect WHERE occasion_id = '".$id."'";
										$resultt = $conn->query($sqll);
																  
										if($resultt->num_rows > 0)
										{
											$data = array();
											while($roww = $resultt->fetch_assoc())
											{
												$data[] = $roww["aspect"];
											}
											echo"<div class='procol7'>";
												print_r("Aspect of the event&emsp;:&emsp;");
												for($x = 0 ; $x < count($data) ; $x++)
												{
													print_r($data[$x]);echo"&emsp;&emsp;&emsp;";
												}
											echo"</div>";	
										}
								echo"</div>
								<h2><font color='red'> Closed </font></h2>
									<br /> 
									
								<a href='viewRejectedEvent.php?id=".$id."'><button type='submit' align='left' style='width:23%; background-color: #F94545; font-family:arial; height: 150px; font-size: 22px; margin: 0; border-radius: 5px 5px 5px 5px;'>View Event</button></a>
								<div class='procol4'></div>
                                    							
							</div>";
						}
						else
						{
							echo"<div class='horitem'>
										<div class='procol5'>
											<h2>".$row["occasion_id"]." - ".$row["name"]." </h2>";

												echo"<div class='column procol6'>
														<h3>Held Date : ".$row["held_date"]."</h3>
														<p>Starting Time : ".$row["start_time"]."</p>
														<p>Venue : ".$row["venue"]."</p>
														<p>Event Focus : ".$row["event_type"]."</p>
														<p>Organizer : ".$row["username"]."</p>											
												</div>

												<div class='column procol6'>
													<h3>Entry Closing Date : ".$row["entry_closing_date"]."</h3>
													<p>Ending Time : ".$row["end_time"]."</p>
													
													<p>Entry Fee : Rs.".$row["expenses_fees"]."</p>
													<p>Contact No : ".$row["contact_no"]."</p>
													<br /><br />
												</div>
										
												<p>Conditions : ".$row["conditions"]."</p>
										";	
																
										$sqll = "SELECT * FROM event_aspect WHERE occasion_id = '".$id."'";
										$resultt = $conn->query($sqll);
																  
										if($resultt->num_rows > 0)
										{
											$data = array();
											while($roww = $resultt->fetch_assoc())
											{
												$data[] = $roww["aspect"];
											}
											echo"<div class='procol7'>";
												print_r("Aspect of the event&emsp;:&emsp;");
												for($x = 0 ; $x < count($data) ; $x++)
												{
													print_r($data[$x]);echo"&emsp;&emsp;&emsp;";
												}
											echo"</div>";	
										}
								echo"</div>

									<br /> <br /><br /><br />

								<a href='viewRejectedEvent.php?id=".$id."'><button type='submit' align='left' style='width:23%; background-color: #45C5F9; font-family:arial; height: 150px; font-size: 22px; margin: 0; border-radius: 5px 5px 5px 5px;'>View Event</button></a>
								<div class='procol4'></div>
                                    							
							</div>";
						}
					}
				}
            }
				else 
				{
                    echo "<div class='procol7'><h3>No search results related to your keyword.</h3></div>";
				}
				$conn->close();
				?>		
			</div>	
	
            <br /><br /><br /><br /><br /><br /><br /><br /><br />
			<br />    <br /><br /><br /><br /><br /><br /><br /><br /><br />
		
	</div>
	<!-----------CONTENTS END-------------->
</div>
<script>
	document.getElementById("defaultOpen").click();
</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<br > 
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>