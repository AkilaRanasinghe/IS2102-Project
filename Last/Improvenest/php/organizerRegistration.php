<?php
include 'conn.php';

$name = "";
$image = "";
$contact = "";
$email = "";
$address = "";
$username = "";
$password = "";
$status = "Active";
$usertype = "Organiser";

if(isset($_POST['Name']))  
{
	$image = addslashes(file_get_contents($_FILES['Oimage']['tmp_name']));
}
if(isset($_POST['Name']))  
{
	$name = $_POST ["Name"];
}
if(isset($_POST['Contact']))  
{
	$contact = $_POST ["Contact"];
}
if(isset($_POST['EMail']))  
{
	$email = $_POST ["EMail"];
}
if(isset($_POST['Address']))  
{
	$address = $_POST ["Address"];
}
if(isset($_POST['Username']))  
{
	$username = $_POST ["Username"];
}
if(isset($_POST['Password']))  
{
	$password = $_POST ["Password"];
}

$sqli="SELECT username FROM player WHERE username = '" .$username. "' UNION SELECT username FROM coach WHERE username = '" .$username. "' UNION SELECT username FROM organiser WHERE username = '" .$username. "' UNION SELECT username FROM federation WHERE username = '" .$username. "' UNION SELECT username FROM admin WHERE username = '" .$username. "'";
$resultt = $conn->query($sqli);

if($resultt->num_rows > 0)
{
	echo "<script type='text/javascript'>alert('This username is already reserved! Please try again!'); window.location.href='http://localhost/Improvenest/signup.php';</script>";
}
else 
{
    $sql = "INSERT INTO organiser (username,contact_no,name,address,password,email,user_type,account_status,picture) VALUES ('$username','$contact','$name','$address','$password','$email','$usertype','$status','$image')";

    if (mysqli_query($conn, $sql)) {
      // echo "New record successfully";
      echo '<script> alert("Organizer Successfully Registered!");</script>';
      echo '<script> location.href="http://localhost/Improvenest/login.php"</script>';
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }	
	
}
mysqli_close($conn)
?>