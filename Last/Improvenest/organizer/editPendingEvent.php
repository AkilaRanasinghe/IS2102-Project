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

<script>
	function checkeventvalues(){
   
	var b=new Date(document.editTournament.held_date.value);
	var c=new Date(document.editTournament.entry_closing_date.value);
	var d=document.editTournament.start_time.value;	
	var e=document.editTournament.end_time.value;
	var date = new Date();
	 if(b < date || c < date || b < c)
	{
		alert("Please Select Valid Dates!");
		return false;		
	}	
    else if(e <= d)
	{
		alert("Please Select Valid Times!");
		return false;
    }
	else
	{
		return( true );			
	}
}
</script>


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
			<h1>Edit Event</h1>
				<form action="../php/edit_event.php" name="editTournament" method="POST" onsubmit="return checkeventvalues()">
				<?php
				$sql="SELECT * FROM event WHERE occasion_id = '" .$id. "'";
				$result=$conn->query ($sql);
				if ($result -> num_rows >0)
				{
					while ($row= $result -> fetch_assoc())
					{
						$name = $row ['name'];
                        $max_participants = $row ['max_participants'];
						$conditions = $row ['conditions'];
						$contact_no = $row ['contact_no'];
						$venue = $row ['venue'];
						$held_date = $row ['held_date'];
						$entry_closing_date = $row ['entry_closing_date'];
                        $start_time = $row ['start_time'];
						$end_time = $row ['end_time'];
						$expenses_fees = $row ['expenses_fees'];
						$event_type = $row ['event_type'];
			

					}
				}
				?>				
				<table cellspacing="2" cellpadding="2" border="0" >
				<tr>
					<td colspan='5'>
						<p>Event Name</p>
						<input type="text" placeholder="Event Name" value="<?php echo $name ?>" name="name" required>				
					</td>			
					<td colspan="5">
						<p>Event Focus</p>
						<input type="text" placeholder="Event Focus" value="<?php echo $event_type ?>" name="event_type" required >				
					</td>			
				</tr>
                <tr>
					<td colspan="5">
						<p>Maximum Number of Participants</p>
						<input type="number" placeholder="Max Number of Participants" value="<?php echo $max_participants ?>" name="max_participants" min="<?php echo $max_participants ?>" required >												
					</td>			
					<td colspan="5">
						<p>Contact Number</p>
						<input type="number" placeholder="Contact Number" value="<?php echo $contact_no ?>" name="contact_no" required pattern="[0-9]{10}" >							
					</td>
                </tr>
				<tr>
					<td colspan="5">
						<p>Venue</p>
						<input type="text" placeholder="Venue" value="<?php echo $venue ?>" name="venue" required >	
					</td>			
					<td colspan="5">
						<p>Entry Fee</p>
						<input type="text" placeholder="Entry Fee" value="<?php echo $expenses_fees ?>" name="expenses_fees" required >	
					</td>			
				</tr>
                <tr>
            		<td colspan="5">
						<p>Entry Closing Date </p>
						<input type="date" placeholder="Entry Closing Date" value="<?php echo $entry_closing_date ?>" name="entry_closing_date" required >			
					</td>		
					<td colspan="5">
						<p>Held Date</p>
						<input type="date" placeholder="Held  Date" value="<?php echo $held_date ?>" name="held_date" required >	
					</td>			
				</tr>
                <tr>		
					<td colspan="5">
						<p>Start Time</p>
						<input type="time" placeholder="Start Time" value="<?php echo $start_time ?>" name="start_time" required  >	
					</td>			
				</tr>
                <tr>		
					<td colspan="5">
						<p>End Time</p>
						<input type="time" placeholder="End Time" value="<?php echo $end_time ?>" name="end_time" required >	
					</td>			
				</tr>
                <tr>
                    <td colspan="10">
						<p>Conditions</p>
						<textarea id="conditions"  name="conditions" rows="4" cols="50">
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