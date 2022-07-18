<?php

include "../php/conn.php";
session_start();
$uname = $_SESSION['uname'];

$mail = "";
$regarding = "";
$usernamee = "";
$passwordd = "";
$id="";


if(isset($_POST['email']))  
{
	$mail = $_POST ["email"];
}

if(isset($_POST['subject']))  
{
	$regarding = $_POST ["subject"];
}
if(isset($_POST['message1']))  
{
	$usernamee = $_POST ["message1"];
}
if(isset($_POST['message2']))  
{
	$passwordd = $_POST ["message2"];
}

if(isset($_POST['id']))  
{
	$id = $_POST ["id"];
}

$sql = " UPDATE federation SET credentials_sent ='true' WHERE federation_id='$id'";




$to       = $mail;
$subject  = $regarding;


$message  = "Dear Sir/Madam," . '<br> <br>' . "We are happy to announce that your Federations Improvenest Account is being created and added to the 
system. Now you are able to manage the respective sport of your federation through the Improvenest Sport 
Management System. The following are the credentials to your account." . '<br><br>' . "Username: " . $usernamee . '<br>' . "Password: " . $passwordd . '<br><br>' . "Please be kind enough to change these details as soon as you logged into the system for the first time." . 
'<br><br>' . "Thank You," . '<br>' . "Improvenest Team.";

$headers  = 'From: ruwaniwelewatta@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
if(mail($to, $subject, $message, $headers)){
    
    $result = mysqli_query($conn,$sql);
    echo '<script> alert("Email Successfully Sent!");</script>';
    echo '<script> location.href="federationCredential.php"</script>';
}
else
{
    echo "Email sending failed";
    echo '<script> location.href="federationCredential.php"</script>';
}


?>