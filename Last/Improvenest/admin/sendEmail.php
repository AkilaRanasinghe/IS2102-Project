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
<script>
function opassword()	{
    var c=document.organiserForm.Password.value;
    var d=document.organiserForm.RPassword.value	
    if(c!=d)
	{
		alert("Passsword Mismatch!");
		return false;
    }
    if(c.length<8 || c.length>20)
	{
		alert("Password must contain only 8-20 characters");
		return false;
    }
    return( true );	
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
	<?php include '../php/adminsidenav.php';?>
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

$sql = "SELECT * FROM federation WHERE federation_id = '".$id."'";
$result = $conn->query($sql);
                          
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {

		$id=$row["federation_id"];
        $email = $row["email"];
        $username = $row["username"];
        $password = $row["password"];
       

    ?>

    <div class="row" > 
        <br />
	<div class="column common" align="center" style="margin-left:15%; margin-top:1%;">
		<div class="input-form">
			<h1 style="color:white;">Send Credentials to Federation</h1>

			<div id="User" class="tabcontent">
            
            <form action="./subscriberform.php" method="POST" enctype=”multipart/form-data” name="EmailForm">
				<table cellspacing="2" cellpadding="2" border="0" >
				<tr>
					<td colspan="10">
						<p> <font size=3> Email </font></p>
						<input type="email" class="form-control" name="email" value="<?php echo $email ?>" placeholder="To" pattern="[a-zA-Z0-9%_+-]+@[a-zA-Z]+\.[a-z]{2,3}" required />				
					</td>		
				</tr>
                <tr>
					<td colspan="10">
						<p> <font size=3>Subject </font></p>
						<input type="text" class="form-control" name="subject" value="Adding your federation to the Improvenest system" placeholder="Subject" required />				
					</td>		
				</tr>

				<tr>
					<td colspan="10">
						<p> <font size=3>Username </font></p>
						<input type='text' class='form-control' name='message1' value="<?php echo $username ?>" placeholder='Subject' required disabled/> 			
					</td>		
				</tr>

				<tr>
					<td colspan="10">
						<p> <font size=3>Password </font></p>
						<input type='text' class='form-control' name='message2' value="<?php echo $password ?>" placeholder='Subject' required disabled /> 				
					</td>		
				</tr>

				<input type="hidden" name="id" value="<?php echo $id ?>" />





                

                <tr> <td>
                <button type="submit" id="send-button" class="btn btn-primary" style="width:40%;">Send</button>
						<button type="reset" value="Reset" style="background-color:#a32626; width:40%;">Reset</button>
                        </td>			
				</tr>	
				
</table>
</form>

<?php } } ?>
</div></div>
</div> 
<script>

	<!-----------CONTENTS END-------------->
</div>


<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>
