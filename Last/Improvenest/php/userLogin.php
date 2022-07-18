<?php
include 'conn.php';

$uname = "";
$password = "";

if(isset($_POST['Uname']))
{
	$uname = $_POST["Uname"];
}
if(isset($_POST['Password']))
{
	$password = $_POST["Password"];
}

$sql="SELECT * FROM (SELECT username, password, user_type FROM player UNION SELECT username, password, user_type FROM coach UNION SELECT username, password, user_type FROM organiser UNION SELECT username, password, user_type FROM federation UNION SELECT username, password, user_type FROM admin) a WHERE username = '" .$uname. "' AND password = '" .$password. "'";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())	
	{
		$utype = $row["user_type"];
		if($utype == "Player" || $utype == "Coach")
		{
			$sqll = "SELECT * FROM (SELECT username, account_status FROM player UNION SELECT username, account_status FROM coach) a WHERE username = '" .$uname. "'";
			$resultt = $conn->query($sqll);

			if ($resultt->num_rows > 0) 
			{
				while($roww = $resultt->fetch_assoc()) 
				{
					$status = $roww["account_status"];
					if($status == "Active")
					{
						if($utype == "Player")
						{
							echo "<script type='text/javascript'>alert('Welcome Player!'); window.location.href='http://localhost/Improvenest/player/profile.php';</script>";
						}
						elseif($utype == "Coach")
						{
							echo "<script type='text/javascript'>alert('Welcome Coach!'); window.location.href='http://localhost/Improvenest/coach/profile.php';</script>";
						}						
					}
					else
					{
						echo "<script type='text/javascript'>alert('Your account has been banned!'); window.location.href='http://localhost/Improvenest/login.php';</script>";
					}
				}
			}			
		}
		elseif($utype == "Organiser")
		{
			$sqll = "SELECT * FROM (SELECT username, account_status FROM organiser) a WHERE username = '" .$uname. "'";
			$resultt = $conn->query($sqll);

			if ($resultt->num_rows > 0) 
			{
				while($roww = $resultt->fetch_assoc()) 
				{
					$status = $roww["account_status"];
					if ($status == "Active"){
						echo "<script type='text/javascript'>alert('Welcome Organiser!'); window.location.href='http://localhost/Improvenest/organizer/profile.php';</script>";
					}
					else {
						echo "<script type='text/javascript'>alert('Your Account has been Deleted!'); window.location.href='http://localhost/Improvenest/login.php';</script>";

					}
				}
			}
		}		
		elseif($utype == "Federation")
		{
			echo "<script type='text/javascript'>alert('Welcome Federation!'); window.location.href='';</script>";
		}
		elseif($utype == "Admin")
		{
			echo "<script type='text/javascript'>alert('Welcome Administrator!'); window.location.href='http://localhost/Improvenest/admin/profile.php';</script>";
		}		
	}
}
else
{
	echo "<script type='text/javascript'>alert('Username or Password do not match! Please try again!'); window.location.href='http://localhost/Improvenest/login.php';</script>";
}
$conn->close()
?>

<?php

session_start();
$_SESSION['uname'] = $uname;

?>