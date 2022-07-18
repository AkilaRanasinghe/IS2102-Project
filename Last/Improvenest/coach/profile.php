<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css">
<style media="screen">

	.round input[type = "file"]{
		position: absolute;
		transform: scale(3);
		opacity: 0;
	}

	input[type="file"]{
		cursor: pointer;
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
	<div class="column contents">
			<div class="row">
  			<div class="column procol1">
					
						<div class="row">
							<img <?php echo "src='data:image/jpeg;base64,".base64_encode($row['picture'])."'" ?> alt="profile picture">
							<div class="row">
							<button id='change' onclick='openForm()'><img id='change' src='../images/change.png'></button>
							</div>
						</div>
						<div class='form-popup' id='myForm'>
							<form action='../php/editCoachPicture.php' class='popup-container' method='POST' enctype='multipart/form-data'>
								<h2 style='text-align:center;'>Change Profile Picture</h2>

								<input type='file' name='Pimage' required>

								<button id='hoverbtn' type='submit' value='Submit'>Update</button>
								<button type='reset' onclick='closeForm()' style='background-color:#a32626;'>Cancel</button>
							</form>
						</div>
				
					<script type="text/javascript">
						document.getElementById("Pimage").onchange = function(){
							document.getElementById("pictureForm").submit();
						}
					</script>
				</div>

			<div class="column procol5">
				<div class="row">
					<div class="row">
						<h1><?php echo $row['f_name']." ".$row['l_name'] ;?></h1>
						<br />
					</div>
					<div class="row">
						<table class='protable' cellspacing='2' cellpadding='2' border='0' width='100%'>
							<tr>
								<td> <p>NIC/Passport</p> </td>
								<td> <p>:</p> </td>
								<td colspan="4">  <p><?php echo $row['nic_passport'];?></p> </td>
								<td> <p>Address</p> </td>
								<td> <p>:</p> </td>
								<td colspan="4"> <p><?php echo $row['address'];?></p> </td>
							</tr>
							<tr>
								<td> <p>Gender</p> </td>
								<td> <p>:</p> </td>
								<td colspan="4"> <p><?php echo $row['gender'];?></p> </td>
								<td> <p>Birthday</p> </td>
								<td> <p>:</p>  </td>
								<td> <p><?php echo $row['dob'];?></p> </td>
							</tr>
							<tr>
								<td> <p>Country</p> </td>
								<td> <p>:</p> </td>
								<td colspan="4"> <p><?php echo $row['country'];?></p> </td>
								<td> <p>Email</p> </td>
								<td> <p>:</p> </td>
								<td colspan="4"> <p><?php echo $row['email'];?></p> </td>
							</tr>
							<tr>
								<td> <p>Sports</p> </td>
								<td> <p>:</p> </td>
								<td colspan="4"> <p>
										<?php
											if($resultchk_2>0){
												while ($row_2 = mysqli_fetch_assoc($result_2)) {

													echo $row_2['sport']." ";
												}
											}?>
								</td>
								<td> <p>Mobile</p> </td>
								<td> <p>:</p> </td>
								<td colspan="4"> <?php echo $row['contact_no'];?></p> </td>
							</tr>
						</table>
					</div>
				</div>
			</div>
	</div>
	<br /><br />

		<div class="row" style="padding:10px 0px 10px 150px;overflow: hidden;background-color: rgba(0, 20, 61, 0.5);box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.5);">
			<div class="column procol4">

      <p>Qualification Level</p>
      <p> Trainning Place</p>
      <p> Specialisation</p>
      <p>Fees</p>
      <p> Notes</p>

  		</div>
			<div class="column procol5">
      <p><?php echo $row['qualification'];?></p>
      <p><?php echo $row['venue'].",".$row['city'].",".$row['province']." Province";?></p>
      <p><?php echo $row['specilization'];?></p>
      <p><?php echo $row['fees'];?> LKR per hour</p>
      <p><?php echo $row['note'];?></p>
		</div>
	</div>
	<div class="row" style="padding:20px 10px 0px 10px;" align="center">
		<div class="column common">
			<a href="editprofile.php"><button>Edit Profile</button></a>
		</div>
		<div class="column common">
			<button type='Reset' style="background-color:#a32626;">Delete Profile</button>
		</div>
	</div>
  </div>


	</div>
	<!-----------CONTENTS END-------------->
</div>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';
mysqli_close($conn)?>
<script>
function openForm() {
	document.getElementById("myForm").style.display = "block";
}

function closeForm() {
	document.getElementById("myForm").style.display = "none";
}
</script>
<script src="../js/activejs.js" charset="utf-8"></script>
<!-----------FOOTER END-------------->
</body>
</html>
