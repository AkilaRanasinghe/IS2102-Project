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

	<?php

	if(isset($_GET["id"]))  
	{
		$id = $_GET["id"];
	}
	else
	{
		$id = $_SESSION['id'];
	}

	$_SESSION['id'] = $id;
	?>

	<div class="column contents">
		<div class="input-form" style="padding:20px 150px 20px 150px;">
			<h1>Edit Tournament</h1>
				<form action="../php/edit_tournament.php" name="editTournament" method="POST" >
				<?php
				$sql="SELECT * FROM tournament WHERE occasion_id = '" .$id. "'";
				$result=$conn->query ($sql);
				if ($result -> num_rows >0)
				{
					while ($row= $result -> fetch_assoc())
					{
						$uname = $row ['username'];
                        $name = $row ['name'];
						$max = $row ['max_participants'];
						$conditions = $row ['conditions'];
						$contact = $row ['contact_no'];
						$venue = $row ['venue'];
						$entryClosing = $row ['entry_closing_date'];
                        $startDate = $row ['start_date'];
						$endDate = $row ['end_date'];
						$sport = $row ['sport'];
						$entryFee = $row ['entry_fee'];
						$rules = $row ['rules_regulations'];
						

					}
				}
				?>				
				<table cellspacing="2" cellpadding="2" border="0" >
				<tr>
					<td colspan='5'>
						<p>Tournament Name</p>
						<input type="text" placeholder="Tournament Name" value="<?php echo $name ?>" name="name" required>				
					</td>			
					<td colspan="5">
						<p>Max Participants</p>
						<input type="number" placeholder="Max Participants" value="<?php echo $max ?>" name="max" min="<?php echo $max ?>" required>				
					</td>			
				</tr>
                <tr>
					<td colspan="5">
						<p>Start Date</p>
						<input type="date" placeholder="Sdate" value="<?php echo $startDate ?>" name="sDate"  required disabled>												
					</td>			
					<td colspan="5">
						<p>End Date</p>
						<input type="date" placeholder="Edate" value="<?php echo $endDate ?>" name="eDate" required disabled>							
					</td>
                </tr>
				<tr>
					<td colspan="5">
						<p>Registration Closing Date</p>
						<input type="date" placeholder="RCdate" value="<?php echo $entryClosing ?>" name="rcDate" required disabled>	
					</td>			
					<td colspan="5">
						<p>Venue</p>
						<input type="text" placeholder="Venue" value="<?php echo $venue ?>" name="venue" required >	
					</td>			
				</tr>
                <tr>
            		<td colspan="5">
						<p>Sport </p>
						<input type="text" placeholder="Venue" value="<?php echo $sport ?>" name="sport" required disabled>			
					</td>		
					<td colspan="5">
						<p>Entry Fee</p>
						<input type="text" placeholder="Address" value="<?php echo $entryFee ?>" name="eFee" required disabled>	
					</td>			
				</tr>
                <tr>		
					<td colspan="5">
						<p>Contact Number</p>
						<input type="number" placeholder="Contact Number" value="<?php echo $contact ?>" name="contact" required pattern="[0-9]{10}" >	
					</td>			
				</tr>
                <tr>
                    <td colspan="10">
						<p>Rules and Regulations</p>
						<textarea id="rules"  name="rules" rows="4" cols="50">
						<?php echo $rules ?>
                        </textarea>		
					</td>	
                </tr>
                <tr>
                    <td colspan="10">
						<p>Condition</p>
						<textarea id="condition"  name="condition" rows="4" cols="50">
						<?php echo $conditions ?>
                        </textarea>		
					</td>	
                </tr>

				
				<tr>
					<td colspan="10"><br/></td>
				</tr>
				<tr align="center">
					<td colspan="3">
						<button type="submit" id="usersbt" value="Submit">Update</button> </a>				
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