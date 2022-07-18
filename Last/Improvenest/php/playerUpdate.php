<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];

$fname = "";
$lname = "";
$nic = "";
$dob = "";
$gender = "";
$country = "";
$contact = "";
$email = "";
$address = "";
$sport = "";
$password = "";
$achievement = "";
$fitness = "";
$training = "";
$province = "";
$district = "";
$place = "";
$notes = "";
$chk = "";

if(isset($_POST['Fname']))  
{
	$fname = $_POST ["Fname"];
}
if(isset($_POST['Lname']))  
{
	$lname = $_POST ["Lname"];
}
if(isset($_POST['Nic']))  
{
	$nic = $_POST ["Nic"];
}
if(isset($_POST['Dob']))  
{
	$dob = $_POST ["Dob"];
}
if(isset($_POST['Gender']))  
{
	$gender = $_POST ["Gender"];
}
if(isset($_POST['Country']))  
{
	$country = $_POST ["Country"];
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
if(isset($_POST['Sport']))  
{
	$sport = $_POST ["Sport"];
}
if(isset($_POST['Password']))  
{
	$password = $_POST ["Password"];
}
if(isset($_POST['Achievement']))  
{
	$achievement = $_POST ["Achievement"];
}
if(isset($_POST['Fitness']))  
{
	$fitness = $_POST ["Fitness"];
}
if(isset($_POST['Training']))  
{
	$training = $_POST ["Training"];
}
if(isset($_POST['Province']))  
{
	$province = $_POST ["Province"];
}
if(isset($_POST['District']))  
{
	$district = $_POST ["District"];
}
if(isset($_POST['Place']))  
{
	$place = $_POST ["Place"];
}
if(isset($_POST['Notes']))  
{
	$notes = $_POST ["Notes"];
}

$sql = "UPDATE player SET contact_no='$contact', email='$email', address='$address', password='$password', f_name='$fname', l_name='$lname', country='$country', gender='$gender', dob='$dob', nic_passport='$nic', achievement_level='$achievement', fitness_level='$fitness', province='$province', city='$district', venue='$place', note='$notes' where username = '".$uname."';";
$sql .= "DELETE FROM player_sport WHERE username = '".$uname."';";
$sql .= "DELETE FROM player_training_aspect WHERE username = '".$uname."';";

if($conn->multi_query($sql)) 
{
	while ($conn->more_results() && $conn->next_result());
	foreach($sport as $chk)
	{
		$query = "INSERT INTO player_sport (username,sport) VALUES ('$uname','$chk')";
		$query_run = mysqli_query($conn, $query);
	} 	 
	if($query_run)  
	{
		foreach($training as $chk)
		{
			$queryy = "INSERT INTO player_training_aspect (username,training_aspect) VALUES ('$uname','$chk')";
			$query_runn = mysqli_query($conn, $queryy);
		} 	 
		if($query_runn)  
		{  
			echo "<script type='text/javascript'>alert('Update Successfull!'); window.location.href='http://localhost/Improvenest/player/profile.php';</script>";
		}  
		else  
		{  
			echo "<script type='text/javascript'>alert('Failed to update training aspects. Please try again later.'); window.location.href='http://localhost/Improvenest/player/editprofile.php';</script>"; 	
		}
	}  
	else  
	{  
		echo "<script type='text/javascript'>alert('Failed to update sports. Please try again later.'); window.location.href='http://localhost/Improvenest/player/editprofile.php';</script>"; 	
	}
} 
else
{
	echo "<script type='text/javascript'>alert('Update Failed. Please try again later.'); window.location.href='http://localhost/Improvenest/player/editprofile.php';</script>";
}		
		
mysqli_close($conn)
?>