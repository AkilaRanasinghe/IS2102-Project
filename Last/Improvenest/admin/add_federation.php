<?php
include "../php/conn.php";
session_start();

$name= "";
$username = "";
$sport = "";
$email = ""; 
$contact = ""; 
$password = "";


if(isset($_POST['ntitle']))  
{
	$name = $_POST ["ntitle"];
}
if(isset($_POST['username']))  
{
	$username = $_POST ["username"];
}
if(isset($_POST['sport']))  
{
	$sport = $_POST ["sport"];
}
if(isset($_POST['email']))  
{
	$email = $_POST ["email"];
}
if(isset($_POST['contact']))  
{
	$contact = $_POST ["contact"];
}
if(isset($_POST['Password']))  
{
	$password = $_POST ["Password"];
}


$sqli="SELECT * FROM federation WHERE name = '$name'";
$resultt = $conn->query($sqli);

if($resultt->num_rows > 0)
{
	echo "<script type='text/javascript'>alert('This Federation Account Already exists!'); window.location.href='http://localhost/Improvenest/admin/federation.php';</script>";
}
else 
{
  $sql = "INSERT INTO federation (username,name,email,password,contact_no,sport,user_type,credentials_sent) VALUES('$username','$name','$email','$password','$contact','$sport','Federation','false')";

  if (mysqli_query($conn, $sql)) {
    
    echo '<script> alert("Federation Added");</script>';
    echo '<script> location.href="./federationCredential.php"</script>';
  
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

  mysqli_close($conn);
  ?>


