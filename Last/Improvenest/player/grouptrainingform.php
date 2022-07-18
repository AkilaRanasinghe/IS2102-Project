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
			<h1>Propose Group Training Session</h1>
			<form action="../php/saveGroupTraining.php" name="proposeGroupTrain" onsubmit="return checktraining()" method="POST">
				<table cellspacing="2" cellpadding="2" border="0" >
				<tr>
					<td colspan="10">
						<p>Session Name</p>
						<input type="text" placeholder="Session Name" name="SName" required>	
					</td>			
				</tr>				
				<tr>
					<td colspan="5">
						<p>Location</p>
						<input type="text" placeholder="Location" name="Location" required>				
					</td>
					<td colspan="5">
						<p>Number of Participants</p>
						<input type="number" placeholder="Number of Participants" name="Participants" min="4" required>				
					</td>			
				</tr>
				<tr>
					<td colspan="5">
						<p>Sport</p>
						<select id="sport" name="Sport" required>
						   <option value="" selected disabled>Sport</option>
							<?php
								$sql="SELECT * FROM player_sport WHERE username = '" .$uname. "'";
								$result = $conn->query($sql);
								if($result->num_rows > 0)
								{
									while($row = $result->fetch_assoc())	
									{
										echo "<option value='". $row["sport"] ."'>" .$row["sport"] ."</option>";
									}
								}
							?>  
						</select>				
					</td>
					<td colspan="5">
						<p>Expenses</p>
						<input type="text" placeholder="Expenses" name="Expenses" pattern="[0-9]+(\.[0-9]{2})" required>				
					</td>					
				</tr>
				<tr>
					<td colspan="10">
						<p>Coach</p>
						<select id="coach" name="Coach" required>
						   <option value="" selected disabled>Coach</option>
							<?php
								$sql="SELECT co.f_name, co.l_name FROM coach co, coach_request cr WHERE cr.requester_username = '" .$uname. "' AND cr.status = 'Accepted' AND cr.receiver_username = co.username";
								$result = $conn->query($sql);
								if($result->num_rows > 0)
								{
									while($row = $result->fetch_assoc())	
									{
										$coach_name = $row["f_name"].' '.$row["l_name"];
										echo "<option value='". $coach_name ."'>" .$coach_name ."</option>";
									}
								}
							?>  
						</select>				
					</td>					
				</tr>
				<tr>
					<td colspan="5">
						<p>Date</p>
						<input type="date" name="HeldDate" required>
						<p>*Please Select a date excluding the next two days</p>
											<br >
					</td>
					<td colspan="5">
						<p>Entry Closing Date</p>
						<input type="date" name="CloseDate" required>
						<p>*Please Select a date excluding tomorrow</p>
											<br >
					</td>			
				</tr>				
				<tr>
					<td colspan="5">
						<p>Start Time</p>
						<input type="time" placeholder="Start Time" name="STime" required>							
					</td>
					<td colspan="5">
						<p>End Time</p>
						<input type="time" placeholder="End Time" name="ETime" required>												
					</td>			
				</tr>				
				<tr>
					<td colspan="10">
						<p>Focus On</p>				
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="checkbox" name="Focus[]" value="Sports Technique">			
					</td>
					<td>
						<label>Sports Technique</label>			
					</td>
					<td>
						<input type="checkbox" name="Focus[]" value="Match Play">				
					</td>
					<td>
						<label>Match Play</label>			
					</td>					
					<td>
						<input type="checkbox" name="Focus[]" value="Strength and Conditioning">			
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