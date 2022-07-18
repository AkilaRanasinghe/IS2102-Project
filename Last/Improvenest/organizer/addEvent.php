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
<script src="../js/commonjs.js"></script>
<script src="../js/eventvalues.js"></script>

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
		<div class="input-form" style="padding:20px 100px 20px 100px;">
			<h1><center>Add an Event</center></h1>
            <hr>
				<form action="./add_Event.php" name="addEvent" method="POST" onsubmit="return checkeventvalues()">
							
				<table cellspacing="2" cellpadding="2" border="0" >
				<tr>
					<td colspan="5">
						<p>Event Name</p>
						<input type="text" placeholder="Event Name" name="name" required>				
					</td>			
					<td colspan="5">
						<p>Max Participants</p>
						<input type="number" placeholder="Max Participants" name="maxp" min="0" required> 				
					</td>			
				</tr>
                <tr>
					<td colspan="5">
						<p>Held Date</p>
						<input type="date" placeholder="Held date" name="hdate" required>												
					</td>			
					<td colspan="5">
						<p>Registration closing Date</p>
						<input type="date" placeholder="Registration Closing date" name="rcdate" required>							
					</td>
                </tr>
				<tr>
					<td colspan="5">
						<p>Starting Time</p>
						<input type="time" placeholder="Startinng Time" name="starttime" required>	
					</td>			
					<td colspan="5">
						<p>Ending Time</p>
						<input type="time" placeholder="Ending time" name="endtime" required>	
					</td>			
				</tr>
				<tr>
				<td colspan="5">
						<p>Event Type</p>
						<input type="text" placeholder="Event Type" name="etype" required>	
					</td>			
				</tr>


				<tr> <td> </td><td> </td><td> </td> </tr>
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
					<td colspan="5">
						<p>Sport</p>
						<select id="sport" name="sport" required>
						<option value="" selected disabled>Sport</option>
                           <option value="Sqaush">Squash</option>
						   <option value="Archery">Archery</option>
                           <option value="MMA">MMA</option>
						   <option value="Badminton">Badminton</option>
                           <option value="Tennis">Tennis</option>
 
						</select>				
					</td>
					
				</tr>
                
					<td colspan="5">
						<p>Expenses and Fee</p>
						<input type="number" placeholder="Entry Fee" name="entryfee" required>	
					</td>			
				</tr>
                <tr>		
                    <td colspan="5">
						<p>Venue</p>
						<input type="text" placeholder="Venue" name="venue" required>	
					</td>		
					<td colspan="5">
						<p>Contact Number</p>
						<input type="number" placeholder="Contact Number" name="contact" required pattern="[0-9]{10}" >	
					</td>			
				</tr>
                <tr>
                    <td colspan="10">
						<p>Condition</p>
						<textarea id="condition" name="condition" rows="4" cols="50">
                        </textarea>		
					</td>	
                </tr>
				<tr>
					<td colspan="10"><br/></td>
				</tr>
				<tr align="center">
					<td colspan="3">
						<button type="submit" id="usersbt" value="Submit">Send for Approval</button>				
					</td>
					<td colspan="3">
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