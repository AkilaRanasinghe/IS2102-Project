<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css" />
<script src="../js/formvalidation_coach.js"></script>
<script>
	function send_id(occasion){
		window.location.href = "viewreg.php?occasion="+occasion;
	}
</script>
<style media="screen">
	.center{
	margin: 100px;
  width: 80%;
  border: 0px
  padding: 10px;
	}
</style>
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
<?php
	$occasion = $_GET['occasion'];
	$sql = "SELECT  * FROM event e, coaching_session c, event_sport s WHERE c.username = '".$uname."' AND c.occasion_id ='$occasion' AND e.occasion_id = c.occasion_id AND s.occasion_id = c.occasion_id";
	$result = mysqli_query($conn, $sql);

	$resultchk= mysqli_num_rows($result);

	if($resultchk > 0){

	  $row= mysqli_fetch_assoc($result);

	    $sname = $row['name'];
	    $location = $row['venue'];
	    $helddate = $row['held_date'];
	    $closedate = $row['entry_closing_date'];
	    $maxpart = $row['max_participants'];
	    $fees = $row['expenses_fees'];
	    $contact = $row['contact_no'];
	    $stime = $row['start_time'];
	    $etime = $row['end_time'];
	    $sport = $row['sport'];
	}

	$sql2 = "SELECT aspect FROM event_aspect WHERE occasion_id = $occasion";
	$result2 = mysqli_query($conn,$sql2);
	$resultchk2 = mysqli_num_rows($result2);

	if($resultchk2 > 0)
	{
		$data = array();
		while($row2 = mysqli_fetch_assoc($result2))
		{
			$data[] = $row2["aspect"];
		}
			for($x = 0 ; $x < count($data) ; $x++)
			{
				//print_r($data[$x]);echo"&emsp;&emsp;&emsp;";
				if($data[$x]=="Sports Technique"){
					$focus_sport = $data[$x];

				}
				elseif ($data[$x]=="Competitions") {
					$focus_competion= $data[$x];
				}
				else {
					$focus_strength = $data[$x];
				}
			}

	}
	?>
	<div class="column contents" align = center>
    <div class="input-form center" style="padding:20px;color:white">
          <h1 style="color:white">Manage Event</h1>
					<form action="../php/managecoachingsession-inc.php" name="addcoachingsession" method="post" onsubmit="return checkcoachingsession()">
							<table cellspacing="2" cellpadding="2" border="0" >
							<tr>
								<td colspan="10">
									<p>Session Name</p>
									<input type="text" placeholder="Session Name" name="SName" required value="<?php echo $sname;?>">
								</td>
							</tr>
							<tr>
								<td colspan="5">
									<p>Location</p>
									<input type="text" placeholder="Location" name="Location" required value="<?php echo $location;?>">
								</td>
								<td colspan="5">
									<p>Number of Participants</p>
									<input type="number" placeholder="Number of Participants" name="Participants" required value="<?php echo $maxpart;?>">
								</td>
							</tr>
							<tr>
								<td colspan="5">
									<p>Sport</p>
									<select id="sport" name="Sport" required>
										<option value="<?php echo $sport;?>" selected><?php echo $sport;?></option>
										<?php
											$sql="SELECT sport FROM coach_sport WHERE username = '" .$uname. "' AND sport <> '".$sport."';";
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
									<input type="number" placeholder="Expenses" name="Expenses" required value="<?php echo $fees;?>">
								</td>
							</tr>
							<tr>
								<td colspan="5">
									<p>Date</p>
									<input type="date" name="HeldDate" required value="<?php echo $helddate;?>">
								</td>
								<td colspan="5">
									<p>Entry Closing Date</p>
									<input type="date" name="CloseDate" required value="<?php echo $closedate;?>">
								</td>
							</tr>
							<tr>
								<td colspan="5">
									<p>Start Time</p>
									<input type="time" placeholder="Start Time" name="STime" required value="<?php echo $stime;?>">
								</td>
								<td colspan="5">
									<p>End Time</p>
									<input type="time" placeholder="End Time" name="ETime" required value="<?php echo $etime;?>">
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
									<input type="checkbox" name="Focus[]" <?php if(isset($focus_sport)) echo "checked" ?> value="Sports Technique">
								</td>
								<td>
									<label>Sports Techniques</label>
								</td>
								<td>
									<input type="checkbox" name="Focus[]" <?php if(isset($focus_competion)) echo "checked" ?> value="Competitions">
								</td>
								<td>
									<label>Competitions</label>
								</td>
								<td>
									<input type="checkbox" name="Focus[]" <?php if(isset($focus_strength)) echo "checked" ?> value="Strength and Conditioning">
								</td>
								<td colspan="2">
									<label>Strength and Conditioning</label>
								</td>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td colspan="10"><br/></td>
							</tr>
            </tr>

          <tr>
              <td colspan="1">
                <input type="hidden" name="id" value='<?php echo $occasion ?>' readonly>
              </td>
            </tr>

            <tr align="center">
              <td colspan="5">
                <button type="submit" id="usersbt" value="Submit" name ="update">Update Event</button>
                </a>
              </td>
              <td colspan="2">
                <button type="reset" value="Reset" style="background-color:#a32626;">Cancel Update</button>
              </td>
            </tr>
            </table>
						</form>
						<?php
						echo"<a href='viewreg.php?id=".$occasion."'>
						<button type='' id='usersbt' value=''>View Registered Participants</button></a>";
						?>
    </div>



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
