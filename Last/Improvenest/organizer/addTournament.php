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
		<div class="input-form" style="padding:20px 150px 20px 150px;">
			<h1>Add a Tournament</h1>
			<hr>
				<form action="./add_Tournament.php" name="addTournament" method="POST" onsubmit="return checktournamentalues()">
				<?php
				$sql="SELECT * FROM organiser WHERE username = '" .$uname. "'";
				$result=$conn->query ($sql);
				if ($result -> num_rows >0)
				{
					while ($row= $result -> fetch_assoc())
					{
						$uname = $row ['username'];
                        $name = $row ['name'];
						$mobile = $row ['contact_no'];
						$email = $row ['email'];
						$address = $row ['address'];
						$password = $row ['password'];

					}
				}
				?>				
				<table cellspacing="2" cellpadding="2" border="0" >
				<tr>
					<td colspan="5">
						<p>Tournament Name</p>
						<input type="text" placeholder="Tournament Name" name="name" required>				
					</td>			
					<td colspan="5">
						<p>Max Participants</p>
						<input type="number" placeholder="Max Participants" name="maxp" min="0" required>				
					</td>			
				</tr>
                <tr>
					<td colspan="5">
						<p>Start Date</p>
						<input type="date" placeholder="Start date" name="sdate" required>												
					</td>			
					<td colspan="5">
						<p>End Date</p>
						<input type="date" placeholder="End date" name="edate" required>							
					</td>
                </tr>
				<tr>
					<td colspan="5">
						<p>Registration Closing Date</p>
						<input type="date" placeholder="Registration Closing Date" name="rcdate" required>	
					</td>			
					<td colspan="5">
						<p>Venue</p>
						<input type="text" placeholder="Venue" name="venue" required>	
					</td>			
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
					<td colspan="5">
						<p>Entry Fee</p>
						<input type="number" placeholder="Entry Fee" name="entryfee" required>	
					</td>			
				</tr>
                <tr>		
					<td colspan="5">
						<p>Contact Number</p>
						<input type="number" placeholder="Contact Number" name="contact" required pattern="[0-9]{10}" >	
					</td>			
				</tr>
                <tr>
                    <td colspan="10">
						<p>Rules and Regulations</p>
						<textarea id="rules" name="rules" rows="4" cols="50">
                        </textarea>		
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