<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];

$image = addslashes(file_get_contents($_FILES['Pimage']['tmp_name']));

$sql= "UPDATE coach SET picture ='$image' WHERE username = '$uname'";

if(mysqli_query($conn,$sql))
{
  echo "<script>alert('Update Successful');window.location.href='http://localhost/Improvenest/coach/profile.php'</script>";
} 
else
{
  echo "<script>alert('unsuccessfull');window.location.href='http://localhost/Improvenest/coach/editprofile.php'</script>";
}	
		
mysqli_close($conn)
?>

