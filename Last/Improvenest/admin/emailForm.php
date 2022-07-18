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
            <form name="userForm" method="POST" onsubmit="return sendEmail();" enctype="multipart/form-data">
				<table cellspacing="2" cellpadding="2" border="0" >
				<tr>
					<td colspan="10">
						<p> <font size=3> Email </font></p>
						<input type="email" class="form-control" id="compose-to" value="<?php echo $email ?>" placeholder="To" required />				
					</td>		
				</tr>
                <tr>
					<td colspan="10">
						<p> <font size=3>Subject </font></p>
						<input type="text" class="form-control" id="compose-subject" value="Adding your federation to the Improvenest system" placeholder="Subject" required />				
					</td>		
				</tr>
                <tr>
					<td colspan="10">
						<p> <font size=3>Sport</font></p>
						<textarea class="form-control" id="compose-message" placeholder="Message" rows="10" required>
                        Dear Sir/Madam,

                        Your federation has being added to the Imprvenest Sports Management System. The Followings are your Credentials.
                        Please be Kind enough to change the credentials when you log into the system for security purposes.
                        Password = <?php echo $password ?>
                        Username = <?php echo $username ?>
                        

                        </textarea>			
					</td>		
				</tr>
                

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
function sendEmail()
{
  $('#send-button').addClass('disabled');

  sendMessage(
    {
      'To': $('#compose-to').val(),
      'Subject': $('#compose-subject').val()
    },
    $('#compose-message').val(),
    composeTidy
  );

  return false;
}

echo '<script> alert("Credentials sent Successfully!");</script>';
echo '<script> location.href="federationCredential.php"</script>';

</script>
	<!-----------CONTENTS END-------------->
</div>


<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>
