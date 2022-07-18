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
<script src="../js/checkvalues.js"></script>
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
		<div class="input-form" style="padding:20px 150px 20px 150px;">
			<?php
			$occasion = "";
			
			if(isset($_GET["id"]))  
			{
				$occasion = $_GET["id"];
			}		
			
			$sql="SELECT * FROM event ev, event_sport es WHERE ev.occasion_id = '" .$occasion. "' AND ev.occasion_id = es.occasion_id";
			$result=$conn->query ($sql);
			if ($result -> num_rows >0)
			{
				while ($row= $result -> fetch_assoc())
				{
					$sname = $row ['name'];
					$location = $row ['venue'];
					$maxparticipants = $row ['max_participants'];
					$sport = $row ['sport'];
					$expenses = $row ['expenses_fees'];
					$date = $row ['held_date'];
					$closingdate = $row ['entry_closing_date'];
					$stime = $row ['start_time'];
					$etime = $row ['end_time'];
				}
			}
			?>		
			<h1>Edit Group Training Session</h1>
			<form action="../php/updateGroupTraining.php" name="proposeGroupTrain" onsubmit="return checktraining()" method="POST">
				<table cellspacing="2" cellpadding="2" border="0" >
				<input type="hidden" name="occasionid" value="<?php echo $occasion ?>">
				<tr>
					<td colspan="10">
						<p>Session Name</p>
						<input type="text" placeholder="Session Name" value="<?php echo $sname ?>" name="SName" required>	
					</td>			
				</tr>				
				<tr>
					<td colspan="5">
						<p>Location</p>
						<input type="text" placeholder="Location" value="<?php echo $location ?>" name="Location" required>				
					</td>
					<td colspan="5">
						<p>Number of Participants</p>
						<input type="number" placeholder="Number of Participants" value="<?php echo $maxparticipants ?>" name="Participants" min="<?php echo $maxparticipants ?>" required>				
					</td>			
				</tr>
				<tr>
					<td colspan="5">
						<p>Sport</p>
						<input type="text" placeholder="Session Name" value="<?php echo $sport ?>" name="SName" readonly>				
					</td>
					<td colspan="5">
						<p>Expenses</p>
						<input type="text" placeholder="Expenses" value="<?php echo $expenses ?>" name="Expenses" readonly>				
					</td>					
				</tr>
				<tr>
					<td colspan="5">
						<p>Date</p>
						<input type="date" value="<?php echo $date ?>" name="HeldDate" readonly>
						<p>*Please Select a date excluding the next two days</p>
											<br >
					</td>
					<td colspan="5">
						<p>Entry Closing Date</p>
						<input type="date" value="<?php echo $closingdate ?>" name="CloseDate" required>
						<p>*Please Select a date excluding tomorrow</p>
											<br >
					</td>			
				</tr>				
				<tr>
					<td colspan="5">
						<p>Start Time</p>
						<input type="time" placeholder="Start Time" value="<?php echo $stime ?>" name="STime" readonly>							
					</td>
					<td colspan="5">
						<p>End Time</p>
						<input type="time" placeholder="End Time" value="<?php echo $etime ?>" name="ETime" readonly>												
					</td>			
				</tr>				
				<tr>
					<td colspan="10">
						<p>Focus On</p>				
					</td>
				</tr>
				<?php
					$sqll = "SELECT * FROM event_aspect WHERE occasion_id = '".$occasion."'";
					$resultt = $conn->query($sqll);
					if($resultt->num_rows >= 0)
					{
						$data = array();
						while($roww = $resultt->fetch_assoc())
						{
							$data[] = $roww["aspect"];
						}
					}						
				?>			
				<tr>
					<td></td>
					<td>
						<?php
							if(in_array("Sports Technique" ,$data ))
							{
								echo "<input type='checkbox' name='Focus[]' value='Sports Technique' checked>";
							}
							else
							{
								echo "<input type='checkbox' name='Focus[]' value='Sports Technique'>";
							}
						?>		
					</td>
					<td>			
						<label>Sports Technique</label>			
					</td>
					<td>
						<?php
							if(in_array("Match Play" ,$data ))
							{
								echo "<input type='checkbox' name='Focus[]' value='Match Play' checked>";
							}
							else
							{
								echo "<input type='checkbox' name='Focus[]' value='Match Play'>";
							}
						?>			
					</td>
					<td>
						<label>Match Play</label>			
					</td>					
					<td>
						<?php
							if(in_array("Strength and Conditioning" ,$data ))
							{
								echo "<input type='checkbox' name='Focus[]' value='Strength and Conditioning' checked>";
							}
							else
							{
								echo "<input type='checkbox' name='Focus[]' value='Strength and Conditioning'>";
							}
						?>			
					</td>
					<td colspan="2">
						<label>Strength and Conditioning</label>			
					</td>					
					<td colspan="2"></td>
				</tr>				
				<tr>				
				<tr>
					<td colspan="10"><br/></td>
				</tr>
				<tr align="center">
					<td colspan="5">
						<button type="submit" id="usersbt" value="Submit">Submit</button>				
					</td>
					<td colspan="5">
						<button type="reset" value="Reset" style="background-color:#a32626;">Reset</button>			
					</td>				
				</tr>			
				</table>
			</form>		
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