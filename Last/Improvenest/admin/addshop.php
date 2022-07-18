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

</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/adminsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->


    <div class="row" > 
	<div class="column common" align="center" style="margin-left:12%; margin-top:3%;">
		<div class="input-form">
			<h1 style="color:white;">Add Shops</h1>

			<div id="User" class="tabcontent">
				<form action="add_news.php" name="userForm" method="POST" enctype="multipart/form-data">
				<table cellspacing="2" cellpadding="2" border="0" >
				<tr>
					<td colspan="10">
						<p> <font size=3> Name </font></p>
						<input type="text" placeholder="Name" name="name" required style="height:40px;">				
					</td>		
				</tr>

                <tr>
					<td colspan="10">
						<p> <font size=3> Image </font></p>
						<input type="file" placeholder="Image" name="image" required style="height:40px;">				
					</td>		
				</tr>

                <tr>
					<td colspan="10">
						<p> <font size=3> Address </font></p>
						<input type="text" placeholder="Address" name="address" required style="height:40px;">				
					</td>		
				</tr>

                <tr>
					<td colspan="10">
						<p> <font size=3> Contact Number </font></p>
						<input type="text" placeholder="Contact" name="contact" required style="height:40px;">				
					</td>		
				</tr>
<!--
				<tr>
					<td colspan="10">
						<p><font size=3>News Aspect </font></p>
						<select id="aspect" name="aspect" required style="height:40px;">
						   <option value="" selected disabled>News Aspect</option>
						   <option value="International">International</option>
						   <option value="Local">Local</option>
						   <option value="Knowledge">Knowledge</option>
                           <option value="Law">Law</option>

                           </select>				
					</td>		
				</tr>

                
                <tr>
					<td colspan="10">
						<p><font size=3>Send For </font></p>
						<select id="nsendFor" name="nsendFor" required style="height:40px;">
						   <option value="" selected disabled>Send For</option>
						   <option value="All">All</option>
						   <option value="Organizers">Organizers</option>
						   <option value="Federations">Federations</option>
                           <option value="Squash">Squash</option>
						   <option value="Archery">Archery</option>
                           <option value="MMA">MMA</option>
						   <option value="Badminton">Badminton</option>
                           <option value="Tennis">Tennis</option>
                           </select>				
					</td>		
				</tr>

                -->

                <tr>
					<td colspan="10">
						<p><font size=3>Description</font></p>
						<textarea id="description" name="description" rows="4" cols="50">
                        </textarea>		
					</td>			
				</tr>

                <tr> <td>
                <button style="width:40%; margin-left: 30px;" type="submit" id="organisersbt" value="Submit">Submit</button>
						<button type="reset" value="Reset" style="background-color:#a32626; width:40%;">Reset</button>
                        </td>			
				</tr>	
				
</table>
</div></div>
	<!-----------CONTENTS END-------------->
</div>

<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>
