<?php
/*include 'conn.php';
session_start();
$uname = $_SESSION['uname'];

$fname = "";
$lname = "";
$Pimage = "";
$nic = "";
$dob = "";
$gender = "";
$country = "";
$contact = "";
$email = "";
$address = "";
$sport = "";
$password = "";
$rp = "";
$qlevel = "";
$special= "";
$Fees = "";
$Note ="";
$province="";
$city="";
$venue="";

//assignning values transferred by post method

if(isset($_POST['FName']))
{
	$fname = $_POST ["FName"];
}
if(isset($_POST['Lname']))
{
	$lname = $_POST ["Lname"];
}
if(isset($_POST['Pimage']))
{
	$Pimage = $_POST ["Pimage"];
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

if(isset($_POST['password']))
{
	$password = $_POST ["password"];
}
if(isset($_POST['RPassword']))
{
	$rp = $_POST ["RPassword"];
}
if(isset($_POST['Sport']))
{
	$sport = $_POST ["Sport"];
}
if(isset($_POST['Level']))
{
	$qlevel = $_POST ["Level"];
}
if(isset($_POST['special']))
{
	$special = $_POST ["special"];
}
if(isset($_POST['Fees']))
{
	$Fees = $_POST ["Fees"];
}
if(isset($_POST['note']))
{
	$Note = $_POST ["note"];
}
if(isset($_POST['province']))
{
	$province = $_POST ["province"];
}
if(isset($_POST['city']))
{
	$city = $_POST ["city"];
}
if(isset($_POST['venue']))
{
	$venue = $_POST ["venue"];
}

//end of value assigning

$csql = "UPDATE coach SET contact_no = '$contact',email = '$email',address='$address',password = '$password',f_name = '$fname',l_name = '$lname',
country='$country',gender='$gender',dob='$dob',nic_passport='$nic', picture='$Pimage', specilization ='$special', qualification ='$qlevel', fees = '$Fees', note = '$Note',province='$province'
, city='$city', venue='$venue' WHERE username='$uname' ";

	if(mysqli_query($conn,$csql))
		{
			foreach($sport as $chk)
			{
				$query = "UPDATE coach_sport SET sport ='$chk' WHERE username = '$uname';";
				$query_run = mysqli_query($conn, $query);
			}
			if($query_run)
			{
				echo "<script type='text/javascript'>alert('Profile is updated!'); window.location.href='http://localhost/Improvenest/coach/profile.php';</script>";
			}
			else
			{
				echo "<script type='text/javascript'>alert('Blast Update unsuccessfull! Please try again later.'); window.location.href='http://localhost/Improvenest/coach/editprofile.php';</script>";
				/*ini_set('display_errors', '1');
				ini_set('display_startup_errors', '1');
				error_reporting(E_ALL);
			}
		}
		else
		{
			echo "<script type='text/javascript'>alert('Update unsuccessfull! Please try again later.'); window.location.href='http://localhost/Improvenest/coach/editprofile.php';</script>";
		}

mysqli_close($conn);*/


include 'conn.php';
session_start();
$uname = $_SESSION['uname'];

$fname = "";
$lname = "";
$Pimage = "";
$nic = "";
$dob = "";
$gender = "";
$country = "";
$contact = "";
$email = "";
$address = "";
$sport = "";
$password = "";
$rp = "";
$qlevel = "";
$special= "";
$Fees = "";
$Note ="";
$province="";
$city="";
$venue="";

if(isset($_POST['update']))
{
	$fname = $_POST ["Fname"];
	$lname = $_POST ["Lname"];
	$nic = $_POST ["Nic"];
	$dob = $_POST ["Dob"];
	$gender = $_POST ["Gender"];
	$country = $_POST ["Country"];
	$contact = $_POST ["Contact"];
	$email = $_POST ["EMail"];
	$address = $_POST ["Address"];
	$password = $_POST ["Password"];
	$rp = $_POST ["RPassword"];
	$sport = $_POST ["Sport"];
	$qlevel = $_POST ["Level"];
	$special = $_POST ["special"];
	$Fees = $_POST ["Fees"];
	$Note = $_POST ["note"];
	$province = $_POST ["province"];
	$city = $_POST ["city"];
	$venue = $_POST ["venue"];
}
$chk;
$sql = "UPDATE coach SET contact_no='$contact',email='$email',address='$address',password='$password',f_name='$fname',l_name='$lname',country='$country',gender='$gender',dob='$dob',nic_passport='$nic',specilization='$special',qualification='$qlevel',fees='$Fees', province='$province',city='$city',venue='$venue',note='$Note' WHERE username='$uname';";
$sql2= "DELETE FROM coach_sport WHERE username = '".$uname."';";


if(mysqli_query($conn,$sql))
{
	if (mysqli_query($conn,$sql2))
	{
		foreach($sport as $chk)
		{
			$query = "INSERT INTO coach_sport (username,sport) VALUES ('$uname','$chk')";
			$query_run = mysqli_query($conn, $query);
		}
		if($query_run){
			echo "<script type='text/javascript'>alert('Update Successfull!'); window.location.href='http://localhost/Improvenest/coach/profile.php';</script>";
		}
		else{
		echo "<script type='text/javascript'>alert('Failed to update sports. Please try again later.'); window.location.href='http://localhost/Improvenest/coach/editprofile.php';</script>";
		}
	}
}
else
{
	echo "<script type='text/javascript'>alert('Blast Update Failed. Please try again later.');window.location.href='http://localhost/Improvenest/coach/editprofile.php';</script>";
	//ini_set('display_errors', '1');
	//ini_set('display_startup_errors', '1');
	//error_reporting(E_ALL);
}

mysqli_close($conn);
?>
