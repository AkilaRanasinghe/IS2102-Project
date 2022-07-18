<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css" />
<script src="../js/formvalidation_coach.js"></script>
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
		<div class="input-form" style="padding:20px 150px 20px 150px;">
			<h1>Add New Coaching Session</h1>
			<form action="../php/addcoachingsession-inc.php" name="addcoachingsession" onsubmit="return checkcoachingsession()" method="POST">
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
						<input type="number" placeholder="Number of Participants" name="Participants" required>
					</td>
				</tr>
				<tr>
					<td colspan="5">
						<p>Sport</p>
						<select id="sport" name="Sport" required>
						   <option value="" selected disabled>Sport</option>
							<?php
								$sql="SELECT * FROM coach_sport WHERE username = '" .$uname. "'";
								$result = mysqli_query($conn,$sql);
								if(mysqli_num_rows($result) > 0)
								{
									while($row = mysqli_fetch_assoc($result))
									{
										echo "<option value='". $row["sport"] ."'>" .$row["sport"] ."</option>";
									}
								}
							?>
						</select>
					</td>
					<td colspan="5">
						<p>Expenses</p>
						<input type="number" placeholder="Expenses" name="Expenses" required>
					</td>
				</tr>
				<tr>
					<td colspan="5">
						<p>Date</p>
						<input type="date" name="HeldDate" required>
					</td>
					<td colspan="5">
						<p>Entry Closing Date</p>
						<input type="date" name="CloseDate" required>
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
						<label>Sports Techniques</label>
					</td>
					<td>
						<input type="checkbox" name="Focus[]" value="Competition">
					</td>
					<td>
						<label>Competitions</label>
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
					<td colspan="10"><br/></td>
				</tr>
				<tr align="center">
					<td colspan="5">
						<button type="submit" id="usersbt" name="usersbt" value="Submit">Submit</button>
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
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<?php mysqli_close($conn);?>
<script src="../js/activejs.js" charset="utf-8"></script>
<!-----------FOOTER END-------------->
</body>
</html>
