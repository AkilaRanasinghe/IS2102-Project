<?php
include 'conn.php';

$image = "";
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
$username = "";
$password = "";
$user = "";
$status = "Active";
$chk = "";

if(isset($_POST['Fname']))  
{
	$image = addslashes(file_get_contents($_FILES['Pimage']['tmp_name']));
}
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
if(isset($_POST['Username']))  
{
	$username = $_POST ["Username"];
}
if(isset($_POST['Password']))  
{
	$password = $_POST ["Password"];
}
if(isset($_POST['User']))  
{
	$user = $_POST ["User"];
}

$sqli="SELECT username FROM player WHERE username = '" .$username. "' UNION SELECT username FROM coach WHERE username = '" .$username. "' UNION SELECT username FROM organiser WHERE username = '" .$username. "' UNION SELECT username FROM federation WHERE username = '" .$username. "' UNION SELECT username FROM admin WHERE username = '" .$username. "'";
$resultt = $conn->query($sqli);

if($resultt->num_rows > 0)
{
	echo "<script type='text/javascript'>alert('This username is already reserved! Please try again!'); window.location.href='http://localhost/Improvenest/signup.php';</script>";
}
else 
{
	$psql = "INSERT INTO player (username,contact_no,email,address,password,f_name,l_name,country,gender,dob,nic_passport,picture,user_type,account_status) VALUES ('$username','$contact','$email','$address','$password','$fname','$lname','$country','$gender','$dob','$nic','$image','$user','$status')";
	$csql = "INSERT INTO coach (username,contact_no,email,address,password,f_name,l_name,country,gender,dob,nic_passport,picture,user_type,account_status) VALUES ('$username','$contact','$email','$address','$password','$fname','$lname','$country','$gender','$dob','$nic','$image','$user','$status')";
	if($user == "Player")
	{
		if(mysqli_query($conn,$psql))
		{
			foreach($sport as $chk)
			{
				$query = "INSERT INTO player_sport (username,sport) VALUES ('$username','$chk')";
				$query_run = mysqli_query($conn, $query);
			}  
			if($query_run)  
			{  
				echo "<script type='text/javascript'>alert('Registration Successfull!'); window.location.href='http://localhost/Improvenest/login.php';</script>";
			}  
			else  
			{  
				echo "<script type='text/javascript'>alert('Registration unsuccessfull! Please try again later.'); window.location.href='http://localhost/Improvenest/signup.php';</script>";	
			}
		}
		else
		{
			echo "<script type='text/javascript'>alert('Registration unsuccessfull! Please try again later.'); window.location.href='http://localhost/Improvenest/signup.php';</script>";	
		}		
	}
	elseif($user == "Coach")
	{
		if(mysqli_query($conn,$csql))
		{
			foreach($sport as $chk)
			{
				$query = "INSERT INTO coach_sport (username,sport) VALUES ('$username','$chk')";
				$query_run = mysqli_query($conn, $query);
			}  
			if($query_run)  
			{  
				echo "<script type='text/javascript'>alert('Registration Successfull!'); window.location.href='http://localhost/Improvenest/login.php';</script>";
			}  
			else  
			{  
				echo "<script type='text/javascript'>alert('Registration unsuccessfull! Please try again later.'); window.location.href='http://localhost/Improvenest/signup.php';</script>"; 
			}
		}
		else
		{
			echo "<script type='text/javascript'>alert('Registration unsuccessfull! Please try again later.'); window.location.href='http://localhost/Improvenest/signup.php';</script>";	
		}		
	}		
}
mysqli_close($conn)
?>