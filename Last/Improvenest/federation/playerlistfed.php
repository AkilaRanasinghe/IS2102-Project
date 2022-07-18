<?php
include '../php/conn.php';
session_start();
$uname = $_SESSION['uname'];
?>

<!-- passwords 
sls 123456789ab
slb -->

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/federation.css">
<link rel="stylesheet" href="../css/formstyle.css">
<link rel="stylesheet" href="../css/card.css"/>
<link rel="stylesheet" href="../css/viewlists.css">
<script src="../js/commonjs.js"></script>

</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/federationsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
     
  <br>
<br>
<h2 style="color:white;"><center>Sri Lanka Squash players list </center></h2>
<hr />
<br>
<br>
<table>
	<tr>
		<th>player id </th>
		<th>username </th>
		<th> contact number</th>
		<th> email</th>
		<th> address </th>
		<th> f name</th>
		<th>l name </th>
		<th> country </th>
		<th> gender</th>
		<th>dob </th>
		<th>nic passport </th>

				</tr>
<?php
				$count = 1;
                    
                $sql_query = "SELECT * FROM player " ;
                $result = mysqli_query($conn, $sql_query);
                    
				while ($row = mysqli_fetch_assoc($result)) { 
			
			?>
     
        

	<tr><td><?php echo $row["player_id"]; ?></td>
	<td><?php echo $row["username"]; ?></td>
	<td><?php echo $row["contact_no"]; ?></td>
	<td><?php echo $row["email"]; ?></td>
	<td><?php echo $row["address"]; ?></td>
	<td><?php echo $row["f_name"]; ?></td>
	<td><?php echo $row["l_name"]; ?></td>
	<td><?php echo $row["country"]; ?></td>
	<td><?php echo $row["gender"]; ?></td>
	<td><?php echo $row["dob"]; ?></td>
	<td><?php echo $row["nic_passport"]; ?></td>
				</tr>
				<?php $count++;
            } ?>
				</table>
	
	








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
<script>
	document.getElementById("defaultOpen").click();
</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>