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
	<?php include '../php/playersidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<?php
		if(isset($_GET["tid"]))  
		{
			$tid = $_GET["tid"];
		}
		else
		{
			$tid = $_SESSION['tid'];
		}
		$_SESSION['tid'] = $tid;
		
		$sql = "SELECT * FROM (SELECT username, name AS 'Oname', user_type FROM organiser UNION SELECT username, name AS 'Oname', user_type FROM federation) a, tournament t WHERE a.username = t.username AND t.occasion_id = '".$tid."'";

		$result = $conn->query($sql);
								  
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{		
				echo"<div class='row' style='padding:30px;'>
					<div class='procol5'>
						<h1>".$row["name"]."</h1>
						<h3 style='padding-left:10px;'>From&emsp;&emsp;:&emsp;&emsp;".$row["start_date"]."&emsp;&emsp;&emsp;&emsp;To&emsp;&emsp;:&emsp;&emsp;".$row["end_date"]."</h3>
						<div class='form-popup' id='myForm'>
							<form action='../php/reporttournament.php' class='popup-container' method='POST'>
								<h2 style='text-align:center;'>Make Complain</h2>
								
								<select id='compType' name='compType' required>					
								   <option value='Fake Account' selected>Fake Account</option>
								   <option value='Illegal Session'>Illegal Session</option>
								   <option value='Fake News'>Fake News</option>
								   <option value='Other'>Other</option>					   
								</select>								

								<input type='text' name='complaint' placeholder='Complaint' style='padding: 10px;' required>

								<button id='hoverbtn' type='submit' value='Submit'>Submit</button>
								<button type='reset' onclick='closeForm()' style='background-color:#a32626;'>Cancel</button>
							</form>
						</div>					
					</div>
					<div class='procol4'>
						<div class='row'>
							<div class='accept half' style='float:left;'>
								<a style='padding:0px;' href='../php/jointournament.php?eid=".$tid."'><button style='height:80px;'>Register</button></a>
							</div>
							<div class='decline half' style='float:right'>
								<a style='padding:0px;'><button onclick='openForm()' style='height:80px;'>Report</button></a>
							</div>							
						</div>
					</div>
					<table class='protable' cellspacing='2' cellpadding='2' border='0' width='100%'>						
						<tr>
							<td style='width:18%;'>
								<p><b>Venue</b></p>
							</td>
							<td style='width:2%;'>
								<p><b>:</b></p>
							</td>							
							<td style='width:80%;'>
								<p><b>".$row["venue"]."</b></p>
							</td>
						</tr>						
						<tr>
							<td>
								<p><b>Organized By</b></p>
							</td>
							<td>
								<p><b>:</b></p>
							</td>							
							<td>
								<p><b>".$row["Oname"]."</b></p>
							</td>
						</tr>						
						<tr>
							<td>
								<p>Contact No</p>
							</td>
							<td>
								<p><b>:</b></p>
							</td>								
							<td>
								<p>".$row["contact_no"]."</p>
							</td>
						</tr>
						<tr>
							<td>
								<p>Entry Closing Date</p>
							</td>
							<td>
								<p><b>:</b></p>
							</td>								
							<td>
								<p>".$row["entry_closing_date"]."</p>
							</td>
						</tr>
						<tr>
							<td>
								<p>Entry Fee</p>	
							</td>
							<td>
								<p><b>:</b></p>
							</td>								
							<td>
								<p>Rs. ".$row["entry_fee"]."</p>	
							</td>
						</tr>
						<tr>
							<td>
								<p>Sport</p>	
							</td>
							<td>
								<p><b>:</b></p>
							</td>								
							<td>
								<p>".$row["sport"]."</p>	
							</td>
						</tr>
						<tr>
							<td style='vertical-align:top;'>
								<p>Conditions</p>	
							</td>
							<td style='vertical-align:top;'>
								<p><b>:</b></p>
							</td>							
							<td>
								<p style='text-align: justify;text-justify: inter-word;'>".nl2br($row["conditions"])."</p>	
							</td>
						</tr>
						<tr>
							<td style='vertical-align:top;'>
								<p>Rules and Regulations</p>	
							</td>
							<td style='vertical-align:top;'>
								<p><b>:</b></p>
							</td>							
							<td>
								<p style='text-align: justify;text-justify: inter-word;'>".nl2br($row["rules_regulations"])."</p>	
							</td>
						</tr>						
					</table>
				</div>";
			}
		}
		?>
	</div>
	<!-----------CONTENTS END-------------->
</div>
<script>
function openForm() {
	document.getElementById("myForm").style.display = "block";
}

function closeForm() {
	document.getElementById("myForm").style.display = "none";
}
</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>